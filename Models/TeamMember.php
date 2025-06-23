<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class TeamMember extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'slug',
        'position',
        'department',
        'biography',
        'photo',
        'email',
        'phone',
        'linkedin',
        'education',
        'experience',
        'skills',
        'sort_order',
        'is_board_member',
        'is_active'
    ];

    protected $casts = [
        'is_board_member' => 'boolean',
        'is_active' => 'boolean',
        'sort_order' => 'integer'
    ];

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($teamMember) {
            if (empty($teamMember->slug)) {
                $teamMember->slug = Str::slug($teamMember->name);
            }
            if (is_null($teamMember->sort_order)) {
                $teamMember->sort_order = TeamMember::max('sort_order') + 1;
            }
        });

        static::updating(function ($teamMember) {
            if ($teamMember->isDirty('name')) {
                $teamMember->slug = Str::slug($teamMember->name);
            }
        });
    }

    public function scopeActive($query)
    {
        return $query->where('is_active', true);
    }

    public function scopeBoardMembers($query)
    {
        return $query->where('is_board_member', true);
    }

    public function scopeOrdered($query)
    {
        return $query->orderBy('sort_order')->orderBy('name');
    }

    public function getPhotoUrlAttribute()
    {
        if ($this->photo) {
            return asset('storage/' . $this->photo);
        }
        return asset('assets/images/team/default-avatar.png');
    }

    public function getInitialsAttribute()
    {
        $words = explode(' ', $this->name);
        $initials = '';
        foreach ($words as $word) {
            $initials .= mb_substr($word, 0, 1);
        }
        return strtoupper($initials);
    }
} 