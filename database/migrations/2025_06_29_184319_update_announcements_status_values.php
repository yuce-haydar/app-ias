<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('announcements', function (Blueprint $table) {
            // Mevcut 'active' status'u 'published' olarak güncelle
            DB::table('announcements')->where('status', 'active')->update(['status' => 'published']);
            
            // Default değeri published yap
            $table->string('status')->default('published')->change();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('announcements', function (Blueprint $table) {
            // Geri al
            DB::table('announcements')->where('status', 'published')->update(['status' => 'active']);
            $table->string('status')->default('active')->change();
        });
    }
};
