<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class JobPosting extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'description',
        'department',
        'position_type',
        'experience_required',
        'education_required',
        'salary_min',
        'salary_max',
        'currency',
        'location',
        'requirements',
        'benefits',
        'application_deadline',
        'status',
        'featured'
    ];

    protected $casts = [
        'application_deadline' => 'datetime',
        'requirements' => 'array',
        'benefits' => 'array',
        'status' => 'boolean',
        'featured' => 'boolean'
    ];

    // Relations
    public function applications()
    {
        return $this->hasMany(JobApplication::class);
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
        return $query->where('application_deadline', '>', now());
    }
}
