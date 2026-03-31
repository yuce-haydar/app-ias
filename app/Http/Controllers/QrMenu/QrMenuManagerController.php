<?php

namespace App\Http\Controllers\QrMenu;

use App\Http\Controllers\Controller;
use App\Models\{QrMenu, MenuCategory, MenuItem, QrMenuUser};
use App\Helpers\ImageHelper;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Validation\Rules\Exists;
use Illuminate\Support\Collection;
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
            'categories_main' => $qrMenu->menuCategories()->whereNull('parent_id')->count(),
            'categories_active' => $qrMenu->menuCategories()->active()->count(),
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

        try {
            $request->validate([
                'name' => 'required|string|max:255',
                'description' => 'nullable|string|max:1000',
                'url_slug' => 'nullable|string|max:255|unique:qr_menus,url_slug,' . $qrMenu->id,
                'status' => 'nullable|in:active,inactive,maintenance',
                'logo' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:5120',
                'header_background' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:10240',
                'primary_color' => 'nullable|string|max:7',
                'secondary_color' => 'nullable|string|max:7',
                'background_color' => 'nullable|string|max:7',
                'text_color' => 'nullable|string|max:7',
            ], [
                'name.required' => 'Menü adı zorunludur.',
                'name.max' => 'Menü adı en fazla 255 karakter olabilir.',
                'description.max' => 'Açıklama en fazla 1000 karakter olabilir.',
                'url_slug.unique' => 'Bu URL slug başka bir menü tarafından kullanılıyor.',
                'url_slug.max' => 'URL slug en fazla 255 karakter olabilir.',
                'status.in' => 'Geçersiz menü durumu.',
                'logo.image' => 'Logo dosyası geçerli bir resim formatında olmalıdır.',
                'logo.mimes' => 'Logo dosyası jpeg, png, jpg, gif veya webp formatında olmalıdır.',
                'logo.max' => 'Logo dosyası en fazla 5MB olabilir.',
                'header_background.image' => 'Header arka plan dosyası geçerli bir resim formatında olmalıdır.',
                'header_background.mimes' => 'Header arka plan dosyası jpeg, png, jpg, gif veya webp formatında olmalıdır.',
                'header_background.max' => 'Header arka plan dosyası en fazla 10MB olabilir.',
                'primary_color.max' => 'Ana renk kodu geçersiz.',
                'secondary_color.max' => 'İkinci renk kodu geçersiz.',
                'background_color.max' => 'Arka plan renk kodu geçersiz.',
                'text_color.max' => 'Metin renk kodu geçersiz.',
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
                try {
                    // Eski logoyu sil
                    if ($qrMenu->logo) {
                        Storage::disk('public')->delete($qrMenu->logo);
                    }
                    $data['logo'] = $request->file('logo')->store('qr-menu-logos', 'public');
                } catch (\Exception $e) {
                    throw new \Exception('Logo yüklenirken hata oluştu: ' . $e->getMessage());
                }
            }

            // Header background işlemleri
            if ($request->hasFile('header_background')) {
                try {
                    // Eski header background'u sil
                    if ($qrMenu->header_background) {
                        Storage::disk('public')->delete($qrMenu->header_background);
                    }
                    $data['header_background'] = $request->file('header_background')->store('qr-menu-headers', 'public');
                } catch (\Exception $e) {
                    throw new \Exception('Header arka plan resmi yüklenirken hata oluştu: ' . $e->getMessage());
                }
            }

            // Logo silme işlemi
            if ($request->has('delete_logo')) {
                try {
                    if ($qrMenu->logo) {
                        Storage::disk('public')->delete($qrMenu->logo);
                        $data['logo'] = null;
                    }
                } catch (\Exception $e) {
                    throw new \Exception('Logo silinirken hata oluştu: ' . $e->getMessage());
                }
            }

            // Header background silme işlemi
            if ($request->has('delete_header_background')) {
                try {
                    if ($qrMenu->header_background) {
                        Storage::disk('public')->delete($qrMenu->header_background);
                        $data['header_background'] = null;
                    }
                } catch (\Exception $e) {
                    throw new \Exception('Header arka plan resmi silinirken hata oluştu: ' . $e->getMessage());
                }
            }

            $qrMenu->update($data);

            return redirect()->route('qr-menu.settings', $slug)
                ->with('success', 'Menü ayarları başarıyla güncellendi.');

        } catch (\Illuminate\Validation\ValidationException $e) {
            return redirect()->route('qr-menu.settings', $slug)
                ->withErrors($e->validator)
                ->withInput();
        } catch (\Exception $e) {
            \Log::error('QR Menu Settings Update Error: ' . $e->getMessage());
            return redirect()->route('qr-menu.settings', $slug)
                ->with('error', 'Ayarlar güncellenirken bir hata oluştu: ' . $e->getMessage())
                ->withInput();
        }
    }

    /**
     * Kategoriler
     */
    public function categories($slug)
    {
        $qrMenu = $this->getQrMenu($slug);
        [$categories, $categoryRoots, , $orphanCategories] = $this->loadManagerCategoryCollections($qrMenu);

        return view('qr-menu.manager.categories', compact('qrMenu', 'categories', 'categoryRoots', 'orphanCategories'));
    }

    /**
     * Kategori ekle
     */
    public function storeCategory(Request $request, $slug)
    {
        $qrMenu = $this->getQrMenu($slug);

        // Order değeri yoksa 0 yap
        if (!$request->has('order') || $request->input('order') === null) {
            $request->merge(['order' => 0]);
        }

        try {
            $request->validate([
                'name' => 'required|string|max:255',
                'description' => 'nullable|string',
                'icon' => 'nullable|string|max:255',
                'order' => 'nullable|integer|min:0',
                'parent_id' => [
                    'nullable',
                    Rule::exists('menu_categories', 'id')
                        ->where('qr_menu_id', $qrMenu->id)
                        ->whereNull('parent_id'),
                ],
            ], [
                'name.required' => 'Kategori adı zorunludur.',
                'name.max' => 'Kategori adı en fazla 255 karakter olabilir.',
                'icon.max' => 'İkon adı en fazla 255 karakter olabilir.',
                'order.integer' => 'Sıralama değeri sayısal olmalıdır.',
                'order.min' => 'Sıralama değeri sıfırdan küçük olamaz.',
                'parent_id.exists' => 'Seçilen üst kategori bu menüye ait değil.',
            ]);

            $qrMenu->menuCategories()->create($request->only([
                'name', 'description', 'icon', 'order', 'parent_id',
            ]));

            return redirect()->route('qr-menu.categories', $slug)
                ->with('success', 'Kategori başarıyla eklendi.');
        } catch (\Illuminate\Validation\ValidationException $e) {
            return back()->withErrors($e->errors())->withInput()
                ->with('error', 'Kategori eklenirken hata oluştu. Lütfen form verilerini kontrol edin.');
        } catch (\Exception $e) {
            return back()->withErrors(['error' => 'Kategori kaydedilirken bir hata oluştu: ' . $e->getMessage()])->withInput();
        }
    }

    /**
     * Kategori güncelle
     */
    public function updateCategory(Request $request, $slug, MenuCategory $category)
    {
        $qrMenu = $this->getQrMenu($slug);
        $this->checkCategoryOwnership($category, $qrMenu);

        // Order değeri yoksa 0 yap
        if (!$request->has('order') || $request->input('order') === null) {
            $request->merge(['order' => 0]);
        }

        try {
            $request->validate([
                'name' => 'required|string|max:255',
                'description' => 'nullable|string',
                'icon' => 'nullable|string|max:255',
                'order' => 'nullable|integer|min:0',
                'parent_id' => [
                    'nullable',
                    Rule::notIn([$category->id]),
                    Rule::exists('menu_categories', 'id')
                        ->where('qr_menu_id', $qrMenu->id)
                        ->whereNull('parent_id'),
                ],
            ], [
                'name.required' => 'Kategori adı zorunludur.',
                'name.max' => 'Kategori adı en fazla 255 karakter olabilir.',
                'icon.max' => 'İkon adı en fazla 255 karakter olabilir.',
                'order.integer' => 'Sıralama değeri sayısal olmalıdır.',
                'order.min' => 'Sıralama değeri sıfırdan küçük olamaz.',
                'parent_id.exists' => 'Seçilen üst kategori bu menüye ait değil.',
            ]);

            $category->update($request->only([
                'name', 'description', 'icon', 'order', 'parent_id',
            ]));

            return redirect()->route('qr-menu.categories', $slug)
                ->with('success', 'Kategori başarıyla güncellendi.');
        } catch (\Illuminate\Validation\ValidationException $e) {
            return back()->withErrors($e->errors())->withInput()
                ->with('error', 'Kategori güncellenirken hata oluştu. Lütfen form verilerini kontrol edin.');
        } catch (\Exception $e) {
            return back()->withErrors(['error' => 'Kategori güncellenirken bir hata oluştu: ' . $e->getMessage()])->withInput();
        }
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

        $category->load(['menuItems', 'children']);
        $this->purgeCategoryTreeMedia($category);

        $category->delete();

        return redirect()->route('qr-menu.categories', $slug)
            ->with('success', 'Kategori, alt kategorileri ve bağlı ürün görselleri silindi.');
    }

    /**
     * Menü öğeleri
     */
    public function items(Request $request, $slug)
    {
        $qrMenu = $this->getQrMenu($slug);
        [$categories, , $categoriesOrdered, $categoryOrphans] = $this->loadManagerCategoryCollections($qrMenu);

        $categoriesFlatOrdered = $categoriesOrdered->concat($categoryOrphans);
        $categorySelectLabels = $this->buildCategorySelectLabels($categoriesFlatOrdered, $categories, $qrMenu);

        $itemsQuery = MenuItem::whereIn('menu_category_id', $qrMenu->menuCategories()->pluck('id'))
            ->with('category')
            ->ordered();

        // Kategori filtresi
        if ($request->filled('category')) {
            $itemsQuery->where('menu_category_id', $request->input('category'));
        }

        // Durum filtresi
        if ($request->filled('status')) {
            switch ($request->input('status')) {
                case 'available':
                    $itemsQuery->where('is_available', true);
                    break;
                case 'unavailable':
                    $itemsQuery->where('is_available', false);
                    break;
                case 'recommended':
                    $itemsQuery->where('is_recommended', true);
                    break;
            }
        }

        // İsim filtresi
        if ($request->filled('name')) {
            $name = $request->input('name');
            $itemsQuery->where('name', 'like', '%' . $name . '%');
        }

        $items = $itemsQuery->paginate(20)->appends($request->query());

        return view('qr-menu.manager.items', compact(
            'qrMenu',
            'categories',
            'categoryOrphans',
            'categoriesFlatOrdered',
            'categorySelectLabels',
            'items'
        ));
    }

    /**
     * Menü öğesi ekle
     */
    public function storeItem(Request $request, $slug)
    {
        $qrMenu = $this->getQrMenu($slug);

        // Veri tiplerini düzelt
        $this->preprocessItemData($request);

        try {
            // Dinamik validation kuralları
            $rules = [
                'menu_category_id' => ['required', $this->menuCategoryIdRule($qrMenu)],
                'name' => 'required|string|max:255',
                'description' => 'nullable|string',
                'price_type' => 'required|in:single,multiple',
                'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:10240',
                'gallery.*' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:10240',
                'allergens' => 'nullable|string',
                'ingredients' => 'nullable|string',
                'preparation_time' => 'nullable|string|max:255',
                'order' => 'nullable|integer|min:0',
                'is_available' => 'nullable|boolean',
                'is_recommended' => 'nullable|boolean',
            ];

            // Price type'a göre validation kuralları ekle
            if ($request->input('price_type') === 'single') {
                $rules['price'] = 'required|numeric|min:0';
            } else {
                $rules['sizes'] = 'required|array|min:1';
                $rules['sizes.*.name'] = 'required|string|max:255';
                $rules['sizes.*.price'] = 'required|numeric|min:0';
            }

            $messages = [
                'menu_category_id.required' => 'Kategori seçimi zorunludur.',
                'menu_category_id.exists' => 'Seçilen kategori bu menüye ait değil.',
                'name.required' => 'Ürün adı zorunludur.',
                'name.max' => 'Ürün adı en fazla 255 karakter olabilir.',
                'price_type.required' => 'Fiyat türü seçimi zorunludur.',
                'price_type.in' => 'Geçersiz fiyat türü seçimi.',
                'price.required' => 'Tek fiyat seçeneği için fiyat zorunludur.',
                'price.numeric' => 'Fiyat sayısal bir değer olmalıdır.',
                'price.min' => 'Fiyat sıfırdan küçük olamaz.',
                'image.image' => 'Ana görsel geçerli bir resim dosyası olmalıdır.',
                'image.mimes' => 'Ana görsel jpeg, png, jpg, gif veya webp formatında olmalıdır.',
                'image.max' => 'Ana görsel maksimum 10MB olabilir.',
                'gallery.*.image' => 'Galeri görselleri geçerli resim formatında olmalıdır.',
                'gallery.*.mimes' => 'Galeri görselleri jpeg, png, jpg, gif veya webp formatında olmalıdır.',
                'gallery.*.max' => 'Galeri görselleri maksimum 10MB olabilir.',
                'sizes.required' => 'Çoklu fiyat seçeneği için en az bir boy tanımlamalısınız.',
                'sizes.array' => 'Boy seçenekleri geçerli format olmalıdır.',
                'sizes.min' => 'En az bir boy tanımlamalısınız.',
                'sizes.*.name.required' => 'Boy adı zorunludur.',
                'sizes.*.name.max' => 'Boy adı en fazla 255 karakter olabilir.',
                'sizes.*.price.required' => 'Boy fiyatı zorunludur.',
                'sizes.*.price.numeric' => 'Boy fiyatı sayısal olmalıdır.',
                'sizes.*.price.min' => 'Boy fiyatı sıfırdan küçük olamaz.',
                'preparation_time.max' => 'Hazırlanma süresi en fazla 255 karakter olabilir.',
                'order.integer' => 'Sıralama değeri sayısal olmalıdır.',
                'order.min' => 'Sıralama değeri sıfırdan küçük olamaz.',
            ];

            $request->validate($rules, $messages);
        } catch (\Illuminate\Validation\ValidationException $e) {
            return back()->withErrors($e->errors())->withInput()
                ->with('error', 'Ürün eklenirken hata oluştu. Lütfen form verilerini kontrol edin.');
        }

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

        // Boy verilerini işle
        if ($request->has('sizes') && is_array($request->sizes)) {
            $sizes = [];
            foreach ($request->sizes as $size) {
                if (!empty($size['name']) && !empty($size['price'])) {
                    $sizes[] = [
                        'name' => trim($size['name']),
                        'price' => floatval($size['price'])
                    ];
                }
            }
            $data['sizes'] = !empty($sizes) ? $sizes : null;
        }

        // Alerjenleri array'e çevir
        if ($request->has('allergens') && !empty($request->allergens)) {
            $allergens = array_map('trim', explode(',', $request->allergens));
            $allergens = array_filter($allergens); // Boş değerleri temizle
            $data['allergens'] = !empty($allergens) ? $allergens : null;
        }

        // İçerikleri array'e çevir
        if ($request->has('ingredients') && !empty($request->ingredients)) {
            $ingredients = array_map('trim', explode(',', $request->ingredients));
            $ingredients = array_filter($ingredients); // Boş değerleri temizle
            $data['ingredients'] = !empty($ingredients) ? $ingredients : null;
        }

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

        try {
            MenuItem::create($data);
            return redirect()->route('qr-menu.items', $slug)
                ->with('success', 'Ürün başarıyla eklendi.');
        } catch (\Exception $e) {
            return back()->withErrors(['error' => 'Ürün kaydedilirken bir hata oluştu: ' . $e->getMessage()])->withInput();
        }
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
            'sizes' => $item->sizes,
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

        // Veri tiplerini düzelt
        $this->preprocessItemData($request);

        try {
            // Dinamik validation kuralları
            $rules = [
                'menu_category_id' => ['required', $this->menuCategoryIdRule($qrMenu)],
                'name' => 'required|string|max:255',
                'description' => 'nullable|string',
                'price_type' => 'required|in:single,multiple',
                'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:10240',
                'gallery.*' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:10240',
                'allergens' => 'nullable|string',
                'ingredients' => 'nullable|string',
                'preparation_time' => 'nullable|string|max:255',
                'order' => 'nullable|integer|min:0',
                'is_available' => 'nullable|boolean',
                'is_recommended' => 'nullable|boolean',
            ];

            // Price type'a göre validation kuralları ekle
            if ($request->input('price_type') === 'single') {
                $rules['price'] = 'required|numeric|min:0';
            } else {
                $rules['sizes'] = 'required|array|min:1';
                $rules['sizes.*.name'] = 'required|string|max:255';
                $rules['sizes.*.price'] = 'required|numeric|min:0';
            }

            $messages = [
                'menu_category_id.required' => 'Kategori seçimi zorunludur.',
                'menu_category_id.exists' => 'Seçilen kategori bu menüye ait değil.',
                'name.required' => 'Ürün adı zorunludur.',
                'name.max' => 'Ürün adı en fazla 255 karakter olabilir.',
                'price.numeric' => 'Fiyat sayısal bir değer olmalıdır.',
                'price.min' => 'Fiyat sıfırdan küçük olamaz.',
                'price_type.required' => 'Fiyat türü seçimi zorunludur.',
                'price_type.in' => 'Geçersiz fiyat türü seçimi.',
                'price.required' => 'Tek fiyat seçeneği için fiyat zorunludur.',
                'image.image' => 'Ana görsel geçerli bir resim dosyası olmalıdır.',
                'image.mimes' => 'Ana görsel jpeg, png, jpg, gif veya webp formatında olmalıdır.',
                'image.max' => 'Ana görsel maksimum 10MB olabilir.',
                'gallery.*.image' => 'Galeri görselleri geçerli resim formatında olmalıdır.',
                'gallery.*.mimes' => 'Galeri görselleri jpeg, png, jpg, gif veya webp formatında olmalıdır.',
                'gallery.*.max' => 'Galeri görselleri maksimum 10MB olabilir.',
                'sizes.required' => 'Çoklu fiyat seçeneği için en az bir boy tanımlamalısınız.',
                'sizes.array' => 'Boy seçenekleri geçerli format olmalıdır.',
                'sizes.min' => 'En az bir boy tanımlamalısınız.',
                'sizes.*.name.required' => 'Boy adı zorunludur.',
                'sizes.*.name.max' => 'Boy adı en fazla 255 karakter olabilir.',
                'sizes.*.price.required' => 'Boy fiyatı zorunludur.',
                'sizes.*.price.numeric' => 'Boy fiyatı sayısal olmalıdır.',
                'sizes.*.price.min' => 'Boy fiyatı sıfırdan küçük olamaz.',
                'preparation_time.max' => 'Hazırlanma süresi en fazla 255 karakter olabilir.',
                'order.integer' => 'Sıralama değeri sayısal olmalıdır.',
                'order.min' => 'Sıralama değeri sıfırdan küçük olamaz.',
            ];

            $request->validate($rules, $messages);
        } catch (\Illuminate\Validation\ValidationException $e) {
            return back()->withErrors($e->errors())->withInput()
                ->with('error', 'Ürün güncellenirken hata oluştu. Lütfen form verilerini kontrol edin.');
        }

        $data = $request->all();

        // Boy verilerini işle
        if ($request->has('sizes') && is_array($request->sizes)) {
            $sizes = [];
            foreach ($request->sizes as $size) {
                if (!empty($size['name']) && !empty($size['price'])) {
                    $sizes[] = [
                        'name' => trim($size['name']),
                        'price' => floatval($size['price'])
                    ];
                }
            }
            $data['sizes'] = !empty($sizes) ? $sizes : null;
        }

        // Alerjenleri array'e çevir
        if ($request->has('allergens') && !empty($request->allergens)) {
            $allergens = array_map('trim', explode(',', $request->allergens));
            $allergens = array_filter($allergens); // Boş değerleri temizle
            $data['allergens'] = !empty($allergens) ? $allergens : null;
        }

        // İçerikleri array'e çevir
        if ($request->has('ingredients') && !empty($request->ingredients)) {
            $ingredients = array_map('trim', explode(',', $request->ingredients));
            $ingredients = array_filter($ingredients); // Boş değerleri temizle
            $data['ingredients'] = !empty($ingredients) ? $ingredients : null;
        }

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

        try {
            $item->update($data);
            return redirect()->route('qr-menu.items', $slug)
                ->with('success', 'Ürün başarıyla güncellendi.');
        } catch (\Exception $e) {
            return back()->withErrors(['error' => 'Ürün güncellenirken bir hata oluştu: ' . $e->getMessage()])->withInput();
        }
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
    public function toggleItemStatus(Request $request, $slug, MenuItem $item)
    {
        $qrMenu = $this->getQrMenu($slug);
        $this->checkItemOwnership($item, $qrMenu);

        $item->update(['is_available' => !$item->is_available]);

        $message = $item->is_available ? 'Ürün aktif edildi.' : 'Ürün pasif edildi.';

        if ($request->expectsJson()) {
            return response()->json([
                'success' => true,
                'is_available' => $item->is_available,
                'message' => $message
            ]);
        }

        return back()->with('success', $message);
    }

    /**
     * Ürün önerilme durumu toggle
     */
    public function toggleItemRecommended(Request $request, $slug, MenuItem $item)
    {
        $qrMenu = $this->getQrMenu($slug);
        $this->checkItemOwnership($item, $qrMenu);

        $item->update(['is_recommended' => !$item->is_recommended]);

        $message = $item->is_recommended ? 'Ürün önerilenlere eklendi.' : 'Ürün önerilen listesinden çıkarıldı.';

        if ($request->expectsJson()) {
            return response()->json([
                'success' => true,
                'is_recommended' => $item->is_recommended,
                'message' => $message
            ]);
        }

        return back()->with('success', $message);
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

    /**
     * Ürün verilerini validation öncesi düzenle
     */
    private function preprocessItemData(Request $request)
    {
        // Checkbox değerlerini düzenle
        if (!$request->has('is_available')) {
            $request->merge(['is_available' => false]);
        } else {
            $request->merge(['is_available' => (bool) $request->input('is_available')]);
        }

        if (!$request->has('is_recommended')) {
            $request->merge(['is_recommended' => false]);
        } else {
            $request->merge(['is_recommended' => (bool) $request->input('is_recommended')]);
        }

        // Order değeri yoksa 0 yap
        if (!$request->has('order') || $request->input('order') === null) {
            $request->merge(['order' => 0]);
        }

        // Price type kontrolü - tek fiyat seçildiyse sizes array'ini temizle
        if ($request->input('price_type') === 'single') {
            $request->merge(['sizes' => null]);
        }

        // Çoklu fiyat seçildiyse tek fiyat alanını temizle
        if ($request->input('price_type') === 'multiple') {
            $request->merge(['price' => null]);
        }

        // Allergens ve ingredients string'den array'e çevirme işlemini validation sonrasına bırak
        // Şimdilik string olarak bırak
    }

    private function menuCategoryIdRule(QrMenu $qrMenu): Exists
    {
        return Rule::exists('menu_categories', 'id')->where('qr_menu_id', $qrMenu->id);
    }

    /**
     * Düz listeden hiyerarşik children ağacı kur (sınırsız derinlik).
     */
    private function nestCategoryChildren(Collection $categories, Collection $flat): void
    {
        foreach ($categories as $category) {
            $children = $flat->where('parent_id', $category->id)->sortBy('order')->values();
            $category->setRelation('children', $children);
            if ($children->isNotEmpty()) {
                $this->nestCategoryChildren($children, $flat);
            }
        }
    }

    /**
     * @return array{0: Collection<int, MenuCategory>, 1: Collection<int, MenuCategory>, 2: Collection<int, MenuCategory>, 3: Collection<int, MenuCategory>}
     */
    private function loadManagerCategoryCollections(QrMenu $qrMenu): array
    {
        $categories = $qrMenu->menuCategories()->ordered()->with(['parent', 'children', 'menuItems'])->get();
        $categoryRoots = $categories->whereNull('parent_id')->sortBy('order')->values();
        $this->nestCategoryChildren($categoryRoots, $categories);

        $visited = [];
        $categoriesOrdered = $this->flattenCategoryTreeDfs($categoryRoots, $visited);
        $categoryOrphans = $categories
            ->filter(static fn (MenuCategory $c) => ! isset($visited[$c->id]))
            ->sortBy('order')
            ->values();
        $this->nestCategoryChildren($categoryOrphans, $categories);

        return [$categories, $categoryRoots, $categoriesOrdered, $categoryOrphans];
    }

    private function flattenCategoryTreeDfs(Collection $nodes, array &$visited): Collection
    {
        $out = collect();
        foreach ($nodes as $node) {
            if (isset($visited[$node->id])) {
                continue;
            }
            $visited[$node->id] = true;
            $out->push($node);
            if ($node->children->isNotEmpty()) {
                $out = $out->merge($this->flattenCategoryTreeDfs(
                    $node->children->sortBy('order')->values(),
                    $visited
                ));
            }
        }

        return $out;
    }

    private function categorySelectBaseLabel(MenuCategory $cat, Collection $byId, QrMenu $qrMenu): string
    {
        if (! $cat->parent_id) {
            return (string) $cat->name;
        }
        $parent = $byId->get($cat->parent_id);
        if (! $parent || (int) $parent->qr_menu_id !== (int) $qrMenu->id) {
            return (string) $cat->name . ' [ID ' . $cat->id . ' — üst bu QR menüde değil]';
        }

        return (string) $parent->name . ' › ' . (string) $cat->name;
    }

    /**
     * @return array<int, string>
     */
    private function buildCategorySelectLabels(Collection $orderedList, Collection $allCategories, QrMenu $qrMenu): array
    {
        $byId = $allCategories->keyBy('id');
        $rows = [];
        foreach ($orderedList as $cat) {
            $rows[] = [
                'id' => $cat->id,
                'base' => $this->categorySelectBaseLabel($cat, $byId, $qrMenu),
            ];
        }
        $counts = collect($rows)->countBy('base');
        $out = [];
        foreach ($rows as $row) {
            $final = $row['base'];
            if (($counts[$row['base']] ?? 0) > 1) {
                $final = $row['base'] . ' · #' . $row['id'];
            }
            $out[$row['id']] = $final;
        }

        return $out;
    }

    /**
     * Kategori ağacındaki tüm ürün görsellerini sil (DB cascade model olaylarını tetiklemediği için).
     */
    private function purgeCategoryTreeMedia(MenuCategory $category): void
    {
        $category->loadMissing(['menuItems', 'children']);

        foreach ($category->menuItems as $item) {
            if ($item->image) {
                Storage::disk('public')->delete($item->image);
            }
            if (is_array($item->gallery)) {
                foreach ($item->gallery as $path) {
                    if ($path) {
                        Storage::disk('public')->delete($path);
                    }
                }
            }
        }

        foreach ($category->children as $child) {
            $this->purgeCategoryTreeMedia($child);
        }
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
