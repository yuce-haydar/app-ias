<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use SimpleSoftwareIO\QrCode\Facades\QrCode;

class QrMenu extends Model
{
    use HasFactory;

    protected $fillable = [
        'facility_id',
        'name',
        'url_slug',
        'qr_code_path',
        'description',
        'logo',
        'header_background',
        'theme_colors',
        'is_active'
    ];

    protected $casts = [
        'theme_colors' => 'array',
        'is_active' => 'boolean'
    ];

    // İlişkiler
    public function facility()
    {
        return $this->belongsTo(Facility::class);
    }

    public function menuCategories()
    {
        return $this->hasMany(MenuCategory::class)->orderBy('order');
    }

    public function qrMenuUsers()
    {
        return $this->hasMany(QrMenuUser::class);
    }

    // QR kod URL'si
    public function getQrUrlAttribute()
    {
        // Her zaman hatayimar.com.tr kullan
        return "https://{$this->url_slug}.hatayimar.com.tr";
    }

    // Eski format URL (geriye uyumluluk için)
    public function getLegacyQrUrlAttribute()
    {
        return url("/qr-menu/{$this->url_slug}");
    }

    // QR kod resmi URL'si
    public function getQrCodeUrlAttribute()
    {
        if ($this->qr_code_path) {
            return asset('storage/' . $this->qr_code_path);
        }
        return null;
    }

    // Logo URL'si
    public function getLogoUrlAttribute()
    {
        if ($this->logo) {
            return asset('storage/' . $this->logo);
        }
        // Default logo olarak hh.png kullan
        return asset('assets/images/logo/combined-logo.png');
    }

    // Header Background URL'si
    public function getHeaderBackgroundUrlAttribute()
    {
        if ($this->header_background) {
            return asset('storage/' . $this->header_background);
        }
        return null;
    }

    // QR kod oluştur
    public function generateQrCode()
    {
        $qrCode = QrCode::format('svg')
            ->size(300)
            ->generate($this->qr_url);
        
        $fileName = 'qr-codes/' . $this->url_slug . '.svg';
        Storage::disk('public')->put($fileName, $qrCode);
        
        $this->update(['qr_code_path' => $fileName]);
        
        return $fileName;
    }

    // Aktif scope
    public function scopeActive($query)
    {
        return $query->where('is_active', true);
    }
}
