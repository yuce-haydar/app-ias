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
            $table->datetime('published_at')->nullable()->after('status');
        });
        
        // Mevcut 'published' durumundaki kayıtlar için published_at değerini set et
        DB::table('announcements')
            ->where('status', 'published')
            ->whereNull('published_at')
            ->update(['published_at' => DB::raw('created_at')]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('announcements', function (Blueprint $table) {
            $table->dropColumn('published_at');
        });
    }
};
