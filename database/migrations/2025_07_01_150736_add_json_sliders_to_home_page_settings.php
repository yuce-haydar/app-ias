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
        Schema::table('home_page_settings', function (Blueprint $table) {
            // Hero Slider JSON - sınırsız slide
            $table->json('hero_slides')->nullable()->after('hero_image_3');
            
            // About Section Images JSON - sınırsız görsel
            $table->json('about_images')->nullable()->after('about_image_2');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('home_page_settings', function (Blueprint $table) {
            $table->dropColumn(['hero_slides', 'about_images']);
        });
    }
};
