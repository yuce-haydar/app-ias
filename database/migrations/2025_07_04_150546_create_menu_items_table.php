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
        Schema::create('menu_items', function (Blueprint $table) {
            $table->id();
            $table->foreignId('menu_category_id')->constrained()->onDelete('cascade');
            $table->string('name'); // Ürün adı
            $table->text('description')->nullable(); // Ürün açıklaması
            $table->decimal('price', 10, 2)->nullable(); // Fiyat
            $table->string('image')->nullable(); // Ürün resmi
            $table->json('allergens')->nullable(); // Alerjenler
            $table->json('ingredients')->nullable(); // Malzemeler
            $table->string('preparation_time')->nullable(); // Hazırlanma süresi
            $table->boolean('is_available')->default(true); // Stokta var mı
            $table->boolean('is_recommended')->default(false); // Önerilen mi
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
        Schema::dropIfExists('menu_items');
    }
};
