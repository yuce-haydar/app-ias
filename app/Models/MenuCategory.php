<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Validation\ValidationException;

class MenuCategory extends Model
{
    use HasFactory;

    private const PARENT_CHAIN_MAX_STEPS = 500;

    protected $fillable = [
        'qr_menu_id',
        'parent_id',
        'name',
        'description',
        'icon',
        'order',
        'is_active'
    ];

    protected $casts = [
        'is_active' => 'boolean'
    ];

    protected static function booted(): void
    {
        static::saving(function (MenuCategory $category) {
            if ($category->parent_id === null || $category->parent_id === '') {
                return;
            }

            $parentId = (int) $category->parent_id;
            $selfId = $category->exists ? (int) $category->getKey() : null;

            if ($selfId !== null && $parentId === $selfId) {
                throw ValidationException::withMessages([
                    'parent_id' => 'Kategori kendi üst kategorisi olamaz.',
                ]);
            }

            $parent = static::query()->whereKey($parentId)->first(['id', 'parent_id', 'qr_menu_id']);
            if (! $parent) {
                throw ValidationException::withMessages([
                    'parent_id' => 'Üst kategori bulunamadı.',
                ]);
            }

            if ((int) $parent->qr_menu_id !== (int) $category->qr_menu_id) {
                throw ValidationException::withMessages([
                    'parent_id' => 'Üst kategori bu QR menüye ait olmalıdır (başka tesisten seçilemez).',
                ]);
            }

            if ($selfId === null) {
                return;
            }

            $walker = $parentId;
            $steps = 0;
            while ($walker && $steps < self::PARENT_CHAIN_MAX_STEPS) {
                if ((int) $walker === $selfId) {
                    throw ValidationException::withMessages([
                        'parent_id' => 'Bu üst kategori seçimi döngü oluşturur (alt kategoriyi üst yapamazsınız).',
                    ]);
                }
                $row = static::query()->whereKey($walker)->first(['id', 'parent_id']);
                if (! $row || $row->parent_id === null) {
                    break;
                }
                $walker = (int) $row->parent_id;
                $steps++;
            }

            if ($steps >= self::PARENT_CHAIN_MAX_STEPS) {
                throw ValidationException::withMessages([
                    'parent_id' => 'Kategori zinciri çok derin veya döngülü. Lütfen hiyerarşiyi sadeleştirin.',
                ]);
            }
        });
    }

    // İlişkiler
    public function qrMenu()
    {
        return $this->belongsTo(QrMenu::class);
    }

    public function menuItems()
    {
        return $this->hasMany(MenuItem::class)->orderBy('order');
    }

    // Alt kategori ilişkileri
    public function parent()
    {
        return $this->belongsTo(MenuCategory::class, 'parent_id');
    }

    public function children()
    {
        return $this->hasMany(MenuCategory::class, 'parent_id')->orderBy('order');
    }

    public function allChildren()
    {
        return $this->children()->with('allChildren');
    }

    // Aktif scope
    public function scopeActive($query)
    {
        return $query->where('is_active', true);
    }

    // Sıralı scope
    public function scopeOrdered($query)
    {
        return $query->orderBy('order');
    }

    // Ana kategoriler (parent_id null olanlar)
    public function scopeMainCategories($query)
    {
        return $query->whereNull('parent_id');
    }

    // Alt kategoriler (parent_id dolu olanlar)
    public function scopeSubCategories($query)
    {
        return $query->whereNotNull('parent_id');
    }
}
