<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ContactSettings extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'subtitle',
        'title',
        'description',
        'office_title',
        'office_address',
        'phone_title',
        'phone_general',
        'phone_fax',
        'email_title',
        'email_info',
        'email_contact',
        'working_hours_title',
        'working_hours_weekday',
        'working_hours_weekend',
        'facebook_url',
        'twitter_url',
        'instagram_url',
        'youtube_url',
        'map_embed_code',
    ];
    
    // Singleton pattern - sadece 1 kayıt olsun
    public static function getSettings()
    {
        $settings = self::first();
        if (!$settings) {
            $settings = self::create([]);
        }
        return $settings;
    }
}
