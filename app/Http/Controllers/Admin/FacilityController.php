<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Facility;
use App\Models\QrMenu;
use App\Models\QrMenuUser;
use App\Helpers\ImageHelper;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class FacilityController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $facilities = Facility::orderBy('sort_order', 'asc')
            ->orderBy('created_at', 'desc')
            ->paginate(10);
            
        return view('admin.facilities.index', compact('facilities'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.facilities.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'short_description' => 'required|string',
            'description' => 'required|string',
            'facility_type' => 'required|string',
            'category' => 'nullable|string',
            'status' => 'required|in:active,inactive',
            'opening_date' => 'nullable|date',
            'capacity' => 'nullable|string',
            'features' => 'nullable|string',
            'working_hours' => 'nullable|string',
            'address' => 'nullable|string',
            'phone' => 'nullable|string',
            'email' => 'nullable|email',
            'google_maps_link' => 'nullable|url',
            'latitude' => 'nullable|numeric',
            'longitude' => 'nullable|numeric',
            'sort_order' => 'nullable|integer',
            'is_featured' => 'boolean',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:15360',
            'gallery.*' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:15360'
        ]);

        // Text alanlarını array'e çevir
        if ($validated['features']) {
            $validated['features'] = array_filter(array_map('trim', explode("\n", $validated['features'])));
        }
        if ($validated['working_hours']) {
            $validated['working_hours'] = array_filter(array_map('trim', explode(",", $validated['working_hours'])));
        }

        // Handle image upload with compression
        if ($request->hasFile('image')) {
            $imageFile = $request->file('image');
            
            // Dosya boyutu ve türü kontrolü
            if (!ImageHelper::checkFileSize($imageFile, 15)) {
                return back()->withErrors(['image' => 'Görsel dosyası 15MB\'dan büyük olamaz.']);
            }
            
            if (!ImageHelper::isValidImageType($imageFile)) {
                return back()->withErrors(['image' => 'Geçersiz görsel formatı. JPG, JPEG, PNG, WEBP, GIF desteklenir.']);
            }
            
            $validated['image'] = ImageHelper::compressAndStore($imageFile, 'tesisler');
        }

        // Handle gallery upload with compression
        if ($request->hasFile('gallery')) {
            $gallery = [];
            foreach ($request->file('gallery') as $file) {
                // Dosya boyutu ve türü kontrolü
                if (!ImageHelper::checkFileSize($file, 15)) {
                    return back()->withErrors(['gallery' => 'Galeri görsellerinden biri 15MB\'dan büyük.']);
                }
                
                if (!ImageHelper::isValidImageType($file)) {
                    return back()->withErrors(['gallery' => 'Galeri görselleri için geçersiz format.']);
                }
                
                $gallery[] = ImageHelper::compressAndStore($file, 'tesisler/gallery');
            }
            $validated['gallery'] = $gallery;
        }

        Facility::create($validated);

        return redirect()->route('admin.facilities.index')
            ->with('success', 'Tesis başarıyla oluşturuldu.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $facility = Facility::findOrFail($id);
        return view('admin.facilities.show', compact('facility'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $facility = Facility::findOrFail($id);
        return view('admin.facilities.edit', compact('facility'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $facility = Facility::findOrFail($id);
        
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'short_description' => 'required|string',
            'description' => 'required|string',
            'facility_type' => 'required|string',
            'category' => 'nullable|string',
            'status' => 'required|in:active,inactive',
            'opening_date' => 'nullable|date',
            'capacity' => 'nullable|string',
            'features' => 'nullable|string',
            'working_hours' => 'nullable|string',
            'address' => 'nullable|string',
            'phone' => 'nullable|string',
            'email' => 'nullable|email',
            'google_maps_link' => 'nullable|url',
            'latitude' => 'nullable|numeric',
            'longitude' => 'nullable|numeric',
            'sort_order' => 'nullable|integer',
            'is_featured' => 'boolean',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:15360',
            'gallery.*' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:15360'
        ]);

        // Text alanlarını array'e çevir
        if ($validated['features']) {
            $validated['features'] = array_filter(array_map('trim', explode("\n", $validated['features'])));
        }
        if ($validated['working_hours']) {
            $validated['working_hours'] = array_filter(array_map('trim', explode(",", $validated['working_hours'])));
        }

        // Handle image removal
        if ($request->input('remove_image') == '1' && $facility->image) {
            ImageHelper::deleteImage($facility->image);
            $validated['image'] = null;
        }

        // Handle image upload with compression
        if ($request->hasFile('image')) {
            $imageFile = $request->file('image');
            
            // Dosya boyutu ve türü kontrolü
            if (!ImageHelper::checkFileSize($imageFile, 15)) {
                return back()->withErrors(['image' => 'Görsel dosyası 15MB\'dan büyük olamaz.']);
            }
            
            if (!ImageHelper::isValidImageType($imageFile)) {
                return back()->withErrors(['image' => 'Geçersiz görsel formatı. JPG, JPEG, PNG, WEBP, GIF desteklenir.']);
            }
            
            // Delete old image if exists
            if ($facility->image) {
                ImageHelper::deleteImage($facility->image);
            }
            
            $validated['image'] = ImageHelper::compressAndStore($imageFile, 'tesisler');
        }

        // Handle gallery image removals
        $gallery = $facility->gallery ?? [];
        if ($request->input('removed_gallery_images')) {
            $removedIndices = json_decode($request->input('removed_gallery_images'), true);
            if (is_array($removedIndices)) {
                foreach ($removedIndices as $index) {
                    if (isset($gallery[$index])) {
                        ImageHelper::deleteImage($gallery[$index]);
                        unset($gallery[$index]);
                    }
                }
                $gallery = array_values($gallery); // Reindex array
            }
        }

        // Handle new gallery uploads with compression
        if ($request->hasFile('gallery')) {
            foreach ($request->file('gallery') as $file) {
                // Dosya boyutu ve türü kontrolü
                if (!ImageHelper::checkFileSize($file, 15)) {
                    return back()->withErrors(['gallery' => 'Galeri görsellerinden biri 15MB\'dan büyük.']);
                }
                
                if (!ImageHelper::isValidImageType($file)) {
                    return back()->withErrors(['gallery' => 'Galeri görselleri için geçersiz format.']);
                }
                
                $gallery[] = ImageHelper::compressAndStore($file, 'tesisler/gallery');
            }
        }
        
        $validated['gallery'] = $gallery;

        $facility->update($validated);

        return redirect()->route('admin.facilities.index')
            ->with('success', 'Tesis başarıyla güncellendi.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $facility = Facility::findOrFail($id);
        
        // Delete image
        if ($facility->image) {
            ImageHelper::deleteImage($facility->image);
        }
        
        // Delete gallery images
        if ($facility->gallery) {
            foreach ($facility->gallery as $image) {
                ImageHelper::deleteImage($image);
            }
        }
        
        $facility->delete();

        return redirect()->route('admin.facilities.index')
            ->with('success', 'Tesis başarıyla silindi.');
    }

    /**
     * QR Menü oluştur formu (GET)
     */
    public function createQrMenu($id)
    {
        $facility = Facility::findOrFail($id);

        // Zaten QR menü varsa hata ver
        if ($facility->qrMenu) {
            return back()->with('error', 'Bu tesis için zaten QR menü oluşturulmuş.');
        }

        return view('admin.facilities.qr-menu.create', compact('facility'));
    }

    /**
     * QR Menü kaydet (POST)
     */
    public function storeQrMenu(Request $request, $id)
    {
        $facility = Facility::findOrFail($id);

        // Zaten QR menü varsa hata ver
        if ($facility->qrMenu) {
            return back()->with('error', 'Bu tesis için zaten QR menü oluşturulmuş.');
        }

        $request->validate([
            'name' => 'required|string|max:255',
            'url_slug' => 'required|string|max:255|unique:qr_menus,url_slug',
            'description' => 'nullable|string',
            'logo' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'primary_color' => 'nullable|string|max:7',
            'secondary_color' => 'nullable|string|max:7',
            'accent_color' => 'nullable|string|max:7',
            'background_color' => 'nullable|string|max:7',
            'admin_name' => 'required|string|max:255',
            'admin_email' => 'required|email|unique:qr_menu_users,email',
            'admin_phone' => 'nullable|string|max:20',
            'admin_password' => 'required|string|min:8',
        ]);

        // Logo yükle
        $logoPath = null;
        if ($request->hasFile('logo')) {
            $logoPath = $request->file('logo')->store('qr-menu/logos', 'public');
        }

        // Tema renklerini hazırla
        $themeColors = [
            'primary' => $request->primary_color ?? '#007bff',
            'secondary' => $request->secondary_color ?? '#6c757d',
            'accent' => $request->accent_color ?? '#28a745',
            'background' => $request->background_color ?? '#ffffff',
        ];

        // QR menü oluştur
        $qrMenu = QrMenu::create([
            'facility_id' => $facility->id,
            'name' => $request->name,
            'url_slug' => Str::slug($request->url_slug),
            'description' => $request->description,
            'logo' => $logoPath,
            'theme_colors' => $themeColors,
            'is_active' => true
        ]);

        // QR kod oluştur
        $qrMenu->generateQrCode();

        // Manager kullanıcı oluştur
        $qrMenu->qrMenuUsers()->create([
            'name' => $request->admin_name,
            'email' => $request->admin_email,
            'phone' => $request->admin_phone,
            'password' => Hash::make($request->admin_password),
            'role' => 'owner',
            'is_active' => true
        ]);

        return redirect()->route('admin.facilities.show', $facility)
            ->with('success', 'QR menü başarıyla oluşturuldu. Menü URL\'si: ' . url("/qr-menu/{$qrMenu->url_slug}"));
    }

    /**
     * QR Menü düzenle formu (GET)
     */
    public function editQrMenu($id)
    {
        $facility = Facility::findOrFail($id);
        $qrMenu = $facility->qrMenu;

        if (!$qrMenu) {
            return back()->with('error', 'Bu tesis için QR menü bulunamadı.');
        }

        return view('admin.facilities.qr-menu.edit', compact('facility', 'qrMenu'));
    }

    /**
     * QR Menü ayarlarını güncelle
     */
    public function updateQrMenu(Request $request, $id)
    {
        $facility = Facility::findOrFail($id);
        $qrMenu = $facility->qrMenu;

        if (!$qrMenu) {
            return back()->with('error', 'Bu tesis için QR menü bulunamadı.');
        }

        $request->validate([
            'name' => 'required|string|max:255',
            'url_slug' => 'required|string|max:255|unique:qr_menus,url_slug,' . $qrMenu->id,
            'description' => 'nullable|string',
            'logo' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'primary_color' => 'nullable|string|max:7',
            'secondary_color' => 'nullable|string|max:7',
            'accent_color' => 'nullable|string|max:7',
            'background_color' => 'nullable|string|max:7',
        ]);

        // Logo yükle
        $logoPath = $qrMenu->logo;
        if ($request->hasFile('logo')) {
            // Eski logoyu sil
            if ($qrMenu->logo) {
                Storage::disk('public')->delete($qrMenu->logo);
            }
            $logoPath = $request->file('logo')->store('qr-menu/logos', 'public');
        }

        // Tema renklerini hazırla
        $themeColors = [
            'primary' => $request->primary_color ?? '#007bff',
            'secondary' => $request->secondary_color ?? '#6c757d',
            'accent' => $request->accent_color ?? '#28a745',
            'background' => $request->background_color ?? '#ffffff',
        ];

        // URL slug değiştiyse QR kod yenile
        $slugChanged = $qrMenu->url_slug !== Str::slug($request->url_slug);

        $qrMenu->update([
            'name' => $request->name,
            'url_slug' => Str::slug($request->url_slug),
            'description' => $request->description,
            'logo' => $logoPath,
            'theme_colors' => $themeColors,
        ]);

        // URL slug değiştiyse QR kod yenile
        if ($slugChanged) {
            $qrMenu->generateQrCode();
        }

        return redirect()->route('admin.facilities.show', $facility)
            ->with('success', 'QR menü ayarları güncellendi.');
    }

    /**
     * QR kod yeniden oluştur
     */
    public function regenerateQrCode($id)
    {
        $facility = Facility::findOrFail($id);
        $qrMenu = $facility->qrMenu;

        if (!$qrMenu) {
            return back()->with('error', 'Bu tesis için QR menü bulunamadı.');
        }

        $qrMenu->generateQrCode();

        return back()->with('success', 'QR kod başarıyla yeniden oluşturuldu.');
    }

    /**
     * QR kod indir
     */
    public function downloadQrCode($id)
    {
        $facility = Facility::findOrFail($id);
        $qrMenu = $facility->qrMenu;

        if (!$qrMenu) {
            return back()->with('error', 'Bu tesis için QR menü bulunamadı.');
        }

        if (!$qrMenu->qr_code_path) {
            $qrMenu->generateQrCode();
        }

        return response()->download(storage_path('app/public/' . $qrMenu->qr_code_path));
    }

    /**
     * QR menü sil
     */
    public function destroyQrMenu($id)
    {
        $facility = Facility::findOrFail($id);
        $qrMenu = $facility->qrMenu;

        if (!$qrMenu) {
            return back()->with('error', 'Bu tesis için QR menü bulunamadı.');
        }

        // QR kod dosyasını sil
        if ($qrMenu->qr_code_path) {
            Storage::disk('public')->delete($qrMenu->qr_code_path);
        }

        // Logo dosyasını sil
        if ($qrMenu->logo) {
            Storage::disk('public')->delete($qrMenu->logo);
        }

        // Menü öğesi resimlerini sil
        foreach ($qrMenu->menuCategories as $category) {
            foreach ($category->menuItems as $item) {
                if ($item->image) {
                    Storage::disk('public')->delete($item->image);
                }
            }
        }

        $qrMenu->delete();

        return back()->with('success', 'QR menü başarıyla silindi.');
    }
}
