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
        Schema::table('news', function (Blueprint $table) {
            $table->dropUnique(['slug']); // Unique constraint'i kaldır
        });

        Schema::table('announcements', function (Blueprint $table) {
            $table->dropUnique(['slug']); // Unique constraint'i kaldır
        });

        Schema::table('projects', function (Blueprint $table) {
            $table->dropUnique(['slug']); // Unique constraint'i kaldır
        });

        Schema::table('facilities', function (Blueprint $table) {
            $table->dropUnique(['slug']); // Unique constraint'i kaldır
        });

        Schema::table('services', function (Blueprint $table) {
            $table->dropUnique(['slug']); // Unique constraint'i kaldır
        });

        Schema::table('job_postings', function (Blueprint $table) {
            $table->dropUnique(['slug']); // Unique constraint'i kaldır
        });

        Schema::table('tenders', function (Blueprint $table) {
            $table->dropUnique(['slug']); // Unique constraint'i kaldır
        });

        Schema::table('team_members', function (Blueprint $table) {
            $table->dropUnique(['slug']); // Unique constraint'i kaldır
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('news', function (Blueprint $table) {
            $table->unique('slug');
        });

        Schema::table('announcements', function (Blueprint $table) {
            $table->unique('slug');
        });

        Schema::table('projects', function (Blueprint $table) {
            $table->unique('slug');
        });

        Schema::table('facilities', function (Blueprint $table) {
            $table->unique('slug');
        });

        Schema::table('services', function (Blueprint $table) {
            $table->unique('slug');
        });

        Schema::table('job_postings', function (Blueprint $table) {
            $table->unique('slug');
        });

        Schema::table('tenders', function (Blueprint $table) {
            $table->unique('slug');
        });

        Schema::table('team_members', function (Blueprint $table) {
            $table->unique('slug');
        });
    }
}; 