<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class JobPosting extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'slug',
        'department',
        'position_type',
        'education_level',
        'experience_required',
        'job_description',
        'requirements',
        'responsibilities',
        'qualifications',
        'location',
        'salary_min',
        'salary_max',
        'show_salary',
        'posting_date',
        'deadline',
        'number_of_positions',
        'status',
        'view_count',
        'application_count'
    ];

    protected $casts = [
        'posting_date' => 'date',
        'deadline' => 'date',
        'requirements' => 'array',
        'responsibilities' => 'array',
        'qualifications' => 'array',
        'show_salary' => 'boolean',
        'salary_min' => 'decimal:2',
        'salary_max' => 'decimal:2'
    ];

    // Relations
    public function applications()
    {
        return $this->hasMany(JobApplication::class);
    }

    // Scopes
    public function scopeActive($query)
    {
        return $query->where('status', 'active');
    }

    public function scopeDraft($query)
    {
        return $query->where('status', 'draft');
    }

    public function scopeClosed($query)
    {
        return $query->where('status', 'closed');
    }

    public function scopeOpen($query)
    {
        return $query->where('deadline', '>', now());
    }
}
