<?php

namespace App\Http\Controllers\QrMenu;

use App\Http\Controllers\Controller;
use App\Models\{QrMenu, MenuCategory, MenuItem, QrMenuUser};
use App\Helpers\ImageHelper;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Hash;

class QrMenuManagerController extends Controller
{
    /**
     * Dashboard
     */
    public function dashboard($slug)
    {
        $qrMenu = $this->getQrMenu($slug);
        $user = Auth::guard('qr_menu')->user();

        // İstatistikler
        $totalItems = MenuItem::whereIn('menu_category_id', $qrMenu->menuCategories()->pluck('id'))->count();
        $activeItems = MenuItem::whereIn('menu_category_id', $qrMenu->menuCategories()->pluck('id'))->active()->count();
        $availableItems = MenuItem::whereIn('menu_category_id', $qrMenu->menuCategories()->pluck('id'))->available()->count();
        $recommendedItems = MenuItem::whereIn('menu_category_id', $qrMenu->menuCategories()->pluck('id'))->where('is_recommended', true)->count();
        
        $stats = [
            'categories' => $qrMenu->menuCategories()->count(),
            'items' => $totalItems,
            'recommended' => $recommendedItems,
            'out_of_stock' => $totalItems - $availableItems,
        ];

        // Son güncellenmiş ürünler
        $recentItems = MenuItem::whereIn('menu_category_id', $qrMenu->menuCategories()->pluck('id'))
            ->with('category')
            ->orderBy('updated_at', 'desc')
            ->limit(5)
            ->get();

        return view('qr-menu.manager.dashboard', compact('qrMenu', 'user', 'stats', 'recentItems'));
    }

    /**
     * Menü ayarları
     */
    public function settings($slug)
    {
        $qrMenu = $this->getQrMenu($slug);
        return view('qr-menu.manager.settings', compact('qrMenu'));
    }

