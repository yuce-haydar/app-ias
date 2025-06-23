<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Project extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'slug',
        'description',
        'short_description',
        'location',
        'start_date',
        'end_date',
        'budget',
        'contractor',
        'project_manager',
        'status',
        'progress_percentage',
        'featured_image',
        'gallery',
        'is_featured'
    ];

    protected $casts = [
        'start_date' => 'date',
        'end_date' => 'date',
        'budget' => 'decimal:2',
        'progress_percentage' => 'integer',
        'is_featured' => 'boolean',
        'gallery' => 'array'
    ];

    protected static function boot()
    {
        parent::boot();
        
        static::creating(function ($project) {
            if (empty($project->slug)) {
                $project->slug = Str::slug($project->title);
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
        return $query->whereIn('status', ['ongoing', 'completed']);
    }

    public function scopeFeatured($query)
    {
        return $query->where('is_featured', true);
    }

    public function scopeByStatus($query, $status)
    {
        return $query->where('status', $status);
    }

    // Accessors
    public function getStatusTextAttribute()
    {
        return match($this->status) {
            'planned' => 'Planlanan',
            'ongoing' => 'Devam Eden',
            'completed' => 'Tamamlanan',
            'cancelled' => 'İptal Edilen',
            default => 'Bilinmeyen'
        };
    }

    public function getStatusColorAttribute()
    {
        return match($this->status) {
            'planned' => 'info',
            'ongoing' => 'warning',
            'completed' => 'success',
            'cancelled' => 'danger',
            default => 'secondary'
        };
    }

    public function getFeaturedImageUrlAttribute()
    {
        return $this->featured_image ? asset('storage/' . $this->featured_image) : null;
    }

    public function getGalleryUrlsAttribute()
    {
        if (!$this->gallery) {
            return [];
        }

        return collect($this->gallery)->map(function ($image) {
            return asset('storage/' . $image);
        })->toArray();
    }

    public function getFormattedBudgetAttribute()
    {
        if (!$this->budget) {
            return null;
        }

        return number_format($this->budget, 2, ',', '.') . ' ₺';
    }

    public function getDurationAttribute()
    {
        if (!$this->start_date || !$this->end_date) {
            return null;
        }

        return $this->start_date->diffInDays($this->end_date) . ' gün';
    }
} 