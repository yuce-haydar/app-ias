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
            // Mevcut alanları kontrol et ve sadece yoksa ekle
            if (!Schema::hasColumn('home_page_settings', 'hero_title_1')) {
                $table->string('hero_title_1')->nullable();
            }
            if (!Schema::hasColumn('home_page_settings', 'hero_description_1')) {
                $table->text('hero_description_1')->nullable();
            }
            if (!Schema::hasColumn('home_page_settings', 'hero_image_1')) {
                $table->string('hero_image_1')->nullable();
            }
            if (!Schema::hasColumn('home_page_settings', 'hero_title_2')) {
                $table->string('hero_title_2')->nullable();
            }
            if (!Schema::hasColumn('home_page_settings', 'hero_description_2')) {
                $table->text('hero_description_2')->nullable();
            }
            if (!Schema::hasColumn('home_page_settings', 'hero_image_2')) {
                $table->string('hero_image_2')->nullable();
            }
            if (!Schema::hasColumn('home_page_settings', 'hero_title_3')) {
                $table->string('hero_title_3')->nullable();
            }
            if (!Schema::hasColumn('home_page_settings', 'hero_description_3')) {
                $table->text('hero_description_3')->nullable();
            }
            if (!Schema::hasColumn('home_page_settings', 'hero_image_3')) {
                $table->string('hero_image_3')->nullable();
            }
            
            // About Section Images
            if (!Schema::hasColumn('home_page_settings', 'about_image_1')) {
                $table->string('about_image_1')->nullable();
            }
            if (!Schema::hasColumn('home_page_settings', 'about_image_2')) {
                $table->string('about_image_2')->nullable();
            }
            
            // About Section
            if (!Schema::hasColumn('home_page_settings', 'about_subtitle')) {
                $table->string('about_subtitle')->nullable();
            }
            if (!Schema::hasColumn('home_page_settings', 'about_description')) {
                $table->text('about_description')->nullable();
            }
            
            // About Section Statistics
            if (!Schema::hasColumn('home_page_settings', 'about_stat_1_number')) {
                $table->string('about_stat_1_number')->nullable();
            }
            if (!Schema::hasColumn('home_page_settings', 'about_stat_1_text')) {
                $table->string('about_stat_1_text')->nullable();
            }
            if (!Schema::hasColumn('home_page_settings', 'about_stat_2_number')) {
                $table->string('about_stat_2_number')->nullable();
            }
            if (!Schema::hasColumn('home_page_settings', 'about_stat_2_text')) {
                $table->string('about_stat_2_text')->nullable();
            }
            
            // Facilities Section
            if (!Schema::hasColumn('home_page_settings', 'facilities_title')) {
                $table->string('facilities_title')->nullable();
            }
            if (!Schema::hasColumn('home_page_settings', 'facilities_subtitle')) {
                $table->string('facilities_subtitle')->nullable();
            }
            if (!Schema::hasColumn('home_page_settings', 'facilities_show')) {
                $table->boolean('facilities_show')->default(true);
            }
            
            // Expertise Section
            if (!Schema::hasColumn('home_page_settings', 'expertise_title')) {
                $table->string('expertise_title')->nullable();
            }
            if (!Schema::hasColumn('home_page_settings', 'expertise_subtitle')) {
                $table->string('expertise_subtitle')->nullable();
            }
            if (!Schema::hasColumn('home_page_settings', 'expertise_description')) {
                $table->text('expertise_description')->nullable();
            }
            if (!Schema::hasColumn('home_page_settings', 'expertise_stat_1_number')) {
                $table->string('expertise_stat_1_number')->nullable();
            }
            if (!Schema::hasColumn('home_page_settings', 'expertise_stat_1_text')) {
                $table->string('expertise_stat_1_text')->nullable();
            }
            if (!Schema::hasColumn('home_page_settings', 'expertise_stat_2_number')) {
                $table->string('expertise_stat_2_number')->nullable();
            }
            if (!Schema::hasColumn('home_page_settings', 'expertise_stat_2_text')) {
                $table->string('expertise_stat_2_text')->nullable();
            }
            
            // Projects Section
            if (!Schema::hasColumn('home_page_settings', 'projects_title')) {
                $table->string('projects_title')->nullable();
            }
            if (!Schema::hasColumn('home_page_settings', 'projects_subtitle')) {
                $table->string('projects_subtitle')->nullable();
            }
            if (!Schema::hasColumn('home_page_settings', 'projects_show')) {
                $table->boolean('projects_show')->default(true);
            }
            if (!Schema::hasColumn('home_page_settings', 'projects_map_show')) {
                $table->boolean('projects_map_show')->default(true);
            }
            
            // News Section
            if (!Schema::hasColumn('home_page_settings', 'news_title')) {
                $table->string('news_title')->nullable();
            }
            if (!Schema::hasColumn('home_page_settings', 'news_subtitle')) {
                $table->string('news_subtitle')->nullable();
            }
            if (!Schema::hasColumn('home_page_settings', 'news_show')) {
                $table->boolean('news_show')->default(true);
            }
            if (!Schema::hasColumn('home_page_settings', 'news_count')) {
                $table->integer('news_count')->default(3);
            }
            
            // Contact Section
            if (!Schema::hasColumn('home_page_settings', 'contact_title')) {
                $table->string('contact_title')->nullable();
            }
            if (!Schema::hasColumn('home_page_settings', 'contact_subtitle')) {
                $table->string('contact_subtitle')->nullable();
            }
            if (!Schema::hasColumn('home_page_settings', 'contact_show')) {
                $table->boolean('contact_show')->default(true);
            }
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('home_page_settings', function (Blueprint $table) {
            $table->dropColumn([
                'hero_title_1', 'hero_description_1', 'hero_image_1',
                'hero_title_2', 'hero_description_2', 'hero_image_2',
                'hero_title_3', 'hero_description_3', 'hero_image_3',
                'about_image_1', 'about_image_2',
                'facilities_show', 'projects_show', 'projects_map_show',
                'news_count', 'contact_show'
            ]);
        });
    }
};
