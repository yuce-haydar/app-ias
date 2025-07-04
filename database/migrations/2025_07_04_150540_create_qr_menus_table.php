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
        Schema::create('qr_menus', function (Blueprint $table) {
            $table->id();
            $table->foreignId('facility_id')->constrained()->onDelete('cascade');
            $table->string('name'); // Menü adı
            $table->string('url_slug')->unique(); // URL slug (tesis-adi-123)
            $table->string('qr_code_path')->nullable(); // QR kod dosya yolu
            $table->text('description')->nullable(); // Menü açıklaması
            $table->string('logo')->nullable(); // Menü logosu
            $table->json('theme_colors')->nullable(); // Tema renkleri
            $table->boolean('is_active')->default(true);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('qr_menus');
    }
};
