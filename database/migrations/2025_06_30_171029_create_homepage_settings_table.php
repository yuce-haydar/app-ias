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
        Schema::create('homepage_settings', function (Blueprint $table) {
            $table->id();
            
            // Hero Slider Settings
            $table->string('hero_title_1')->nullable();
            $table->text('hero_description_1')->nullable();
            $table->string('hero_image_1')->nullable();
            $table->string('hero_title_2')->nullable();
            $table->text('hero_description_2')->nullable();
            $table->string('hero_image_2')->nullable();
            $table->string('hero_title_3')->nullable();
            $table->text('hero_description_3')->nullable();
            $table->string('hero_image_3')->nullable();
            
            // About Section
            $table->string('about_title')->nullable();
            $table->string('about_subtitle')->nullable();
            $table->text('about_description')->nullable();
            $table->string('about_stat_1_number')->nullable();
            $table->string('about_stat_1_text')->nullable();
            $table->string('about_stat_2_number')->nullable();
            $table->string('about_stat_2_text')->nullable();
            $table->string('about_image_1')->nullable();
            $table->string('about_image_2')->nullable();
            
            // Completed Facilities Section
            $table->string('facilities_title')->nullable();
            $table->string('facilities_subtitle')->nullable();
            $table->boolean('facilities_show')->default(true);
            
            // Construction Expertise Section  
            $table->string('expertise_title')->nullable();
            $table->string('expertise_subtitle')->nullable();
            $table->text('expertise_description')->nullable();
            $table->string('expertise_stat_1_number')->nullable();
            $table->string('expertise_stat_1_text')->nullable();
            $table->string('expertise_stat_2_number')->nullable();
            $table->string('expertise_stat_2_text')->nullable();
            
            // News Section
            $table->string('news_title')->nullable();
            $table->string('news_subtitle')->nullable();
            $table->boolean('news_show')->default(true);
            $table->integer('news_count')->default(3);
            
            // Projects Section
            $table->string('projects_title')->nullable();
            $table->string('projects_subtitle')->nullable();
            $table->boolean('projects_show')->default(true);
            $table->boolean('projects_map_show')->default(true);
            
            // Contact CTA Section
            $table->string('contact_title')->nullable();
            $table->string('contact_subtitle')->nullable();
            $table->boolean('contact_show')->default(true);
            
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('homepage_settings');
    }
};
