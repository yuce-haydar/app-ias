<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class SettingsController extends Controller
{
    public function index()
    {
        $settings = $this->getSettings();
        return view('admin.settings.index', compact('settings'));
    }

    public function update(Request $request)
    {
        $request->validate([
            'site_name' => 'required|string|max:255',
            'site_description' => 'nullable|string|max:500',
            'contact_email' => 'required|email|max:255',
            'contact_phone' => 'nullable|string|max:20',
            'contact_address' => 'nullable|string|max:500',
            'social_facebook' => 'nullable|url|max:255',
            'social_twitter' => 'nullable|url|max:255',
            'social_instagram' => 'nullable|url|max:255',
            'social_linkedin' => 'nullable|url|max:255',
            'logo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'favicon' => 'nullable|image|mimes:jpeg,png,jpg,gif,ico|max:1024',
            'meta_title' => 'nullable|string|max:255',
            'meta_description' => 'nullable|string|max:500',
            'meta_keywords' => 'nullable|string|max:500',
            'google_analytics' => 'nullable|string',
            'footer_text' => 'nullable|string|max:500',
        ]);

        $settings = $this->getSettings();

        // Logo yükleme
        if ($request->hasFile('logo')) {
            if (isset($settings['logo']) && $settings['logo']) {
                Storage::disk('public')->delete($settings['logo']);
            }
            $settings['logo'] = $request->file('logo')->store('settings', 'public');
        }

        // Favicon yükleme
        if ($request->hasFile('favicon')) {
            if (isset($settings['favicon']) && $settings['favicon']) {
                Storage::disk('public')->delete($settings['favicon']);
            }
            $settings['favicon'] = $request->file('favicon')->store('settings', 'public');
        }

        // Diğer ayarları güncelle
        foreach ($request->except(['logo', 'favicon', '_token']) as $key => $value) {
            $settings[$key] = $value;
        }

        $this->saveSettings($settings);

        return redirect()->route('admin.settings.index')
            ->with('success', 'Ayarlar başarıyla güncellendi.');
    }

    private function getSettings()
    {
        $settingsFile = storage_path('app/settings.json');
        
        if (file_exists($settingsFile)) {
            return json_decode(file_get_contents($settingsFile), true);
        }

        return [
            'site_name' => 'Hatay İmar A.Ş.',
            'site_description' => 'Hatay İmar ve Şehircilik A.Ş.',
            'contact_email' => 'info@hatayimar.com',
            'contact_phone' => '+90 326 000 00 00',
            'contact_address' => 'Hatay, Türkiye',
            'social_facebook' => '',
            'social_twitter' => '',
            'social_instagram' => '',
            'social_linkedin' => '',
            'logo' => '',
            'favicon' => '',
            'meta_title' => 'Hatay İmar A.Ş.',
            'meta_description' => 'Hatay İmar ve Şehircilik A.Ş.',
            'meta_keywords' => 'hatay, imar, şehircilik',
            'google_analytics' => '',
            'footer_text' => '© 2024 Hatay İmar A.Ş. Tüm hakları saklıdır.',
        ];
    }

    private function saveSettings($settings)
    {
        $settingsFile = storage_path('app/settings.json');
        file_put_contents($settingsFile, json_encode($settings, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE));
    }
} 