    /**
     * Menü ayarlarını güncelle
     */
    public function updateSettings(Request $request, $slug)
    {
        $qrMenu = $this->getQrMenu($slug);

        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'url_slug' => 'nullable|string|max:255|unique:qr_menus,url_slug,' . $qrMenu->id,
            'status' => 'nullable|in:active,inactive,maintenance',
            'logo' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:5120',
            'header_background' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:10240',
            'primary_color' => 'nullable|string|max:7',
            'secondary_color' => 'nullable|string|max:7',
            'background_color' => 'nullable|string|max:7',
            'text_color' => 'nullable|string|max:7',
        ]);

        $data = $request->only(['name', 'description', 'url_slug', 'status']);

        // Renk ayarları
        if ($request->has(['primary_color', 'secondary_color', 'background_color', 'text_color'])) {
            $data['theme_colors'] = [
                'primary' => $request->primary_color ?? '#cf9f38',
                'secondary' => $request->secondary_color ?? '#2c3e50',
                'background' => $request->background_color ?? '#ffffff',
                'text' => $request->text_color ?? '#333333',
            ];
        }

        // Logo işlemleri
        if ($request->hasFile('logo')) {
            // Eski logoyu sil
            if ($qrMenu->logo) {
                Storage::disk('public')->delete($qrMenu->logo);
            }
            $data['logo'] = $request->file('logo')->store('qr-menu-logos', 'public');
        }

        // Header background işlemleri
        if ($request->hasFile('header_background')) {
            // Eski header background'u sil
            if ($qrMenu->header_background) {
                Storage::disk('public')->delete($qrMenu->header_background);
            }
            $data['header_background'] = $request->file('header_background')->store('qr-menu-headers', 'public');
        }

        // Logo silme işlemi
        if ($request->has('delete_logo')) {
            if ($qrMenu->logo) {
                Storage::disk('public')->delete($qrMenu->logo);
                $data['logo'] = null;
            }
        }

        // Header background silme işlemi
        if ($request->has('delete_header_background')) {
            if ($qrMenu->header_background) {
                Storage::disk('public')->delete($qrMenu->header_background);
                $data['header_background'] = null;
            }
        }

        $qrMenu->update($data);

        return redirect()->route('qr-menu.settings', $slug)
            ->with('success', 'Menü ayarları başarıyla güncellendi.');
    }

    /**
     * Kategoriler
     */
    public function categories($slug)
    {
        $qrMenu = $this->getQrMenu($slug);
        $categories = $qrMenu->menuCategories()->ordered()->get();
        
        return view('qr-menu.manager.categories', compact('qrMenu', 'categories'));
    }

    /**
     * Kategori ekle
     */
    public function storeCategory(Request $request, $slug)
    {
        $qrMenu = $this->getQrMenu($slug);

        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'icon' => 'nullable|string|max:255',
            'order' => 'integer|min:0',
        ]);

        $qrMenu->menuCategories()->create($request->all());

        return redirect()->route('qr-menu.categories', $slug)
            ->with('success', 'Kategori başarıyla eklendi.');
    }

    /**
     * Kategori güncelle
     */
    public function updateCategory(Request $request, $slug, MenuCategory $category)
    {
        $qrMenu = $this->getQrMenu($slug);
        $this->checkCategoryOwnership($category, $qrMenu);

        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'icon' => 'nullable|string|max:255',
            'order' => 'integer|min:0',
        ]);

        $category->update($request->all());

        return redirect()->route('qr-menu.categories', $slug)
            ->with('success', 'Kategori başarıyla güncellendi.');
    }

    /**
     * Kategori bilgilerini getir (AJAX için)
     */
    public function getCategory($slug, MenuCategory $category)
    {
        $qrMenu = $this->getQrMenu($slug);
        $this->checkCategoryOwnership($category, $qrMenu);

        return response()->json($category);
    }

    /**
     * Kategori sil
     */
    public function destroyCategory($slug, MenuCategory $category)
    {
        $qrMenu = $this->getQrMenu($slug);
        $this->checkCategoryOwnership($category, $qrMenu);

        // Kategori resimlerini sil
        foreach ($category->menuItems as $item) {
            if ($item->image) {
                Storage::disk('public')->delete($item->image);
            }
        }

        $category->delete();

        return redirect()->route('qr-menu.categories', $slug)
            ->with('success', 'Kategori başarıyla silindi.');
    }

    /**
     * Menü öğeleri
     */
    public function items($slug)
    {
        $qrMenu = $this->getQrMenu($slug);
        $categories = $qrMenu->menuCategories()->ordered()->get();
        
        $items = MenuItem::whereIn('menu_category_id', $qrMenu->menuCategories()->pluck('id'))
            ->with('category')
            ->ordered()
            ->paginate(20);

        return view('qr-menu.manager.items', compact('qrMenu', 'categories', 'items'));
    }

    /**
     * Menü öğesi ekle
     */
    public function storeItem(Request $request, $slug)
    {
        $qrMenu = $this->getQrMenu($slug);

        $request->validate([
            'menu_category_id' => 'required|exists:menu_categories,id',
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'price' => 'nullable|numeric|min:0',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:10240',
            'gallery.*' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:10240',
            'allergens' => 'nullable|array',
            'ingredients' => 'nullable|array',
            'preparation_time' => 'nullable|string|max:255',
            'order' => 'integer|min:0',
        ], [
            'gallery.*.image' => 'Galeri görselleri geçerli resim formatında olmalıdır.',
            'gallery.*.max' => 'Galeri görselleri 10MB\'dan küçük olmalıdır.',
            'gallery.max' => 'En fazla 5 görsel yükleyebilirsiniz.',
        ]);

        // Galeri kontrolü (en az 1, en fazla 5)
        $galleryCount = $request->hasFile('gallery') ? count($request->file('gallery')) : 0;
        $hasMainImage = $request->hasFile('image');
        
        if (!$hasMainImage && $galleryCount == 0) {
            return back()->withErrors(['image' => 'En az 1 görsel yüklemelisiniz.'])->withInput();
        }
        
        if ($galleryCount > 5) {
            return back()->withErrors(['gallery' => 'En fazla 5 galeri görseli yükleyebilirsiniz.'])->withInput();
        }

        // Kategori ownership kontrolü
        $category = MenuCategory::find($request->menu_category_id);
        $this->checkCategoryOwnership($category, $qrMenu);

        $data = $request->all();

        // Ana resim yükleme
        if ($request->hasFile('image')) {
            $data['image'] = ImageHelper::compressAndStore(
                $request->file('image'), 
                'qr-menu-items',
                1200, // max width
                800,  // max height
                80    // quality
            );
        }

        // Galeri resimleri yükleme
        if ($request->hasFile('gallery')) {
            $galleryFiles = $request->file('gallery');
            $gallery = ImageHelper::compressAndStoreMultiple(
                $galleryFiles,
                'qr-menu-items/gallery',
                1600, // max width
                1200, // max height
                85    // quality
            );
            $data['gallery'] = $gallery;
        }

        MenuItem::create($data);

        return redirect()->route('qr-menu.items', $slug)
            ->with('success', 'Ürün başarıyla eklendi.');
    }

    /**
     * Menü öğesi getir (API endpoint)
     */
    public function getItem($slug, MenuItem $item)
    {
        $qrMenu = $this->getQrMenu($slug);
        $this->checkItemOwnership($item, $qrMenu);

        return response()->json([
            'id' => $item->id,
            'menu_category_id' => $item->menu_category_id,
            'name' => $item->name,
            'description' => $item->description,
            'price' => $item->price,
            'image_url' => $item->image_url,
            'gallery_urls' => $item->gallery_urls,
            'allergens' => $item->allergens,
            'ingredients' => $item->ingredients,
            'preparation_time' => $item->preparation_time,
            'is_available' => $item->is_available,
            'is_recommended' => $item->is_recommended,
            'order' => $item->order,
        ]);
    }

    /**
     * Menü öğesi güncelle
     */
    public function updateItem(Request $request, $slug, MenuItem $item)
    {
        $qrMenu = $this->getQrMenu($slug);
        $this->checkItemOwnership($item, $qrMenu);

        $request->validate([
            'menu_category_id' => 'required|exists:menu_categories,id',
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'price' => 'nullable|numeric|min:0',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:10240',
            'gallery.*' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:10240',
            'allergens' => 'nullable|array',
            'ingredients' => 'nullable|array',
            'preparation_time' => 'nullable|string|max:255',
            'order' => 'integer|min:0',
        ], [
            'gallery.*.image' => 'Galeri görselleri geçerli resim formatında olmalıdır.',
            'gallery.*.max' => 'Galeri görselleri 10MB\'dan küçük olmalıdır.',
        ]);

        $data = $request->all();

        // Ana resim yükleme
        if ($request->hasFile('image')) {
            // Eski resmi sil
            if ($item->image) {
                ImageHelper::deleteImage($item->image);
            }
            $data['image'] = ImageHelper::compressAndStore(
                $request->file('image'), 
                'qr-menu-items',
                1200, // max width
                800,  // max height
                80    // quality
            );
        }

        // Galeri resimleri yükleme
        if ($request->hasFile('gallery')) {
            // Eski galeri resimlerini sil
            if ($item->gallery && is_array($item->gallery)) {
                foreach ($item->gallery as $image) {
                    ImageHelper::deleteImage($image);
                }
            }
            
            $galleryFiles = $request->file('gallery');
            $gallery = ImageHelper::compressAndStoreMultiple(
                $galleryFiles,
                'qr-menu-items/gallery',
                1600, // max width
                1200, // max height
                85    // quality
            );
            $data['gallery'] = $gallery;
        }

        $item->update($data);

        return redirect()->route('qr-menu.items', $slug)
            ->with('success', 'Ürün başarıyla güncellendi.');
    }

    /**
     * Menü öğesi sil
     */
    public function destroyItem($slug, MenuItem $item)
    {
        $qrMenu = $this->getQrMenu($slug);
        $this->checkItemOwnership($item, $qrMenu);

        // Ana resmi sil
        if ($item->image) {
            ImageHelper::deleteImage($item->image);
        }

        // Galeri resimlerini sil
        if ($item->gallery && is_array($item->gallery)) {
            foreach ($item->gallery as $image) {
                ImageHelper::deleteImage($image);
            }
        }

        $item->delete();

        return redirect()->route('qr-menu.items', $slug)
            ->with('success', 'Ürün başarıyla silindi.');
    }

    /**
     * Ürün durumu toggle
     */
    public function toggleItemStatus($slug, MenuItem $item)
    {
        $qrMenu = $this->getQrMenu($slug);
        $this->checkItemOwnership($item, $qrMenu);

        $item->update(['is_available' => !$item->is_available]);

        return response()->json([
            'success' => true,
            'is_available' => $item->is_available,
            'message' => $item->is_available ? 'Ürün aktif edildi.' : 'Ürün pasif edildi.'
        ]);
    }

    /**
     * Ürün önerilme durumu toggle
     */
    public function toggleItemRecommended($slug, MenuItem $item)
    {
        $qrMenu = $this->getQrMenu($slug);
        $this->checkItemOwnership($item, $qrMenu);

        $item->update(['is_recommended' => !$item->is_recommended]);

        return response()->json([
            'success' => true,
            'is_recommended' => $item->is_recommended,
            'message' => $item->is_recommended ? 'Ürün önerilenlere eklendi.' : 'Ürün önerilen listesinden çıkarıldı.'
        ]);
    }

    /**
     * QR kod yeniden oluştur
     */
    public function regenerateQrCode($slug)
    {
        $qrMenu = $this->getQrMenu($slug);
        $qrMenu->generateQrCode();

        return redirect()->route('qr-menu.settings', $slug)
            ->with('success', 'QR kod başarıyla yeniden oluşturuldu.');
    }

    /**
     * QR kod indir
     */
    public function downloadQrCode($slug)
    {
        $qrMenu = $this->getQrMenu($slug);
        
        if (!$qrMenu->qr_code_path) {
            $qrMenu->generateQrCode();
        }

        return response()->download(storage_path('app/public/' . $qrMenu->qr_code_path));
    }

    /**
     * Kullanıcılar (sadece owner)
     */
    public function users($slug)
    {
        $qrMenu = $this->getQrMenu($slug);
        $users = $qrMenu->qrMenuUsers()->get();

        return view('qr-menu.manager.users', compact('qrMenu', 'users'));
    }

    /**
     * Kullanıcı ekle
     */
    public function storeUser(Request $request, $slug)
    {
        $qrMenu = $this->getQrMenu($slug);

        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:qr_menu_users,email',
            'password' => 'required|string|min:6|confirmed',
            'phone' => 'nullable|string|max:20',
            'role' => 'required|in:owner,manager,staff',
        ]);

        $qrMenu->qrMenuUsers()->create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'phone' => $request->phone,
            'role' => $request->role,
        ]);

        return redirect()->route('qr-menu.users', $slug)
            ->with('success', 'Kullanıcı başarıyla eklendi.');
    }

    /**
     * Kullanıcı güncelle
     */
    public function updateUser(Request $request, $slug, QrMenuUser $user)
    {
        $qrMenu = $this->getQrMenu($slug);
        $this->checkUserOwnership($user, $qrMenu);

        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:qr_menu_users,email,' . $user->id,
            'password' => 'nullable|string|min:6|confirmed',
            'phone' => 'nullable|string|max:20',
            'role' => 'required|in:owner,manager,staff',
        ]);

        $data = $request->only(['name', 'email', 'phone', 'role']);

        if ($request->filled('password')) {
            $data['password'] = Hash::make($request->password);
        }

        $user->update($data);

        return redirect()->route('qr-menu.users', $slug)
            ->with('success', 'Kullanıcı başarıyla güncellendi.');
    }

    /**
     * Kullanıcı bilgilerini getir (AJAX için)
     */
    public function getUser($slug, QrMenuUser $user)
    {
        $qrMenu = $this->getQrMenu($slug);
        $this->checkUserOwnership($user, $qrMenu);

        return response()->json($user);
    }

    /**
     * Kullanıcı sil
     */
    public function destroyUser($slug, QrMenuUser $user)
    {
        $qrMenu = $this->getQrMenu($slug);
        $this->checkUserOwnership($user, $qrMenu);

        $user->delete();

        return redirect()->route('qr-menu.users', $slug)
            ->with('success', 'Kullanıcı başarıyla silindi.');
    }

    /**
     * Helper Methods
     */
    private function getQrMenu($slug)
    {
        return QrMenu::where('url_slug', $slug)->active()->firstOrFail();
    }

    private function checkCategoryOwnership(MenuCategory $category, QrMenu $qrMenu)
    {
        if ($category->qr_menu_id !== $qrMenu->id) {
            abort(403, 'Bu kategoriye erişim yetkiniz yok.');
        }
    }

    private function checkItemOwnership(MenuItem $item, QrMenu $qrMenu)
    {
        if ($item->category->qr_menu_id !== $qrMenu->id) {
            abort(403, 'Bu ürüne erişim yetkiniz yok.');
        }
    }

    private function checkUserOwnership(QrMenuUser $user, QrMenu $qrMenu)
    {
        if ($user->qr_menu_id !== $qrMenu->id) {
            abort(403, 'Bu kullanıcıya erişim yetkiniz yok.');
        }
    }
}
