<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Eski düz dizi galeriyi [{ title, images }] yapısına çevirir (tek seferlik veri dönüşümü).
     */
    public function up(): void
    {
        DB::table('projects')->orderBy('id')->chunkById(100, function ($rows) {
            foreach ($rows as $row) {
                $raw = $row->gallery;
                if ($raw === null || $raw === '') {
                    continue;
                }
                $decoded = json_decode($raw, true);
                if (! is_array($decoded) || $decoded === []) {
                    continue;
                }
                $first = reset($decoded);
                if (is_string($first)) {
                    DB::table('projects')->where('id', $row->id)->update([
                        'gallery' => json_encode([[
                            'title' => 'Galeri',
                            'images' => array_values($decoded),
                        ]], JSON_UNESCAPED_UNICODE),
                    ]);
                }
            }
        });
    }

    /**
     * Geri alma: gruplu yapıdaki tüm görselleri tek düz diziye indirger (başlık bilgisi kaybolur).
     */
    public function down(): void
    {
        DB::table('projects')->orderBy('id')->chunkById(100, function ($rows) {
            foreach ($rows as $row) {
                $raw = $row->gallery;
                if ($raw === null || $raw === '') {
                    continue;
                }
                $decoded = json_decode($raw, true);
                if (! is_array($decoded) || $decoded === []) {
                    continue;
                }
                $first = reset($decoded);
                if (is_array($first) && isset($first['images'])) {
                    $flat = [];
                    foreach ($decoded as $g) {
                        if (is_array($g) && ! empty($g['images']) && is_array($g['images'])) {
                            foreach ($g['images'] as $img) {
                                if (is_string($img)) {
                                    $flat[] = $img;
                                }
                            }
                        }
                    }
                    DB::table('projects')->where('id', $row->id)->update([
                        'gallery' => json_encode(array_values($flat), JSON_UNESCAPED_UNICODE),
                    ]);
                }
            }
        });
    }
};
