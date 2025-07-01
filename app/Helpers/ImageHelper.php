<?php

namespace App\Helpers;

use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\Gd\Driver;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\UploadedFile;

class ImageHelper
{
    /**
     * Görsel yolunu düzgün formata çevir - sadece storage'dan çek
     */
    public static function getImageUrl($path)
    {
        if (!$path) {
            return asset('assets/images/placeholder.png');
        }
        
        // Storage'dan çek
        return asset('storage/' . ltrim($path, '/'));
    }
    
    /**
     * Galeri görsellerini düzgün formata çevir
     */
    public static function getGalleryUrls($gallery)
    {
        if (!$gallery || !is_array($gallery)) {
            return [];
        }
        
        return array_map(function($image) {
            return self::getImageUrl($image);
        }, $gallery);
    }

    /**
     * Görseli compress edip kaydet
     * 
     * @param UploadedFile $file
     * @param string $path Storage path
     * @param int $maxWidth Maksimum genişlik (piksel)  
     * @param int $maxHeight Maksimum yükseklik (piksel)
     * @param int $quality Kalite (0-100)
     * @return string Kaydedilen dosya yolu
     */
    public static function compressAndStore(UploadedFile $file, string $path, int $maxWidth = 1600, int $maxHeight = 900, int $quality = 75): string
    {
        // Image manager oluştur
        $manager = new ImageManager(new Driver());
        
        // Görseli yükle
        $image = $manager->read($file->getPathname());
        
        // Mevcut boyutları al
        $originalWidth = $image->width();
        $originalHeight = $image->height();
        
        // Boyut kontrolü ve resize
        if ($originalWidth > $maxWidth || $originalHeight > $maxHeight) {
            // Orantılı resize
            $image->scale(width: $maxWidth, height: $maxHeight);
        }
        
        // Dosya uzantısını belirle
        $extension = strtolower($file->getClientOriginalExtension());
        
        // Unique filename oluştur
        $filename = uniqid() . '_' . time() . '.' . $extension;
        $fullPath = $path . '/' . $filename;
        
        // Storage path'i tam yol olarak al
        $storagePath = storage_path('app/public/' . $fullPath);
        
        // Dizini oluştur
        $directory = dirname($storagePath);
        if (!file_exists($directory)) {
            mkdir($directory, 0755, true);
        }
        
        // Dosya türüne göre kaydet
        switch ($extension) {
            case 'jpg':
            case 'jpeg':
                $image->toJpeg($quality)->save($storagePath);
                break;
            case 'png':
                // PNG için quality değeri 0-9 arasında olmalı
                $pngQuality = (int) (9 - ($quality / 100 * 9));
                $image->toPng()->save($storagePath);
                break;
            case 'webp':
                $image->toWebp($quality)->save($storagePath);
                break;
            case 'gif':
                $image->toGif()->save($storagePath);
                break;
            default:
                $image->toJpeg($quality)->save($storagePath);
        }
        
        return $fullPath;
    }

    /**
     * Thumbnail oluştur ve kaydet
     * 
     * @param UploadedFile $file
     * @param string $path
     * @param int $width
     * @param int $height
     * @param int $quality
     * @return string
     */
    public static function createThumbnail(UploadedFile $file, string $path, int $width = 300, int $height = 300, int $quality = 80): string
    {
        $manager = new ImageManager(new Driver());
        $image = $manager->read($file->getPathname());
        
        // Kare thumbnail oluştur (crop)
        $image->cover($width, $height);
        
        $extension = strtolower($file->getClientOriginalExtension());
        $filename = 'thumb_' . uniqid() . '_' . time() . '.' . $extension;
        $fullPath = $path . '/thumbnails/' . $filename;
        
        $storagePath = storage_path('app/public/' . $fullPath);
        
        // Thumbnail dizini oluştur
        $directory = dirname($storagePath);
        if (!file_exists($directory)) {
            mkdir($directory, 0755, true);
        }
        
        // Kaydet
        switch ($extension) {
            case 'jpg':
            case 'jpeg':
                $image->toJpeg($quality)->save($storagePath);
                break;
            case 'png':
                $image->toPng()->save($storagePath);
                break;
            case 'webp':
                $image->toWebp($quality)->save($storagePath);
                break;
            default:
                $image->toJpeg($quality)->save($storagePath);
        }
        
        return $fullPath;
    }

    /**
     * Galeri için çoklu görsel işleme
     * 
     * @param array $files UploadedFile array
     * @param string $path
     * @param int $maxWidth
     * @param int $maxHeight
     * @param int $quality
     * @return array Kaydedilen dosya yolları
     */
    public static function compressAndStoreMultiple(array $files, string $path, int $maxWidth = 1920, int $maxHeight = 1080, int $quality = 85): array
    {
        $storedFiles = [];
        
        foreach ($files as $file) {
            if ($file instanceof UploadedFile && $file->isValid()) {
                $storedFiles[] = self::compressAndStore($file, $path, $maxWidth, $maxHeight, $quality);
            }
        }
        
        return $storedFiles;
    }

    /**
     * Dosya boyutunu kontrol et
     * 
     * @param UploadedFile $file
     * @param int $maxSizeInMB
     * @return bool
     */
    public static function checkFileSize(UploadedFile $file, int $maxSizeInMB = 15): bool
    {
        $maxSizeInBytes = $maxSizeInMB * 1024 * 1024;
        return $file->getSize() <= $maxSizeInBytes;
    }

    /**
     * Görsel dosya türü kontrolü
     * 
     * @param UploadedFile $file
     * @param array $allowedTypes
     * @return bool
     */
    public static function isValidImageType(UploadedFile $file, array $allowedTypes = ['jpeg', 'jpg', 'png', 'webp', 'gif']): bool
    {
        $extension = strtolower($file->getClientOriginalExtension());
        return in_array($extension, $allowedTypes);
    }

    /**
     * Eski görseli sil
     * 
     * @param string|null $path
     * @return bool
     */
    public static function deleteImage(?string $path): bool
    {
        if (!$path) {
            return false;
        }
        
        return Storage::disk('public')->delete($path);
    }
} 