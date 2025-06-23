<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Announcement extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'slug',
        'content',
        'announcement_type',
        'importance',
        'start_date',
        'end_date',
        'attachments',
        'status',
        'is_pinned',
        'view_count'
    ];

    protected $casts = [
        'attachments' => 'array',
        'is_pinned' => 'boolean',
        'start_date' => 'date',
        'end_date' => 'date',
        'view_count' => 'integer'
    ];

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($announcement) {
            if (empty($announcement->slug)) {
                $announcement->slug = Str::slug($announcement->title);
            }
        });

        static::updating(function ($announcement) {
            if ($announcement->isDirty('title')) {
                $announcement->slug = Str::slug($announcement->title);
            }
        });
    }

    public function scopeActive($query)
    {
        return $query->where('status', 'published')
            ->where('start_date', '<=', now())
            ->where(function ($q) {
                $q->whereNull('end_date')
                    ->orWhere('end_date', '>=', now());
            });
    }

    public function scopePinned($query)
    {
        return $query->where('is_pinned', true);
    }

    public function getTypeColorAttribute()
    {
        return match($this->announcement_type) {
            'urgent' => 'danger',
            'event' => 'info',
            'regulation' => 'warning',
            default => 'primary'
        };
    }

    public function getImportanceColorAttribute()
    {
        return match($this->importance) {
            'high' => 'danger',
            'medium' => 'warning',
            default => 'secondary'
        };
    }

    public function incrementViewCount()
    {
        $this->increment('view_count');
    }
} 