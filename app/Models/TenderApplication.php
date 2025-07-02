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
        'contact_person',
        'email',
        'phone',
        'address',
        'tax_number',
        'documents',
        'message',
        'application_date',
        'status'
    ];

    protected $casts = [
        'documents' => 'array',
        'application_date' => 'datetime'
    ];

    /**
     * İhale ile ilişki
     */
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
