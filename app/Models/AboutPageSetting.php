<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AboutPageSetting extends Model
{
    use HasFactory;

    protected $fillable = [
        'main_title',
        'main_description_1',
        'main_description_2',
        'main_image_1',
        'main_image_2',
        'features',
        'mission_text',
        'vision_text',
        'iframe_code',
    ];

    protected $casts = [
        'features' => 'array',
    ];

    public static function getSettings()
    {
        return self::first() ?? new self();
    }
}
