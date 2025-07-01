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
        Schema::create('home_page_settings', function (Blueprint $table) {
            $table->id();
            
            // Genel ayarlar
            $table->boolean('is_slider_active')->default(true);
            $table->boolean('is_about_section_active')->default(true);
            $table->boolean('is_services_section_active')->default(true);
            $table->boolean('is_projects_section_active')->default(true);
            $table->boolean('is_news_section_active')->default(true);
            $table->boolean('is_stats_section_active')->default(true);
            $table->boolean('is_cta_section_active')->default(true);
            
            // Slider ayarları
            $table->json('sliders')->nullable()->comment('Slider görsellerini, başlıklarını ve açıklamalarını içeren JSON dizisi');
            
            // Hakkında bölümü
            $table->string('about_title')->nullable();
            $table->text('about_content')->nullable();
            $table->string('about_image')->nullable();
            $table->string('about_button_text')->nullable();
            $table->string('about_button_link')->nullable();
            
            // Hizmetler bölümü
            $table->string('services_title')->nullable();
            $table->text('services_description')->nullable();
            $table->integer('featured_services_count')->default(6);
            $table->boolean('services_show_only_featured')->default(false);
            
            // Projeler bölümü
            $table->string('projects_title')->nullable();
            $table->text('projects_description')->nullable();
            $table->integer('featured_projects_count')->default(6);
            $table->boolean('projects_show_only_featured')->default(false);
            
            // Haberler bölümü
            $table->string('news_title')->nullable();
            $table->text('news_description')->nullable();
            $table->integer('featured_news_count')->default(3);
            $table->boolean('news_show_only_featured')->default(false);
            
            // İstatistikler bölümü
            $table->json('statistics')->nullable()->comment('İstatistik başlıklarını ve değerlerini içeren JSON dizisi');
            $table->string('stats_background_image')->nullable();
            
            // CTA (Call to Action) bölümü
            $table->string('cta_title')->nullable();
            $table->text('cta_description')->nullable();
            $table->string('cta_button_text')->nullable();
            $table->string('cta_button_link')->nullable();
            $table->string('cta_background_image')->nullable();
            
            // Video bölümü
            $table->boolean('is_video_section_active')->default(false);
            $table->string('video_title')->nullable();
            $table->text('video_description')->nullable();
            $table->string('video_cover_image')->nullable();
            $table->string('video_url')->nullable();
            
            // SEO meta etiketleri (anasayfaya özel)
            $table->string('meta_title')->nullable();
            $table->text('meta_description')->nullable();
            $table->string('meta_keywords')->nullable();
            $table->string('og_image')->nullable();
            
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('home_page_settings');
    }
};
