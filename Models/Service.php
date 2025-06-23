<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Service extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'slug',
        'description',
        'short_description',
        'icon',
        'featured_image',
        'features',
        'benefits',
        'price_range',
        'duration',
        'is_featured',
        'is_active',
        'order'
    ];

    protected $casts = [
        'features' => 'array',
        'benefits' => 'array',
        'is_featured' => 'boolean',
        'is_active' => 'boolean',
        'order' => 'integer'
    ];

    protected static function boot()
    {
        parent::boot();
        
        static::creating(function ($service) {
            if (empty($service->slug)) {
                $service->slug = Str::slug($service->title);
            }
        });
    }

    public function getRouteKeyName()
    {
        return 'slug';
    }

    // Scopes
    public function scopeActive($query)
    {
        return $query->where('is_active', true);
    }

    public function scopeFeatured($query)
    {
        return $query->where('is_featured', true);
    }

    public function scopeOrdered($query)
    {
        return $query->orderBy('order')->orderBy('title');
    }

    // Accessors
    public function getShortDescriptionAttribute($value)
    {
        return $value ?: Str::limit(strip_tags($this->description), 150);
    }

    public function getFeaturedImageUrlAttribute()
    {
        return $this->featured_image ? asset('storage/' . $this->featured_image) : null;
    }

    public function getFeaturesListAttribute()
    {
        return $this->features ? collect($this->features)->filter() : collect();
    }

    public function getBenefitsListAttribute()
    {
        return $this->benefits ? collect($this->benefits)->filter() : collect();
    }
} 