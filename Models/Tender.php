<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Tender extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'slug',
        'tender_number',
        'description',
        'tender_type',
        'procurement_method',
        'estimated_cost',
        'announcement_date',
        'deadline',
        'tender_date',
        'tender_time',
        'tender_location',
        'documents',
        'requirements',
        'contact_person',
        'contact_phone',
        'contact_email',
        'status',
        'view_count'
    ];

    protected $casts = [
        'documents' => 'array',
        'announcement_date' => 'date',
        'deadline' => 'date',
        'tender_date' => 'date',
        'estimated_cost' => 'decimal:2',
        'view_count' => 'integer'
    ];

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($tender) {
            if (empty($tender->slug)) {
                $tender->slug = Str::slug($tender->title);
            }
        });

        static::updating(function ($tender) {
            if ($tender->isDirty('title')) {
                $tender->slug = Str::slug($tender->title);
            }
        });
    }

    public function applications()
    {
        return $this->hasMany(TenderApplication::class);
    }

    public function scopeActive($query)
    {
        return $query->where('status', 'published')
            ->where('deadline', '>=', now());
    }

    public function scopeClosed($query)
    {
        return $query->where('status', 'closed')
            ->orWhere('deadline', '<', now());
    }

    public function getTenderTypeTextAttribute()
    {
        return match($this->tender_type) {
            'goods' => 'Mal Alımı',
            'services' => 'Hizmet Alımı',
            'construction' => 'Yapım İşi',
            'consulting' => 'Danışmanlık',
            default => $this->tender_type
        };
    }

    public function getProcurementMethodTextAttribute()
    {
        return match($this->procurement_method) {
            'open' => 'Açık İhale',
            'restricted' => 'Belli İstekliler Arası',
            'negotiated' => 'Pazarlık Usulü',
            'direct' => 'Doğrudan Temin',
            default => $this->procurement_method
        };
    }

    public function getStatusColorAttribute()
    {
        return match($this->status) {
            'published' => 'success',
            'closed' => 'danger',
            'cancelled' => 'warning',
            'completed' => 'info',
            default => 'secondary'
        };
    }

    public function getStatusTextAttribute()
    {
        return match($this->status) {
            'draft' => 'Taslak',
            'published' => 'Yayında',
            'closed' => 'Kapalı',
            'cancelled' => 'İptal',
            'completed' => 'Tamamlandı',
            default => $this->status
        };
    }

    public function isActive()
    {
        return $this->status === 'published' && $this->deadline >= now();
    }

    public function incrementViewCount()
    {
        $this->increment('view_count');
    }
} 