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
        Schema::create('site_settings', function (Blueprint $table) {
            $table->id();
            
            // Site Genel Ayarları
            $table->string('site_title')->nullable();
            $table->text('site_description')->nullable();
            $table->string('site_keywords')->nullable();
            $table->string('site_logo')->nullable();
            $table->string('site_favicon')->nullable();
            
            // Header Ayarları
            $table->string('header_phone')->nullable();
            $table->string('header_email')->nullable();
            $table->string('header_address')->nullable();
            $table->text('header_announcement')->nullable();
            $table->boolean('header_announcement_show')->default(false);
            
            // Footer Ayarları
            $table->text('footer_description')->nullable();
            $table->string('footer_phone')->nullable();
            $table->string('footer_email')->nullable();
            $table->string('footer_address')->nullable();
            $table->string('footer_working_hours')->nullable();
            
            // Sosyal Medya
            $table->string('social_facebook')->nullable();
            $table->string('social_instagram')->nullable();
            $table->string('social_twitter')->nullable();
            $table->string('social_linkedin')->nullable();
            $table->string('social_youtube')->nullable();
            $table->string('social_whatsapp')->nullable();
            
            // İletişim Bilgileri
            $table->string('contact_phone_1')->nullable();
            $table->string('contact_phone_2')->nullable();
            $table->string('contact_email_1')->nullable();
            $table->string('contact_email_2')->nullable();
            $table->text('contact_address')->nullable();
            $table->string('contact_google_maps')->nullable();
            
            // Copyright ve Yasal
            $table->string('copyright_text')->nullable();
            $table->integer('founded_year')->nullable();
            $table->text('privacy_policy')->nullable();
            $table->text('terms_conditions')->nullable();
            
            // SEO Ayarları
            $table->text('google_analytics')->nullable();
            $table->text('facebook_pixel')->nullable();
            $table->text('custom_css')->nullable();
            $table->text('custom_js')->nullable();
            
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('site_settings');
    }
};
