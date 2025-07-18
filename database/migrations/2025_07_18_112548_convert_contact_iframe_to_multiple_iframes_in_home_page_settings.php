<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('home_page_settings', function (Blueprint $table) {
            // Yeni JSON alan ekle
            $table->json('contact_iframe_codes')->nullable()->after('contact_iframe_code');
        });

        // Mevcut contact_iframe_code verilerini contact_iframe_codes'a aktar
        $settings = DB::table('home_page_settings')->first();
        if ($settings && $settings->contact_iframe_code) {
            DB::table('home_page_settings')
                ->where('id', $settings->id)
                ->update([
                    'contact_iframe_codes' => json_encode([
                        [
                            'title' => 'İframe 1',
                            'code' => $settings->contact_iframe_code
                        ]
                    ])
                ]);
        }

        // Eski alanı kaldır
        Schema::table('home_page_settings', function (Blueprint $table) {
            $table->dropColumn('contact_iframe_code');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('home_page_settings', function (Blueprint $table) {
            // Eski alanı geri ekle
            $table->text('contact_iframe_code')->nullable()->after('contact_show');
        });

        // contact_iframe_codes verilerini geri contact_iframe_code'a aktar
        $settings = DB::table('home_page_settings')->first();
        if ($settings && $settings->contact_iframe_codes) {
            $iframeCodes = json_decode($settings->contact_iframe_codes, true);
            if (!empty($iframeCodes[0]['code'])) {
                DB::table('home_page_settings')
                    ->where('id', $settings->id)
                    ->update([
                        'contact_iframe_code' => $iframeCodes[0]['code']
                    ]);
            }
        }

        // Yeni alanı kaldır
        Schema::table('home_page_settings', function (Blueprint $table) {
            $table->dropColumn('contact_iframe_codes');
        });
    }
};
