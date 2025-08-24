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
        'sizes',
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
        'sizes' => 'array',
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

    // Ana resim (önce image, sonra galerinin ilki)
    public function getMainImageUrlAttribute()
    {
        // Önce ana resmi kontrol et
        if ($this->image) {
            return asset('storage/' . $this->image);
        }
        
        // Ana resim yoksa galerinin ilkini kullan
        if ($this->gallery && is_array($this->gallery) && count($this->gallery) > 0) {
            return asset('storage/' . $this->gallery[0]);
        }
        
        // Hiçbiri yoksa null döndür
        return null;
    }

    // Formatlanmış fiyat
    public function getFormattedPriceAttribute()
    {
        if ($this->price) {
            return number_format($this->price, 2) . ' ₺';
        }
        return null;
    }

    // Boy seçenekleri var mı?
    public function getHasSizesAttribute()
    {
        return $this->sizes && is_array($this->sizes) && count($this->sizes) > 0;
    }

    // Boy seçenekleri ile formatlanmış fiyatlar
    public function getFormattedSizesAttribute()
    {
        if (!$this->has_sizes) {
            return [];
        }

        return array_map(function($size) {
            return [
                'name' => $size['name'],
                'price' => $size['price'],
                'formatted_price' => number_format($size['price'], 2) . ' ₺'
            ];
        }, $this->sizes);
    }

    // En düşük fiyat
    public function getMinPriceAttribute()
    {
        if ($this->has_sizes) {
            $prices = array_column($this->sizes, 'price');
            return min($prices);
        }
        return $this->price;
    }

    // En yüksek fiyat
    public function getMaxPriceAttribute()
    {
        if ($this->has_sizes) {
            $prices = array_column($this->sizes, 'price');
            return max($prices);
        }
        return $this->price;
    }

    // Fiyat aralığı formatlanmış
    public function getFormattedPriceRangeAttribute()
    {
        if ($this->has_sizes) {
            $minPrice = number_format($this->min_price, 2) . ' ₺';
            $maxPrice = number_format($this->max_price, 2) . ' ₺';
            
            if ($this->min_price == $this->max_price) {
                return $minPrice;
            }
            
            return $minPrice . ' - ' . $maxPrice;
        }
        
        return $this->formatted_price;
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
