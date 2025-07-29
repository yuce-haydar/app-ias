<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MenuCategory extends Model
{
    use HasFactory;

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
