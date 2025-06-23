<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

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
        'show_salary' => 'boolean',
        'posting_date' => 'date',
        'deadline' => 'date',
        'number_of_positions' => 'integer',
        'view_count' => 'integer',
        'application_count' => 'integer',
        'salary_min' => 'decimal:2',
        'salary_max' => 'decimal:2'
    ];

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($jobPosting) {
            if (empty($jobPosting->slug)) {
                $jobPosting->slug = Str::slug($jobPosting->title);
            }
        });

        static::updating(function ($jobPosting) {
            if ($jobPosting->isDirty('title')) {
                $jobPosting->slug = Str::slug($jobPosting->title);
            }
        });
    }

    public function applications()
    {
        return $this->hasMany(JobApplication::class);
    }

    public function scopeActive($query)
    {
        return $query->where('status', 'active')
            ->where('deadline', '>=', now());
    }

    public function scopeDraft($query)
    {
        return $query->where('status', 'draft');
    }

    public function scopeClosed($query)
    {
        return $query->where('status', 'closed')
            ->orWhere('deadline', '<', now());
    }

    public function getPositionTypeTextAttribute()
    {
        return match($this->position_type) {
            'full_time' => 'Tam Zamanlı',
            'part_time' => 'Yarı Zamanlı',
            'contract' => 'Sözleşmeli',
            'intern' => 'Stajyer',
            default => $this->position_type
        };
    }

    public function getSalaryRangeAttribute()
    {
        if (!$this->show_salary) {
            return 'Belirtilmemiş';
        }

        if ($this->salary_min && $this->salary_max) {
            return number_format($this->salary_min, 0, ',', '.') . ' - ' . number_format($this->salary_max, 0, ',', '.') . ' TL';
        } elseif ($this->salary_min) {
            return 'En az ' . number_format($this->salary_min, 0, ',', '.') . ' TL';
        } elseif ($this->salary_max) {
            return 'En fazla ' . number_format($this->salary_max, 0, ',', '.') . ' TL';
        }

        return 'Belirtilmemiş';
    }

    public function isActive()
    {
        return $this->status === 'active' && $this->deadline >= now();
    }

    public function incrementViewCount()
    {
        $this->increment('view_count');
    }

    public function incrementApplicationCount()
    {
        $this->increment('application_count');
    }
} 