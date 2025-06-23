<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class TeamMember extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'position',
        'designation',
        'description',
        'bio',
        'image',
        'email',
        'phone',
        'social_facebook',
        'social_twitter',
        'social_linkedin',
        'social_instagram',
        'experience_years',
        'education',
        'specialties',
        'status',
        'sort_order'
    ];

    protected $casts = [
        'status' => 'boolean',
        'specialties' => 'array',
        'education' => 'array'
    ];

    // Scopes
    public function scopeActive($query)
    {
        return $query->where('status', true);
    }

    public function scopeOrdered($query)
    {
        return $query->orderBy('sort_order')->orderBy('name');
    }
}
