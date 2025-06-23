<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class TenderApplication extends Model
{
    use HasFactory;

    protected $fillable = [
        'tender_id',
        'company_name',
        'company_type',
        'tax_number',
        'contact_person',
        'email',
        'phone',
        'address',
        'experience_years',
        'previous_works',
        'financial_capacity',
        'technical_capacity',
        'documents',
        'bid_amount',
        'currency',
        'status',
        'notes',
        'applied_at'
    ];

    protected $casts = [
        'applied_at' => 'datetime',
        'previous_works' => 'array',
        'documents' => 'array'
    ];

    // Relations
    public function tender()
    {
        return $this->belongsTo(Tender::class);
    }

    // Scopes
    public function scopeStatus($query, $status)
    {
        return $query->where('status', $status);
    }

    public function scopePending($query)
    {
        return $query->where('status', 'pending');
    }

    public function scopeApproved($query)
    {
        return $query->where('status', 'approved');
    }

    public function scopeRejected($query)
    {
        return $query->where('status', 'rejected');
    }
}
