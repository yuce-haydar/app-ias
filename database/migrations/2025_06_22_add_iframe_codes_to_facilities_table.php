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
        // iframe_codes kolonu zaten mevcut, sadece iframe_code kolonunu kaldır
        if (Schema::hasColumn('facilities', 'iframe_code')) {
            Schema::table('facilities', function (Blueprint $table) {
                $table->dropColumn('iframe_code');
            });
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // iframe_code kolonunu geri ekle
        if (!Schema::hasColumn('facilities', 'iframe_code')) {
            Schema::table('facilities', function (Blueprint $table) {
                $table->text('iframe_code')->nullable()->after('description');
            });
        }
    }
}; 