<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class QrMenuUser extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $fillable = [
        'qr_menu_id',
        'name',
        'email',
        'password',
        'phone',
        'role',
        'is_active',
        'last_login_at'
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
        'is_active' => 'boolean',
        'last_login_at' => 'datetime'
    ];

    // İlişkiler
    public function qrMenu()
    {
        return $this->belongsTo(QrMenu::class);
    }

    // Aktif scope
    public function scopeActive($query)
    {
        return $query->where('is_active', true);
    }

    // Rol kontrolü
    public function isOwner()
    {
        return $this->role === 'owner';
    }

    public function isManager()
    {
        return $this->role === 'manager';
    }

    public function isStaff()
    {
        return $this->role === 'staff';
    }

    public function canManage()
    {
        return in_array($this->role, ['owner', 'manager']);
    }
}
