<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TenderApplication extends Model
{
    use HasFactory;

    protected $fillable = [
        'tender_id',
        'company_name',
        'tax_number',
        'authorized_person',
        'email',
        'phone',
        'address',
        'documents',
        'notes',
        'status',
        'reviewed_at',
        'admin_notes',
        'ip_address'
    ];

    protected $casts = [
        'documents' => 'array',
        'reviewed_at' => 'datetime'
    ];

    public function tender()
    {
        return $this->belongsTo(Tender::class);
    }

    public function scopePending($query)
    {
        return $query->where('status', 'pending');
    }

    public function scopeReviewed($query)
    {
        return $query->where('status', 'reviewed');
    }

    public function getStatusColorAttribute()
    {
        return match($this->status) {
            'pending' => 'warning',
            'reviewed' => 'info',
            'accepted' => 'success',
            'rejected' => 'danger',
            default => 'secondary'
        };
    }

    public function getStatusTextAttribute()
    {
        return match($this->status) {
            'pending' => 'Beklemede',
            'reviewed' => 'İncelendi',
            'accepted' => 'Kabul Edildi',
            'rejected' => 'Reddedildi',
            default => $this->status
        };
    }
} 