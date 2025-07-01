<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class HomePageController extends Controller
{
    /**
     * Ana sayfa yönetim sayfasını gösterir.
     */
    public function index()
    {
        $settings = \DB::table('home_page_settings')->first();
        
        if (!$settings) {
            // Eğer ayarlar yoksa varsayılan bir kayıt oluştur
            $settings = \DB::table('home_page_settings')->insertGetId([
                'sliders' => json_encode([]),
                'about_title' => 'Hakkımızda',
                'about_content' => 'Şirketimiz hakkında bilgiler burada yer alacak.',
                'services_title' => 'Hizmetlerimiz',
                'projects_title' => 'Projelerimiz',
                'news_title' => 'Haberler',
                'cta_title' => 'Bizimle İletişime Geçin',
                'meta_title' => 'Ana Sayfa - Hatay İmar',
                'meta_description' => 'Hatay İmar olarak Kaliteli Hizmeti, Özverili Çalışmayı, Değer Katmayı temel prensip edinip, var gücümüzle çalışmaktayız.',
                'created_at' => now(),
                'updated_at' => now(),
            ]);
            
            $settings = \DB::table('home_page_settings')->first();
        }
        
        return view('admin.homepage.index', compact('settings'));
    }
    
    /**
     * Ana sayfa ayarlarını günceller.
     */
    public function update(Request $request)
    {
        $validated = $request->validate([
            'is_slider_active' => 'sometimes|boolean',
            'is_about_section_active' => 'sometimes|boolean',
            'is_services_section_active' => 'sometimes|boolean',
            'is_projects_section_active' => 'sometimes|boolean',
            'is_news_section_active' => 'sometimes|boolean',
            'is_stats_section_active' => 'sometimes|boolean',
            'is_cta_section_active' => 'sometimes|boolean',
            'is_video_section_active' => 'sometimes|boolean',
            
            'about_title' => 'nullable|string|max:255',
            'about_content' => 'nullable|string',
            'about_button_text' => 'nullable|string|max:255',
            'about_button_link' => 'nullable|string|max:255',
            
            'services_title' => 'nullable|string|max:255',
            'services_description' => 'nullable|string',
            'featured_services_count' => 'nullable|integer|min:1|max:20',
            'services_show_only_featured' => 'sometimes|boolean',
            
            'projects_title' => 'nullable|string|max:255',
            'projects_description' => 'nullable|string',
            'featured_projects_count' => 'nullable|integer|min:1|max:20',
            'projects_show_only_featured' => 'sometimes|boolean',
            
            'news_title' => 'nullable|string|max:255',
            'news_description' => 'nullable|string',
            'featured_news_count' => 'nullable|integer|min:1|max:20',
            'news_show_only_featured' => 'sometimes|boolean',
            
            'cta_title' => 'nullable|string|max:255',
            'cta_description' => 'nullable|string',
            'cta_button_text' => 'nullable|string|max:255',
            'cta_button_link' => 'nullable|string|max:255',
            
            'video_title' => 'nullable|string|max:255',
            'video_description' => 'nullable|string',
            'video_url' => 'nullable|url|max:255',
            
            'meta_title' => 'nullable|string|max:255',
            'meta_description' => 'nullable|string',
            'meta_keywords' => 'nullable|string|max:255',
        ]);
        
        $settings = \DB::table('home_page_settings')->first();
        
        // Görsel yükleme işlemleri
        if ($request->hasFile('about_image') && $request->file('about_image')->isValid()) {
            if ($settings && $settings->about_image) {
                Storage::disk('public')->delete($settings->about_image);
            }
            $validated['about_image'] = $request->file('about_image')->store('homepage', 'public');
        }
        
        if ($request->hasFile('stats_background_image') && $request->file('stats_background_image')->isValid()) {
            if ($settings && $settings->stats_background_image) {
                Storage::disk('public')->delete($settings->stats_background_image);
            }
            $validated['stats_background_image'] = $request->file('stats_background_image')->store('homepage', 'public');
        }
        
        if ($request->hasFile('cta_background_image') && $request->file('cta_background_image')->isValid()) {
            if ($settings && $settings->cta_background_image) {
                Storage::disk('public')->delete($settings->cta_background_image);
            }
            $validated['cta_background_image'] = $request->file('cta_background_image')->store('homepage', 'public');
        }
        
        if ($request->hasFile('video_cover_image') && $request->file('video_cover_image')->isValid()) {
            if ($settings && $settings->video_cover_image) {
                Storage::disk('public')->delete($settings->video_cover_image);
            }
            $validated['video_cover_image'] = $request->file('video_cover_image')->store('homepage', 'public');
        }
        
        if ($request->hasFile('og_image') && $request->file('og_image')->isValid()) {
            if ($settings && $settings->og_image) {
                Storage::disk('public')->delete($settings->og_image);
            }
            $validated['og_image'] = $request->file('og_image')->store('homepage', 'public');
        }
        
        // Slider JSON işleme
        if ($request->has('sliders')) {
            $sliders = [];
            
            foreach ($request->sliders as $index => $slider) {
                if (isset($slider['title']) || isset($slider['description']) || (isset($slider['image']) && $slider['image']->isValid())) {
                    $sliderData = [
                        'title' => $slider['title'] ?? '',
                        'description' => $slider['description'] ?? '',
                        'button_text' => $slider['button_text'] ?? '',
                        'button_link' => $slider['button_link'] ?? '',
                    ];
                    
                    // Eğer yeni bir resim yüklendiyse
                    if (isset($slider['image']) && $slider['image']->isValid()) {
                        $sliderData['image'] = $slider['image']->store('homepage/sliders', 'public');
                    } 
                    // Eğer mevcut bir resim varsa
                    elseif (isset($slider['existing_image'])) {
                        $sliderData['image'] = $slider['existing_image'];
                    }
                    
                    $sliders[] = $sliderData;
                }
            }
            
            $validated['sliders'] = json_encode($sliders);
        }
        
        // İstatistik verilerini JSON olarak kaydet
        if ($request->has('statistics')) {
            $statistics = [];
            
            foreach ($request->statistics as $index => $stat) {
                if (isset($stat['title']) || isset($stat['value']) || isset($stat['icon'])) {
                    $statistics[] = [
                        'title' => $stat['title'] ?? '',
                        'value' => $stat['value'] ?? '',
                        'icon' => $stat['icon'] ?? '',
                    ];
                }
            }
            
            $validated['statistics'] = json_encode($statistics);
        }
        
        $validated['updated_at'] = now();
        
        if ($settings) {
            \DB::table('home_page_settings')->where('id', $settings->id)->update($validated);
        } else {
            $validated['created_at'] = now();
            \DB::table('home_page_settings')->insert($validated);
        }
        
        return redirect()->route('admin.homepage.index')->with('success', 'Ana sayfa ayarları başarıyla güncellendi.');
    }
    
    /**
     * Bir görseli siler
     */
    public function deleteImage(Request $request)
    {
        $validated = $request->validate([
            'image_type' => 'required|string|in:about_image,stats_background_image,cta_background_image,video_cover_image,og_image,slider',
            'slider_index' => 'required_if:image_type,slider|integer|min:0',
        ]);
        
        $settings = \DB::table('home_page_settings')->first();
        
        if (!$settings) {
            return response()->json(['error' => 'Ayarlar bulunamadı.'], 404);
        }
        
        // Slider resmi silme
        if ($validated['image_type'] === 'slider' && isset($validated['slider_index'])) {
            $sliders = json_decode($settings->sliders, true) ?: [];
            
            if (isset($sliders[$validated['slider_index']]['image'])) {
                Storage::disk('public')->delete($sliders[$validated['slider_index']]['image']);
                unset($sliders[$validated['slider_index']]['image']);
                
                // Diziyi yeniden indeksle
                $sliders = array_values($sliders);
                
                \DB::table('home_page_settings')
                    ->where('id', $settings->id)
                    ->update(['sliders' => json_encode($sliders)]);
                
                return response()->json(['success' => true]);
            }
        } 
        // Diğer resim türleri için
        else {
            $column = $validated['image_type'];
            
            if ($settings->$column) {
                Storage::disk('public')->delete($settings->$column);
                
                \DB::table('home_page_settings')
                    ->where('id', $settings->id)
                    ->update([$column => null]);
                
                return response()->json(['success' => true]);
            }
        }
        
        return response()->json(['error' => 'Resim bulunamadı.'], 404);
    }
}
