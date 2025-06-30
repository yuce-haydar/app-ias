<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SiteSetting extends Model
{
    use HasFactory;

    protected $fillable = [
        // Site Genel Ayarları
        'site_title',
        'site_description',
        'site_keywords',
        'site_logo',
        'site_favicon',
        
        // Header Ayarları
        'header_phone',
        'header_email',
        'header_address',
        'header_announcement',
        'header_announcement_show',
        
        // Footer Ayarları
        'footer_description',
        'footer_phone',
        'footer_email',
        'footer_address',
        'footer_working_hours',
        
        // Sosyal Medya
        'social_facebook',
        'social_instagram',
        'social_twitter',
        'social_linkedin',
        'social_youtube',
        'social_whatsapp',
        
        // İletişim Bilgileri
        'contact_phone_1',
        'contact_phone_2',
        'contact_email_1',
        'contact_email_2',
        'contact_address',
        'contact_google_maps',
        
        // Copyright ve Yasal
        'copyright_text',
        'founded_year',
        'privacy_policy',
        'terms_conditions',
        
        // SEO Ayarları
        'google_analytics',
        'facebook_pixel',
        'custom_css',
        'custom_js',
    ];

    protected $casts = [
        'header_announcement_show' => 'boolean',
        'founded_year' => 'integer',
    ];

    /**
     * Get site settings (singleton pattern)
     */
    public static function getSettings()
    {
        return static::first() ?? static::create([]);
    }

    /**
     * Update site settings
     */
    public static function updateSettings(array $data)
    {
        $settings = static::getSettings();
        return $settings->update($data);
    }
}
