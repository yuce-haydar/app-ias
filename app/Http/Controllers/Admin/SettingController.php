<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Setting;
use Illuminate\Http\Request;

class SettingController extends Controller
{
    /**
     * Display the settings page.
     */
    public function index()
    {
        $settings = Setting::all()->groupBy('group');
        
        // Default settings if none exist
        if ($settings->isEmpty()) {
            $this->createDefaultSettings();
            $settings = Setting::all()->groupBy('group');
        }

        return view('admin.settings.index', compact('settings'));
    }

    /**
     * Store/Update settings.
     */
    public function store(Request $request)
    {
        $settingsData = $request->except(['_token']);

        foreach ($settingsData as $key => $value) {
            Setting::set($key, $value);
        }

        return redirect()->route('admin.settings.index')
                        ->with('success', 'Ayarlar başarıyla güncellendi.');
    }

    /**
     * Create default settings
     */
    private function createDefaultSettings()
    {
        $defaultSettings = [
            // Site Ayarları
            [
                'key' => 'site_name',
                'value' => 'İnşaat A.Ş.',
                'type' => 'text',
                'group' => 'site',
                'label' => 'Site Adı',
                'description' => 'Web sitesinin adı'
            ],
            [
                'key' => 'site_description',
                'value' => 'İnşaat ve Mühendislik Hizmetleri',
                'type' => 'text',
                'group' => 'site',
                'label' => 'Site Açıklaması',
                'description' => 'Web sitesinin kısa açıklaması'
            ],
            [
                'key' => 'site_keywords',
                'value' => 'inşaat, mühendislik, proje, ihale',
                'type' => 'text',
                'group' => 'site',
                'label' => 'Anahtar Kelimeler',
                'description' => 'SEO için anahtar kelimeler'
            ],
            [
                'key' => 'site_logo',
                'value' => '',
                'type' => 'file',
                'group' => 'site',
                'label' => 'Site Logosu',
                'description' => 'Web sitesi logosu'
            ],

            // İletişim Bilgileri
            [
                'key' => 'contact_email',
                'value' => 'info@example.com',
                'type' => 'email',
                'group' => 'contact',
                'label' => 'İletişim E-postası',
                'description' => 'Ana iletişim e-posta adresi'
            ],
            [
                'key' => 'contact_phone',
                'value' => '',
                'type' => 'text',
                'group' => 'contact',
                'label' => 'Telefon',
                'description' => 'Ana telefon numarası'
            ],
            [
                'key' => 'contact_address',
                'value' => '',
                'type' => 'textarea',
                'group' => 'contact',
                'label' => 'Adres',
                'description' => 'Şirket adresi'
            ],

            // Sosyal Medya
            [
                'key' => 'social_facebook',
                'value' => '',
                'type' => 'url',
                'group' => 'social',
                'label' => 'Facebook',
                'description' => 'Facebook sayfa linki'
            ],
            [
                'key' => 'social_twitter',
                'value' => '',
                'type' => 'url',
                'group' => 'social',
                'label' => 'Twitter',
                'description' => 'Twitter profil linki'
            ],
            [
                'key' => 'social_linkedin',
                'value' => '',
                'type' => 'url',
                'group' => 'social',
                'label' => 'LinkedIn',
                'description' => 'LinkedIn şirket sayfası'
            ],
            [
                'key' => 'social_instagram',
                'value' => '',
                'type' => 'url',
                'group' => 'social',
                'label' => 'Instagram',
                'description' => 'Instagram profil linki'
            ],

            // SEO Ayarları
            [
                'key' => 'seo_google_analytics',
                'value' => '',
                'type' => 'text',
                'group' => 'seo',
                'label' => 'Google Analytics ID',
                'description' => 'Google Analytics izleme kodu'
            ],
            [
                'key' => 'seo_google_search_console',
                'value' => '',
                'type' => 'text',
                'group' => 'seo',
                'label' => 'Google Search Console',
                'description' => 'Google Search Console doğrulama kodu'
            ]
        ];

        foreach ($defaultSettings as $setting) {
            Setting::create($setting);
        }
    }
}
