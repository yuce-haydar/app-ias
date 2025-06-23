<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Tender extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'description',
        'tender_no',
        'category',
        'estimated_value',
        'currency',
        'application_start_date',
        'application_end_date',
        'tender_date',
        'requirements',
        'documents',
        'contact_info',
        'status',
        'featured'
    ];

    protected $casts = [
        'application_start_date' => 'datetime',
        'application_end_date' => 'datetime', 
        'tender_date' => 'datetime',
        'documents' => 'array',
        'status' => 'boolean',
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
        return $query->where('status', true);
    }

    public function scopeFeatured($query)
    {
        return $query->where('featured', true);
    }

    public function scopeOpen($query)
    {
        return $query->where('application_start_date', '<=', now())
                    ->where('application_end_date', '>', now());
    }
}
