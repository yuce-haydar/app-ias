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
        $request->validate([
            'main_title' => 'required|string|max:255',
            'main_description_1' => 'required|string',
            'main_description_2' => 'required|string',
            'main_image_1' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:15360',
            'main_image_2' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:15360',
            'features' => 'nullable|array',
            'features.*' => 'string|max:255',
            'mission_text' => 'required|string',
            'vision_text' => 'required|string',
        ]);

        $settings = AboutPageSetting::firstOrCreate([]);
        
        // Ana resim yükleme
        if ($request->hasFile('main_image_1')) {
            // Eski resmi sil
            if ($settings->main_image_1) {
                Storage::delete('public/' . $settings->main_image_1);
            }
            
            $imagePath = $request->file('main_image_1')->store('about-page', 'public');
            $settings->main_image_1 = $imagePath;
        }

        if ($request->hasFile('main_image_2')) {
            // Eski resmi sil
            if ($settings->main_image_2) {
                Storage::delete('public/' . $settings->main_image_2);
            }
            
            $imagePath = $request->file('main_image_2')->store('about-page', 'public');
            $settings->main_image_2 = $imagePath;
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
        ]);

        return back()->with('success', 'Hakkımızda sayfası başarıyla güncellendi.');
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
