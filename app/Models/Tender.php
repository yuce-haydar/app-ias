<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Tender extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'slug',
        'description',
        'tender_number',
        'tender_no',
        'tender_type',
        'procurement_method',
        'estimated_cost',
        'announcement_date',
        'deadline',
        'tender_date',
        'tender_time',
        'tender_location',
        'requirements',
        'documents',
        'contact_person',
        'contact_phone',
        'contact_email',
        'status',
        'featured'
    ];

    protected $casts = [
        'announcement_date' => 'date',
        'deadline' => 'date', 
        'tender_date' => 'date',
        'tender_time' => 'string',
        'documents' => 'array',
        'requirements' => 'array',
        'featured' => 'boolean'
    ];

    // Relations
    public function applications()
    {
        return $this->hasMany(TenderApplication::class);
    }

    // Scopes
    public function scopeActive($query)
    {
        return $query->where('status', 'published');
    }

    public function scopeFeatured($query)
    {
        return $query->where('featured', true);
    }

    public function scopeOpen($query)
    {
        return $query->where('announcement_date', '<=', now())
                    ->where('deadline', '>', now())
                    ->where('status', 'published');
    }

    // Accessor methods
    public function getStatusColorAttribute()
    {
        return match($this->status) {
            'draft' => 'secondary',
            'published' => 'success',
            'closed' => 'warning',
            'cancelled' => 'danger',
            'completed' => 'primary',
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
            default => ucfirst($this->status)
        };
    }

    public function getTenderTypeTextAttribute()
    {
        return match($this->tender_type) {
            'goods' => 'Mal Alımı',
            'services' => 'Hizmet Alımı',
            'construction' => 'Yapım İşi',
            'consulting' => 'Danışmanlık',
            default => ucfirst($this->tender_type)
        };
    }

    public function getProcurementMethodTextAttribute()
    {
        return match($this->procurement_method) {
            'open' => 'Açık İhale',
            'restricted' => 'Belli İstekliler Arası',
            'negotiated' => 'Pazarlık Usulü',
            'direct' => 'Doğrudan Temin',
            default => ucfirst($this->procurement_method)
        };
    }
}
