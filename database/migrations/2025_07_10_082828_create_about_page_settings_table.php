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
        Schema::create('about_page_settings', function (Blueprint $table) {
            $table->id();
            
            // Hakkımızda Ana Bölüm
            $table->string('main_title')->default('Şehrimize Değer Katmak İçin Çalışıyoruz');
            $table->text('main_description_1')->nullable();
            $table->text('main_description_2')->nullable();
            $table->string('main_image_1')->nullable();
            $table->string('main_image_2')->nullable();
            
            // Özellik Listesi
            $table->json('features')->nullable(); // JSON array olarak özellikler
            
            // Misyon & Vizyon
            $table->text('mission_text')->nullable();
            $table->text('vision_text')->nullable();
            
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('about_page_settings');
    }
};
