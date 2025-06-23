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
        Schema::create('announcements', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('slug')->unique();
            $table->text('content');
            $table->string('announcement_type'); // Genel Duyuru, İhale Duyurusu, Etkinlik, vb.
            $table->string('importance')->default('normal'); // urgent, high, normal, low
            $table->date('start_date')->nullable();
            $table->date('end_date')->nullable();
            $table->json('attachments')->nullable();
            $table->string('status')->default('active'); // active, expired, cancelled
            $table->boolean('is_pinned')->default(false);
            $table->integer('view_count')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('announcements');
    }
};
