<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Facility extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'slug',
        'short_description',
        'description',
        'image',
        'gallery',
        'facility_type',
        'category',
        'status',
        'opening_date',
        'capacity',
        'features',
        'working_hours',
        'address',
        'phone',
        'email',
        'google_maps_link',
        'latitude',
        'longitude',
        'sort_order',
        'is_featured',
        'view_count'
    ];

    protected $casts = [
        'gallery' => 'array',
        'features' => 'array',
        'working_hours' => 'array',
        'opening_date' => 'date',
        'is_featured' => 'boolean',
        'latitude' => 'decimal:8',
        'longitude' => 'decimal:8'
    ];

    /**
     * Boot the model.
     */
    protected static function boot()
    {
        parent::boot();

        static::creating(function ($facility) {
            $facility->slug = Str::slug($facility->name);
        });

        static::updating(function ($facility) {
            if ($facility->isDirty('name')) {
                $facility->slug = Str::slug($facility->name);
            }
        });
    }

    /**
     * Scope for active facilities.
     */
    public function scopeActive($query)
    {
        return $query->where('status', 'active');
    }

    /**
     * Scope for featured facilities.
     */
    public function scopeFeatured($query)
    {
        return $query->where('is_featured', true);
    }

    /**
     * Increment view count.
     */
    public function incrementViewCount()
    {
        $this->increment('view_count');
    }
}
