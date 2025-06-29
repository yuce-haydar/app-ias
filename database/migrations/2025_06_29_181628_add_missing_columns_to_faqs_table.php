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
        Schema::table('faqs', function (Blueprint $table) {
            // Form'da kullanılan eksik sütunları ekle
            $table->boolean('featured')->default(false)->after('is_active'); // Öne çıkan
            $table->boolean('status')->default(true)->after('featured'); // Aktif durumu (is_active'e ek olarak)
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('faqs', function (Blueprint $table) {
            // Eklenen sütunları kaldır
            $table->dropColumn(['featured', 'status']);
        });
    }
};
