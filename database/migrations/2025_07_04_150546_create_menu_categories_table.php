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
        Schema::create('menu_categories', function (Blueprint $table) {
            $table->id();
            $table->foreignId('qr_menu_id')->constrained()->onDelete('cascade');
            $table->string('name'); // Kategori adı (Yemekler, İçecekler, Tatlılar)
            $table->text('description')->nullable(); // Kategori açıklaması
            $table->string('icon')->nullable(); // Kategori ikonu
            $table->integer('order')->default(0); // Sıralama
            $table->boolean('is_active')->default(true);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('menu_categories');
    }
};
