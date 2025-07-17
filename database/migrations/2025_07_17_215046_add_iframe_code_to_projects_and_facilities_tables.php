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
        // Projects tablosuna iframe_code kolonu ekle (eğer yoksa)
        Schema::table('projects', function (Blueprint $table) {
            if (!Schema::hasColumn('projects', 'iframe_code')) {
                $table->text('iframe_code')->nullable()->after('description');
            }
        });

        // Facilities tablosuna iframe_code kolonu ekle (eğer yoksa)
        Schema::table('facilities', function (Blueprint $table) {
            if (!Schema::hasColumn('facilities', 'iframe_code')) {
                $table->text('iframe_code')->nullable()->after('description');
            }
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('projects', function (Blueprint $table) {
            if (Schema::hasColumn('projects', 'iframe_code')) {
                $table->dropColumn('iframe_code');
            }
        });

        Schema::table('facilities', function (Blueprint $table) {
            if (Schema::hasColumn('facilities', 'iframe_code')) {
                $table->dropColumn('iframe_code');
            }
        });
    }
};
