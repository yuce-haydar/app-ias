<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MenuItem extends Model
{
    use HasFactory;

    protected $fillable = [
        'menu_category_id',
        'name',
        'description',
        'price',
        'image',
        'gallery',
        'allergens',
        'ingredients',
        'preparation_time',
        'is_available',
        'is_recommended',
        'order',
        'is_active'
    ];

    protected $casts = [
        'price' => 'decimal:2',
        'gallery' => 'array',
        'allergens' => 'array',
        'ingredients' => 'array',
        'is_available' => 'boolean',
        'is_recommended' => 'boolean',
        'is_active' => 'boolean'
    ];

    // İlişkiler
    public function category()
    {
        return $this->belongsTo(MenuCategory::class, 'menu_category_id');
    }

    // Resim URL'si
    public function getImageUrlAttribute()
    {
        if ($this->image) {
            return asset('storage/' . $this->image);
        }
        return null;
    }

    // Galeri URL'leri
    public function getGalleryUrlsAttribute()
    {
        if ($this->gallery && is_array($this->gallery)) {
            return array_map(function($image) {
                return asset('storage/' . $image);
            }, $this->gallery);
        }
        return [];
    }

    // Ana resim (galerinin ilki veya image)
    public function getMainImageUrlAttribute()
    {
        if ($this->gallery && is_array($this->gallery) && count($this->gallery) > 0) {
            return asset('storage/' . $this->gallery[0]);
        }
        return $this->image_url;
    }

    // Formatlanmış fiyat
    public function getFormattedPriceAttribute()
    {
        if ($this->price) {
            return number_format($this->price, 2) . ' ₺';
        }
        return null;
    }

    // Aktif scope
    public function scopeActive($query)
    {
        return $query->where('is_active', true);
    }

    // Mevcut scope
    public function scopeAvailable($query)
    {
        return $query->where('is_available', true);
    }

    // Önerilen scope
    public function scopeRecommended($query)
    {
        return $query->where('is_recommended', true);
    }

    // Sıralı scope
    public function scopeOrdered($query)
    {
        return $query->orderBy('order');
    }
}
