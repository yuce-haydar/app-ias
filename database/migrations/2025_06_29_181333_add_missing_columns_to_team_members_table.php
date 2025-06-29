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
        Schema::table('team_members', function (Blueprint $table) {
            // Form'da kullanılan eksik sütunları ekle
            $table->string('designation')->after('position'); // Unvan
            $table->text('description')->nullable()->after('designation'); // Açıklama
            $table->text('bio')->nullable()->after('biography'); // Biyografi (biography'den farklı)
            $table->json('specialties')->nullable()->after('skills'); // Uzmanlık alanları
            $table->string('image')->nullable()->after('photo'); // Fotoğraf (photo'dan farklı)
            $table->integer('experience_years')->nullable()->after('experience'); // Deneyim yılı
            $table->string('social_facebook')->nullable()->after('linkedin'); // Facebook
            $table->string('social_twitter')->nullable()->after('social_facebook'); // Twitter
            $table->string('social_linkedin')->nullable()->after('social_twitter'); // LinkedIn (linkedin'den farklı)
            $table->string('social_instagram')->nullable()->after('social_linkedin'); // Instagram
            $table->boolean('status')->default(true)->after('is_active'); // Durum (is_active'den farklı)
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('team_members', function (Blueprint $table) {
            // Eklenen sütunları kaldır
            $table->dropColumn([
                'designation',
                'description', 
                'bio',
                'specialties',
                'image',
                'experience_years',
                'social_facebook',
                'social_twitter',
                'social_linkedin', 
                'social_instagram',
                'status'
            ]);
        });
    }
};
