<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HomePageSetting extends Model
{
    use HasFactory;

    protected $fillable = [
        // Hero Slider Settings
        'hero_title_1',
        'hero_description_1',
        'hero_image_1',
        'hero_title_2',
        'hero_description_2',
        'hero_image_2',
        'hero_title_3',
        'hero_description_3',
        'hero_image_3',
        
        // About Section
        'about_title',
        'about_subtitle',
        'about_description',
        'about_stat_1_number',
        'about_stat_1_text',
        'about_stat_2_number',
        'about_stat_2_text',
        'about_image_1',
        'about_image_2',
        
        // Completed Facilities Section
        'facilities_title',
        'facilities_subtitle',
        'facilities_show',
        
        // Construction Expertise Section  
        'expertise_title',
        'expertise_subtitle',
        'expertise_description',
        'expertise_stat_1_number',
        'expertise_stat_1_text',
        'expertise_stat_2_number',
        'expertise_stat_2_text',
        
        // News Section
        'news_title',
        'news_subtitle',
        'news_show',
        'news_count',
        
        // Projects Section
        'projects_title',
        'projects_subtitle',
        'projects_show',
        'projects_map_show',
        
        // Contact CTA Section
        'contact_title',
        'contact_subtitle',
        'contact_show',
        
        // Footer Iframe
        'footer_iframe_code',
        
        // Additional Iframes
        'slider_iframe_code',
        'contact_iframe_codes',
        
        // JSON Sliders
        'hero_slides',
        'about_images',
        'expertise_images',
        
        // Breadcrumb Image
        'breadcrumb_image',
    ];

    protected $casts = [
        'facilities_show' => 'boolean',
        'news_show' => 'boolean',
        'projects_show' => 'boolean',
        'projects_map_show' => 'boolean',
        'contact_show' => 'boolean',
        'news_count' => 'integer',
        'hero_slides' => 'array',
        'about_images' => 'array',
        'expertise_images' => 'array',
        'contact_iframe_codes' => 'array',
    ];

    /**
     * Get homepage settings (singleton pattern)
     */
    public static function getSettings()
    {
        return static::first() ?? static::create([]);
    }

    /**
     * Update homepage settings
     */
    public static function updateSettings(array $data)
    {
        $settings = static::getSettings();
        return $settings->update($data);
    }
}
