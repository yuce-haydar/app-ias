<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\HomePageSetting;
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
        $request->validate([
            // Hero Slider validations
            'hero_title_1' => 'nullable|string|max:255',
            'hero_description_1' => 'nullable|string',
            'hero_image_1' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'hero_title_2' => 'nullable|string|max:255',
            'hero_description_2' => 'nullable|string',
            'hero_image_2' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'hero_title_3' => 'nullable|string|max:255',
            'hero_description_3' => 'nullable|string',
            'hero_image_3' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            
            // About Section validations
            'about_title' => 'nullable|string|max:255',
            'about_subtitle' => 'nullable|string|max:255',
            'about_description' => 'nullable|string',
            'about_stat_1_number' => 'nullable|string|max:50',
            'about_stat_1_text' => 'nullable|string|max:100',
            'about_stat_2_number' => 'nullable|string|max:50',
            'about_stat_2_text' => 'nullable|string|max:100',
            'about_image_1' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'about_image_2' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            
            // Other sections validations
            'facilities_title' => 'nullable|string|max:255',
            'facilities_subtitle' => 'nullable|string|max:255',
            'facilities_show' => 'boolean',
            'expertise_title' => 'nullable|string|max:255',
            'expertise_subtitle' => 'nullable|string|max:255',
            'expertise_description' => 'nullable|string',
            'expertise_stat_1_number' => 'nullable|string|max:50',
            'expertise_stat_1_text' => 'nullable|string|max:100',
            'expertise_stat_2_number' => 'nullable|string|max:50',
            'expertise_stat_2_text' => 'nullable|string|max:100',
            'news_title' => 'nullable|string|max:255',
            'news_subtitle' => 'nullable|string|max:255',
            'news_show' => 'boolean',
            'news_count' => 'nullable|integer|min:1|max:10',
            'projects_title' => 'nullable|string|max:255',
            'projects_subtitle' => 'nullable|string|max:255',
            'projects_show' => 'boolean',
            'projects_map_show' => 'boolean',
            'contact_title' => 'nullable|string|max:255',
            'contact_subtitle' => 'nullable|string|max:255',
            'contact_show' => 'boolean',
        ]);

        $data = $request->except(['_token', '_method']);
        
        // Handle image uploads
        $imageFields = [
            'hero_image_1', 'hero_image_2', 'hero_image_3',
            'about_image_1', 'about_image_2'
        ];
        
        foreach ($imageFields as $field) {
            if ($request->hasFile($field)) {
                // Delete old image if exists
                $settings = HomePageSetting::getSettings();
                if ($settings->$field && Storage::disk('public')->exists($settings->$field)) {
                    Storage::disk('public')->delete($settings->$field);
                }
                
                // Upload new image
                $data[$field] = $request->file($field)->store('homepage', 'public');
            }
        }

        // Convert checkbox values to boolean
        $booleanFields = ['facilities_show', 'news_show', 'projects_show', 'projects_map_show', 'contact_show'];
        foreach ($booleanFields as $field) {
            $data[$field] = $request->has($field);
        }

        HomePageSetting::updateSettings($data);

        return redirect()->route('admin.homepage.index')
            ->with('success', 'Anasayfa ayarları başarıyla güncellendi!');
    }

    public function deleteImage(Request $request)
    {
        $request->validate([
            'field' => 'required|string|in:hero_image_1,hero_image_2,hero_image_3,about_image_1,about_image_2'
        ]);

        $settings = HomePageSetting::getSettings();
        $field = $request->field;
        
        if ($settings->$field && Storage::disk('public')->exists($settings->$field)) {
            Storage::disk('public')->delete($settings->$field);
            $settings->update([$field => null]);
        }

        return response()->json(['success' => true]);
    }
}
