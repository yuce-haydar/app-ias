<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Project extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'slug',
        'short_description',
        'description',
        'iframe_codes',
        'image',
        'gallery',
        'project_type',
        'status',
        'start_date',
        'completion_date',
        'budget',
        'contractor',
        'features',
        'technical_specs',
        'location',
        'latitude',
        'longitude',
        'progress_percentage',
        'sort_order',
        'is_featured',
        'view_count'
    ];

    protected $casts = [
        'gallery' => 'array',
        'iframe_codes' => 'array',
        'features' => 'array',
        'technical_specs' => 'array',
        'start_date' => 'date',
        'completion_date' => 'date',
        'budget' => 'decimal:2',
        'is_featured' => 'boolean',
        'latitude' => 'decimal:8',
        'longitude' => 'decimal:8'
    ];

    /**
     * Boot the model.
     */
    protected static function boot()
    {
        parent::boot();

        static::creating(function ($project) {
            $project->slug = Str::slug($project->title);
        });

        static::updating(function ($project) {
            if ($project->isDirty('title')) {
                $project->slug = Str::slug($project->title);
            }
        });
    }

    /**
     * Scope for featured projects.
     */
    public function scopeFeatured($query)
    {
        return $query->where('is_featured', true);
    }

    /**
     * Scope for completed projects.
     */
    public function scopeCompleted($query)
    {
        return $query->where('status', 'completed');
    }

    /**
     * Scope for ongoing projects.
     */
    public function scopeOngoing($query)
    {
        return $query->where('status', 'ongoing');
    }

    /**
     * Scope for planned projects.
     */
    public function scopePlanned($query)
    {
        return $query->where('status', 'planned');
    }

    /**
     * Increment view count.
     */
    public function incrementViewCount()
    {
        $this->increment('view_count');
    }

    /**
     * Proje lokasyonları ile ilişki
     */
    public function locations()
    {
        return $this->hasMany(ProjectLocation::class)->ordered();
    }

    /**
     * Ana lokasyon (ilk lokasyon)
     */
    public function primaryLocation()
    {
        return $this->hasOne(ProjectLocation::class)->ordered();
    }

    /**
     * Galeriyi gruplu forma normalize eder.
     * Eski format: ["path1","path2"] → tek grup "Galeri".
     * Yeni format: [["title" => "...", "images" => ["path"]], ...]
     *
     * @return array<int, array{title: string, images: array<int, string>}>
     */
    public function galleryGroupsNormalized(): array
    {
        $g = $this->gallery;
        if (! $g || ! is_array($g)) {
            return [];
        }

        $first = reset($g);
        if (is_string($first)) {
            $paths = array_values(array_filter($g, 'is_string'));

            return $paths === [] ? [] : [['title' => 'Galeri', 'images' => $paths]];
        }

        $out = [];
        foreach ($g as $row) {
            if (! is_array($row)) {
                continue;
            }
            $images = isset($row['images']) && is_array($row['images'])
                ? array_values(array_filter($row['images'], 'is_string'))
                : [];
            if ($images === []) {
                continue;
            }
            $title = isset($row['title']) ? trim((string) $row['title']) : '';
            $out[] = [
                'title' => $title !== '' ? $title : 'Galeri',
                'images' => $images,
            ];
        }

        return $out;
    }

    /**
     * Galeri JSON'undan tüm storage path'lerini toplar (silme için).
     *
     * @return array<int, string>
     */
    public static function collectGalleryStoragePaths(?array $gallery): array
    {
        if (! $gallery) {
            return [];
        }

        $first = reset($gallery);
        if ($first === false) {
            return [];
        }

        if (is_string($first)) {
            return array_values(array_filter($gallery, 'is_string'));
        }

        $paths = [];
        foreach ($gallery as $row) {
            if (is_array($row) && isset($row['images']) && is_array($row['images'])) {
                foreach ($row['images'] as $img) {
                    if (is_string($img)) {
                        $paths[] = $img;
                    }
                }
            }
        }

        return $paths;
    }
}
