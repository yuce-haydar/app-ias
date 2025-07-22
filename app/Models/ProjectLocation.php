<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProjectLocation extends Model
{
    use HasFactory;

    protected $fillable = [
        'project_id',
        'name',
        'latitude',
        'longitude',
        'description',
        'sort_order',
        'show_location'
    ];

    protected $casts = [
        'latitude' => 'decimal:8',
        'longitude' => 'decimal:8',
        'show_location' => 'boolean'
    ];

    /**
     * Proje ile ilişki
     */
    public function project()
    {
        return $this->belongsTo(Project::class);
    }

    /**
     * Sıralama scope'u
     */
    public function scopeOrdered($query)
    {
        return $query->orderBy('sort_order')->orderBy('id');
    }
}
