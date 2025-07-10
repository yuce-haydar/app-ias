<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GeneralJobApplication extends Model
{
    use HasFactory;

    protected $fillable = [
        'first_name',
        'last_name',
        'birth_date',
        'gender',
        'military_status',
        'profession',
        'documents',
        'notes',
        'status',
    ];

    protected $casts = [
        'birth_date' => 'date',
        'documents' => 'array',
    ];

    public function getFullNameAttribute()
    {
        return $this->first_name . ' ' . $this->last_name;
    }

    public function getGenderTextAttribute()
    {
        return $this->gender === 'male' ? 'Erkek' : 'Kadın';
    }

    public function getMilitaryStatusTextAttribute()
    {
        return match($this->military_status) {
            'completed' => 'Yapıldı',
            'exempt' => 'Muaf',
            'deferred' => 'Tecilli',
            default => 'Belirtilmemiş'
        };
    }

    public function getStatusTextAttribute()
    {
        return match($this->status) {
            'pending' => 'Beklemede',
            'reviewing' => 'İnceleniyor',
            'approved' => 'Onaylandı',
            'rejected' => 'Reddedildi',
            default => 'Beklemede'
        };
    }

    public function getStatusColorAttribute()
    {
        return match($this->status) {
            'pending' => 'warning',
            'reviewing' => 'info',
            'approved' => 'success',
            'rejected' => 'danger',
            default => 'secondary'
        };
    }
}
