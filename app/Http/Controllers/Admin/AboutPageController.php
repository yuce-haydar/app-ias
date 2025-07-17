<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\AboutPageSetting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AboutPageController extends Controller
{
    public function index()
    {
        $settings = AboutPageSetting::getSettings();
        return view('admin.about-page.index', compact('settings'));
    }

    public function update(Request $request)
    {
        try {
            // Debug: Yüklenen dosya bilgilerini logla
            if ($request->hasFile('main_image_1')) {
                $file = $request->file('main_image_1');
                \Log::info('=== Main Image 1 Debug Info ===');
                \Log::info('Original Name: ' . $file->getClientOriginalName());
                \Log::info('Size: ' . $file->getSize() . ' bytes (' . round($file->getSize() / 1024, 2) . ' KB)');
                \Log::info('MIME Type: ' . $file->getMimeType());
                \Log::info('Extension: ' . $file->getClientOriginalExtension());
                \Log::info('Is Valid: ' . ($file->isValid() ? 'Yes' : 'No'));
                \Log::info('Path: ' . $file->path());
            }

            if ($request->hasFile('main_image_2')) {
                $file = $request->file('main_image_2');
                \Log::info('=== Main Image 2 Debug Info ===');
                \Log::info('Original Name: ' . $file->getClientOriginalName());
                \Log::info('Size: ' . $file->getSize() . ' bytes (' . round($file->getSize() / 1024, 2) . ' KB)');
                \Log::info('MIME Type: ' . $file->getMimeType());
                \Log::info('Extension: ' . $file->getClientOriginalExtension());
                \Log::info('Is Valid: ' . ($file->isValid() ? 'Yes' : 'No'));
                \Log::info('Path: ' . $file->path());
            }

            // Daha esnek validation
            $validationRules = [
                'main_title' => 'required|string|max:255',
                'main_description_1' => 'required|string',
                'main_description_2' => 'required|string',
                'features' => 'nullable|array',
                'features.*' => 'string|max:255',
                'mission_text' => 'required|string',
                'vision_text' => 'required|string',
                'iframe_code' => 'nullable|string',
            ];

            // Sadece dosya yüklendiyse image validation ekle
            if ($request->hasFile('main_image_1')) {
                $validationRules['main_image_1'] = 'file|max:10240';
            }

            if ($request->hasFile('main_image_2')) {
                $validationRules['main_image_2'] = 'file|max:10240';
            }

            $request->validate($validationRules, [
                'main_image_1.file' => 'Ana Resim 1 geçerli bir dosya olmalıdır.',
                'main_image_1.max' => 'Ana Resim 1 boyutu 10MB\'dan küçük olmalıdır.',
                'main_image_2.file' => 'Ana Resim 2 geçerli bir dosya olmalıdır.',
                'main_image_2.max' => 'Ana Resim 2 boyutu 10MB\'dan küçük olmalıdır.',
                'main_title.required' => 'Ana başlık gereklidir.',
                'main_description_1.required' => 'İlk paragraf gereklidir.',
                'main_description_2.required' => 'İkinci paragraf gereklidir.',
                'mission_text.required' => 'Misyon metni gereklidir.',
                'vision_text.required' => 'Vizyon metni gereklidir.'
            ]);

            // Manuel resim formatı kontrolü (WebP dahil)
            $allowedMimeTypes = ['image/jpeg', 'image/png', 'image/jpg', 'image/gif', 'image/svg+xml', 'image/webp'];
            $allowedExtensions = ['jpg', 'jpeg', 'png', 'gif', 'svg', 'webp'];

            if ($request->hasFile('main_image_1')) {
                $file = $request->file('main_image_1');
                if (!in_array($file->getMimeType(), $allowedMimeTypes) && !in_array(strtolower($file->getClientOriginalExtension()), $allowedExtensions)) {
                    return back()->with('error', 'Ana Resim 1 geçerli bir resim formatında olmalıdır (JPEG, PNG, JPG, GIF, SVG, WebP)')->withInput();
                }
            }

            if ($request->hasFile('main_image_2')) {
                $file = $request->file('main_image_2');
                if (!in_array($file->getMimeType(), $allowedMimeTypes) && !in_array(strtolower($file->getClientOriginalExtension()), $allowedExtensions)) {
                    return back()->with('error', 'Ana Resim 2 geçerli bir resim formatında olmalıdır (JPEG, PNG, JPG, GIF, SVG, WebP)')->withInput();
                }
            }

            $settings = AboutPageSetting::firstOrCreate([]);
            
            // Ana resim yükleme
            if ($request->hasFile('main_image_1')) {
                \Log::info('About page: main_image_1 dosyası yükleniyor');
                
                // Eski resmi sil
                if ($settings->main_image_1) {
                    Storage::delete('public/' . $settings->main_image_1);
                }
                
                $imagePath = $request->file('main_image_1')->store('about-page', 'public');
                $settings->main_image_1 = $imagePath;
                
                \Log::info('About page: main_image_1 başarıyla yüklendi: ' . $imagePath);
            }

            if ($request->hasFile('main_image_2')) {
                \Log::info('About page: main_image_2 dosyası yükleniyor');
                
                // Eski resmi sil
                if ($settings->main_image_2) {
                    Storage::delete('public/' . $settings->main_image_2);
                }
                
                $imagePath = $request->file('main_image_2')->store('about-page', 'public');
                $settings->main_image_2 = $imagePath;
                
                \Log::info('About page: main_image_2 başarıyla yüklendi: ' . $imagePath);
            }

        // Özellik listesini filtrele (boş olanları çıkar)
        $features = array_filter($request->features ?? [], function($feature) {
            return !empty(trim($feature));
        });

            $settings->update([
                'main_title' => $request->main_title,
                'main_description_1' => $request->main_description_1,
                'main_description_2' => $request->main_description_2,
                'features' => array_values($features),
                'mission_text' => $request->mission_text,
                'vision_text' => $request->vision_text,
                'iframe_code' => $request->iframe_code,
            ]);

            return back()->with('success', 'Hakkımızda sayfası başarıyla güncellendi.');
        } catch (\Exception $e) {
            \Log::error('About page update error: ' . $e->getMessage());
            return back()->with('error', 'Bir hata oluştu: ' . $e->getMessage())->withInput();
        }
    }

    public function deleteImage(Request $request)
    {
        $request->validate([
            'image_field' => 'required|in:main_image_1,main_image_2',
        ]);

        $settings = AboutPageSetting::first();
        
        if ($settings && $settings->{$request->image_field}) {
            Storage::delete('public/' . $settings->{$request->image_field});
            $settings->{$request->image_field} = null;
            $settings->save();
        }

        return back()->with('success', 'Resim başarıyla silindi.');
    }
}
