<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        // HomePageSettings tablosuna footer iframe kolonu ekle
        Schema::table('home_page_settings', function (Blueprint $table) {
            if (!Schema::hasColumn('home_page_settings', 'footer_iframe_code')) {
                $table->text('footer_iframe_code')->nullable()->after('contact_show');
            }
        });

        // AboutPageSettings tablosuna iframe kolonu ekle
        Schema::table('about_page_settings', function (Blueprint $table) {
            if (!Schema::hasColumn('about_page_settings', 'iframe_code')) {
                $table->text('iframe_code')->nullable()->after('vision_text');
            }
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('home_page_settings', function (Blueprint $table) {
            if (Schema::hasColumn('home_page_settings', 'footer_iframe_code')) {
                $table->dropColumn('footer_iframe_code');
            }
        });

        Schema::table('about_page_settings', function (Blueprint $table) {
            if (Schema::hasColumn('about_page_settings', 'iframe_code')) {
                $table->dropColumn('iframe_code');
            }
        });
    }
};
