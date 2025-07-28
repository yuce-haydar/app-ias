<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\SiteSetting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class SettingsController extends Controller
{
    public function index()
    {
        $settings = SiteSetting::getSettings();
        return view('admin.settings.index', compact('settings'));
    }

    public function update(Request $request)
    {
        $request->validate([
            // Site Genel Ayarları
            'site_title' => 'nullable|string|max:255',
            'site_description' => 'nullable|string',
            'site_keywords' => 'nullable|string',
            'site_logo' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'site_favicon' => 'nullable|image|mimes:png,ico|max:1024',
            
            // Header Ayarları
            'header_phone' => 'nullable|string|max:50',
            'header_email' => 'nullable|email|max:100',
            'header_address' => 'nullable|string|max:255',
            'header_announcement' => 'nullable|string',
            'header_announcement_show' => 'boolean',
            
            // Footer Ayarları
            'footer_description' => 'nullable|string',
            'footer_phone' => 'nullable|string|max:50',
            'footer_email' => 'nullable|email|max:100',
            'footer_address' => 'nullable|string|max:255',
            'footer_working_hours' => 'nullable|string|max:255',
            
            // Sosyal Medya
            'social_facebook' => 'nullable|url',
            'social_instagram' => 'nullable|url',
            'social_twitter' => 'nullable|url',
            'social_linkedin' => 'nullable|url',
            'social_youtube' => 'nullable|url',
            'social_whatsapp' => 'nullable|string',
            
            // İletişim Bilgileri
            'contact_phone_1' => 'nullable|string|max:50',
            'contact_phone_2' => 'nullable|string|max:50',
            'contact_email_1' => 'nullable|email|max:100',
            'contact_email_2' => 'nullable|email|max:100',
            'contact_address' => 'nullable|string',
            'contact_google_maps' => 'nullable|string',
            
            // Copyright ve Yasal
            'copyright_text' => 'nullable|string|max:255',
            'founded_year' => 'nullable|integer|min:1900|max:' . date('Y'),
            'privacy_policy' => 'nullable|string',
            'terms_conditions' => 'nullable|string',
            
            // SEO Ayarları
            'google_analytics' => 'nullable|string',
            'facebook_pixel' => 'nullable|string',
            'custom_css' => 'nullable|string',
            'custom_js' => 'nullable|string',
        ]);

        $data = $request->except(['_token', '_method']);
        
        // Handle image uploads
        $imageFields = ['site_logo', 'site_favicon'];
        
        foreach ($imageFields as $field) {
            if ($request->hasFile($field)) {
                // Delete old image if exists
                $settings = SiteSetting::getSettings();
                if ($settings->$field && Storage::disk('public')->exists($settings->$field)) {
                    Storage::disk('public')->delete($settings->$field);
                }
                
                // Upload new image
                $data[$field] = $request->file($field)->store('site', 'public');
            }
        }

        // Convert checkbox values to boolean
        $data['header_announcement_show'] = $request->has('header_announcement_show');

        SiteSetting::updateSettings($data);

        return redirect()->route('admin.site-settings.index')
            ->with('success', 'Site ayarları başarıyla güncellendi!');
    }

    public function deleteImage(Request $request)
    {
        $request->validate([
            'field' => 'required|string|in:site_logo,site_favicon'
        ]);

        $settings = SiteSetting::getSettings();
        $field = $request->field;
        
        if ($settings->$field && Storage::disk('public')->exists($settings->$field)) {
            Storage::disk('public')->delete($settings->$field);
            $settings->update([$field => null]);
        }

        return response()->json(['success' => true]);
    }
}
