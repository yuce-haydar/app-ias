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
        Schema::table('job_applications', function (Blueprint $table) {
            // Form'da kullanılan eksik sütunları ekle
            $table->string('first_name')->after('job_posting_id'); // Ad
            $table->string('last_name')->after('first_name'); // Soyad  
            $table->text('address')->nullable()->after('phone'); // Adres
            $table->text('notes')->nullable()->after('admin_notes'); // Notlar
            $table->json('education')->nullable()->after('graduation_year'); // Eğitim bilgileri (JSON)
            $table->json('experience')->nullable()->after('work_experience'); // Deneyim bilgileri (JSON)
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('job_applications', function (Blueprint $table) {
            // Eklenen sütunları kaldır
            $table->dropColumn([
                'first_name',
                'last_name',
                'address',
                'notes',
                'education',
                'experience'
            ]);
        });
    }
};
