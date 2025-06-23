<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JobApplication extends Model
{
    use HasFactory;

    protected $fillable = [
        'job_posting_id',
        'name',
        'email',
        'phone',
        'birth_date',
        'gender',
        'military_status',
        'education_level',
        'university',
        'department',
        'graduation_year',
        'work_experience',
        'languages',
        'skills',
        'references',
        'cv_file',
        'cover_letter',
        'expected_salary',
        'available_start_date',
        'status',
        'reviewed_at',
        'admin_notes',
        'rating',
        'ip_address',
        'kvkk_consent'
    ];

    protected $casts = [
        'birth_date' => 'date',
        'available_start_date' => 'date',
        'reviewed_at' => 'datetime',
        'kvkk_consent' => 'boolean',
        'expected_salary' => 'decimal:2',
        'rating' => 'integer'
    ];

    public function jobPosting()
    {
        return $this->belongsTo(JobPosting::class);
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