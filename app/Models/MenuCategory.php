<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MenuCategory extends Model
{
    use HasFactory;

    protected $fillable = [
        'qr_menu_id',
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
}
