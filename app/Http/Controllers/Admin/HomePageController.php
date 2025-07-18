<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\HomePageSetting;
use App\Helpers\ImageHelper;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class HomePageController extends Controller
{
    public function index()
    {
        $settings = HomePageSetting::getSettings();
        return view('admin.homepage.index', compact('settings'));
    }

    public function update(Request $request)
    {
        try {
            $validatedData = $request->validate([
                // Hero Slides JSON
                'hero_slides' => 'nullable|array',
                'hero_slides.*.title' => 'nullable|string|max:255',
                'hero_slides.*.description' => 'nullable|string',
                'hero_slides.*.button_text' => 'nullable|string|max:100',
                'hero_slides.*.button_link' => 'nullable|string|max:255',
                'hero_slides.*.image' => 'nullable|image|max:15360',
                'hero_slides.*.small_image' => 'nullable|image|max:15360',
                'hero_slides.*.existing_image' => 'nullable|string',
                'hero_slides.*.existing_small_image' => 'nullable|string',
                
                // About Images JSON
                'about_images' => 'nullable|array',
                'about_images.*.image' => 'nullable|image|max:15360',
                'about_images.*.caption' => 'nullable|string|max:255',
                'about_images.*.existing_image' => 'nullable|string',
                
                // Expertise Images JSON
                'expertise_images' => 'nullable|array',
                'expertise_images.*.image' => 'nullable|image|max:15360',
                'expertise_images.*.caption' => 'nullable|string|max:255',
                'expertise_images.*.type' => 'nullable|string|max:50', // main, gallery
                'expertise_images.*.existing_image' => 'nullable|string',
                
                // Legacy hero fields (for backward compatibility)
                'hero_title_1' => 'nullable|string|max:255',
                'hero_description_1' => 'nullable|string',
                'hero_image_1' => 'nullable|image|max:15360',
                'hero_title_2' => 'nullable|string|max:255',
                'hero_description_2' => 'nullable|string',
                'hero_image_2' => 'nullable|image|max:15360',
                'hero_title_3' => 'nullable|string|max:255',
                'hero_description_3' => 'nullable|string',
                'hero_image_3' => 'nullable|image|max:15360',
                
                // About Section
                'about_title' => 'nullable|string|max:255',
                'about_subtitle' => 'nullable|string|max:255',
                'about_description' => 'nullable|string',
                'about_stat_1_number' => 'nullable|string|max:50',
                'about_stat_1_text' => 'nullable|string|max:100',
                'about_stat_2_number' => 'nullable|string|max:50',
                'about_stat_2_text' => 'nullable|string|max:100',
                'about_image_1' => 'nullable|image|max:15360',
                'about_image_2' => 'nullable|image|max:15360',
                
                // Facilities Section
                'facilities_title' => 'nullable|string|max:255',
                'facilities_subtitle' => 'nullable|string|max:255',
                'facilities_show' => 'boolean',
                
                // Expertise Section
                'expertise_title' => 'nullable|string|max:255',
                'expertise_subtitle' => 'nullable|string|max:255',
                'expertise_description' => 'nullable|string',
                'expertise_stat_1_number' => 'nullable|string|max:50',
                'expertise_stat_1_text' => 'nullable|string|max:100',
                'expertise_stat_2_number' => 'nullable|string|max:50',
                'expertise_stat_2_text' => 'nullable|string|max:100',
                
                // News Section
                'news_title' => 'nullable|string|max:255',
                'news_subtitle' => 'nullable|string|max:255',
                'news_show' => 'boolean',
                'news_count' => 'nullable|integer|min:1|max:10',
                
                // Projects Section
                'projects_title' => 'nullable|string|max:255',
                'projects_subtitle' => 'nullable|string|max:255',
                'projects_show' => 'boolean',
                'projects_map_show' => 'boolean',
                
                // Contact Section
                'contact_title' => 'nullable|string|max:255',
                'contact_subtitle' => 'nullable|string|max:255',
                'contact_show' => 'boolean',
                
                // Footer Iframe
                'footer_iframe_code' => 'nullable|string',
                
                // Additional Iframes
                'slider_iframe_code' => 'nullable|string',
                'contact_iframe_code' => 'nullable|string',
                
                // Breadcrumb Image
                'breadcrumb_image' => 'nullable|image|max:15360',
            ]);

            $settings = HomePageSetting::getSettings();

            // Process Hero Slides JSON
            if (isset($validatedData['hero_slides'])) {
                $heroSlides = [];
                foreach ($validatedData['hero_slides'] as $index => $slide) {
                    $slideData = [
                        'title' => $slide['title'] ?? '',
                        'description' => $slide['description'] ?? '',
                        'button_text' => $slide['button_text'] ?? 'Projelerimizi İncele',
                        'button_link' => $slide['button_link'] ?? '/projects',
                    ];
                    
                    // Handle main image
                    if (isset($slide['image']) && $slide['image']) {
                        // Delete old image if exists
                        if (isset($slide['existing_image']) && $slide['existing_image']) {
                            ImageHelper::deleteImage($slide['existing_image']);
                        }
                        
                        $slideData['image'] = ImageHelper::compressAndStore(
                            $slide['image'],
                            'homepage/hero'
                        );
                    } else {
                        $slideData['image'] = $slide['existing_image'] ?? '';
                    }
                    
                    // Handle small image
                    if (isset($slide['small_image']) && $slide['small_image']) {
                        // Delete old small image if exists
                        if (isset($slide['existing_small_image']) && $slide['existing_small_image']) {
                            ImageHelper::deleteImage($slide['existing_small_image']);
                        }
                        
                        $slideData['small_image'] = ImageHelper::compressAndStore(
                            $slide['small_image'],
                            'homepage/hero'
                        );
                    } else {
                        $slideData['small_image'] = $slide['existing_small_image'] ?? '';
                    }
                    
                    $heroSlides[] = $slideData;
                }
                $validatedData['hero_slides'] = $heroSlides;
            }

            // Process About Images JSON
            if (isset($validatedData['about_images'])) {
                $aboutImages = [];
                foreach ($validatedData['about_images'] as $index => $image) {
                    $imageData = [
                        'caption' => $image['caption'] ?? '',
                    ];
                    
                    if (isset($image['image']) && $image['image']) {
                        // Delete old image if exists
                        if (isset($image['existing_image']) && $image['existing_image']) {
                            ImageHelper::deleteImage($image['existing_image']);
                        }
                        
                        $imageData['image'] = ImageHelper::compressAndStore(
                            $image['image'],
                            'homepage/about'
                        );
                    } else {
                        $imageData['image'] = $image['existing_image'] ?? '';
                    }
                    
                    if ($imageData['image']) { // Only add if image exists
                        $aboutImages[] = $imageData;
                    }
                }
                $validatedData['about_images'] = $aboutImages;
            }

            // Process Expertise Images JSON
            if (isset($validatedData['expertise_images'])) {
                $expertiseImages = [];
                foreach ($validatedData['expertise_images'] as $index => $image) {
                    $imageData = [
                        'caption' => $image['caption'] ?? '',
                        'type' => $image['type'] ?? 'gallery',
                    ];
                    
                    if (isset($image['image']) && $image['image']) {
                        // Delete old image if exists
                        if (isset($image['existing_image']) && $image['existing_image']) {
                            ImageHelper::deleteImage($image['existing_image']);
                        }
                        
                        $imageData['image'] = ImageHelper::compressAndStore(
                            $image['image'],
                            'homepage/expertise'
                        );
                    } else {
                        $imageData['image'] = $image['existing_image'] ?? '';
                    }
                    
                    if ($imageData['image']) { // Only add if image exists
                        $expertiseImages[] = $imageData;
                    }
                }
                $validatedData['expertise_images'] = $expertiseImages;
            }

            // Handle legacy image uploads (for backward compatibility)
            foreach (['hero_image_1', 'hero_image_2', 'hero_image_3', 'about_image_1', 'about_image_2', 'breadcrumb_image'] as $imageField) {
                if ($request->hasFile($imageField)) {
                    // Delete old image if exists
                    if ($settings->$imageField) {
                        ImageHelper::deleteImage($settings->$imageField);
                    }
                    
                    // Upload new image
                    $validatedData[$imageField] = ImageHelper::compressAndStore(
                        $request->file($imageField),
                        'homepage'
                    );
                }
            }

            // Convert checkbox values to boolean
            $booleanFields = ['facilities_show', 'news_show', 'projects_show', 'projects_map_show', 'contact_show'];
            foreach ($booleanFields as $field) {
                $validatedData[$field] = $request->has($field);
            }

            $settings->update($validatedData);

            return redirect()->route('admin.homepage.index')
                ->with('success', 'Ana sayfa ayarları başarıyla güncellendi.');

        } catch (\Exception $e) {
            return redirect()->back()
                ->withInput()
                ->with('error', 'Bir hata oluştu: ' . $e->getMessage());
        }
    }

    public function deleteImage(Request $request)
    {
        try {
            $settings = HomePageSetting::getSettings();

            // JSON slider görsellerini işle
            if ($request->has('type') && $request->has('index')) {
                $type = $request->input('type');
                $index = $request->input('index');
                $imageType = $request->input('imageType', 'image');

                if ($type === 'hero_slides') {
                    $heroSlides = $settings->hero_slides ?? [];
                    if (isset($heroSlides[$index][$imageType]) && $heroSlides[$index][$imageType]) {
                        ImageHelper::deleteImage($heroSlides[$index][$imageType]);
                        $heroSlides[$index][$imageType] = '';
                        $settings->update(['hero_slides' => $heroSlides]);
                    }
                } elseif ($type === 'about_images') {
                    $aboutImages = $settings->about_images ?? [];
                    if (isset($aboutImages[$index]['image']) && $aboutImages[$index]['image']) {
                        ImageHelper::deleteImage($aboutImages[$index]['image']);
                        unset($aboutImages[$index]); // About images için tüm öğeyi sil
                        $aboutImages = array_values($aboutImages); // Array'i yeniden indexle
                        $settings->update(['about_images' => $aboutImages]);
                    }
                } elseif ($type === 'expertise_images') {
                    $expertiseImages = $settings->expertise_images ?? [];
                    if (isset($expertiseImages[$index]['image']) && $expertiseImages[$index]['image']) {
                        ImageHelper::deleteImage($expertiseImages[$index]['image']);
                        unset($expertiseImages[$index]); // Expertise images için tüm öğeyi sil
                        $expertiseImages = array_values($expertiseImages); // Array'i yeniden indexle
                        $settings->update(['expertise_images' => $expertiseImages]);
                    }
                }
            } else {
                // Legacy field silme
                $request->validate([
                    'field' => 'required|string|in:hero_image_1,hero_image_2,hero_image_3,about_image_1,about_image_2,breadcrumb_image'
                ]);

                $field = $request->field;
                
                if ($settings->$field) {
                    ImageHelper::deleteImage($settings->$field);
                    $settings->update([$field => null]);
                }
            }

            return response()->json(['success' => true]);
        } catch (\Exception $e) {
            return response()->json(['success' => false, 'message' => $e->getMessage()], 500);
        }
    }
}
