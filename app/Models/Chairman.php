<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Chairman extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'title', 
        'message',
        'main_image',
        'gallery',
        'biography',
        'education',
        'experience',
        'achievements',
        'is_active',
        'sort_order'
    ];

    protected $casts = [
        'gallery' => 'array',
        'achievements' => 'array',
        'is_active' => 'boolean'
    ];

    // Scope'lar
    public function scopeActive($query)
    {
        return $query->where('is_active', true);
    }

    public function scopeOrdered($query)
    {
        return $query->orderBy('sort_order')->orderBy('created_at', 'desc');
    }

    // Accessor'lar
    public function getMainImageUrlAttribute()
    {
        if ($this->main_image) {
            return asset('storage/' . $this->main_image);
        }
        return asset('assets/images/team/default-chairman.jpg');
    }

    public function getGalleryUrlsAttribute()
    {
        if ($this->gallery && is_array($this->gallery)) {
            return array_map(function($image) {
                return asset('storage/' . $image);
            }, $this->gallery);
        }
        return [];
    }

    // Helper methods
    public function getShortMessageAttribute()
    {
        // HTML tag'lerini temizle
        $cleanMessage = strip_tags($this->message);
        return \Str::limit($cleanMessage, 200);
    }

    public function getFormattedBiographyAttribute()
    {
        // CKEditor HTML içeriğini direkt kullan, sadece nl2br'dan kaçın
        return $this->biography;
    }

    public function getFormattedMessageAttribute()
    {
        // Mesaj için de HTML içeriği destekle
        return $this->message;
    }
}
