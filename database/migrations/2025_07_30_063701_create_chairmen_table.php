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
        Schema::create('chairmen', function (Blueprint $table) {
            $table->id();
            $table->string('name'); // Başkanın adı
            $table->string('title'); // Başkanın unvanı (örn: "Yönetim Kurulu Başkanı")
            $table->text('message'); // Başkanın mesajı
            $table->string('main_image')->nullable(); // Ana resim (HBB)
            $table->json('gallery')->nullable(); // Başkanın fotoğrafları (JSON array)
            $table->longText('biography'); // Özgeçmiş
            $table->string('education')->nullable(); // Eğitim bilgisi
            $table->string('experience')->nullable(); // İş deneyimi
            $table->json('achievements')->nullable(); // Başarılar (JSON array)
            $table->boolean('is_active')->default(true); // Aktif/Pasif
            $table->integer('sort_order')->default(0); // Sıralama
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('chairmen');
    }
};
