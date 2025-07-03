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
        Schema::table('announcements', function (Blueprint $table) {
            $table->string('category')->default('Genel')->after('announcement_type');
            $table->string('image')->nullable()->after('content');
            $table->text('summary')->nullable()->after('image');
            $table->string('author')->default('Hatay İmar')->after('summary');
            $table->string('tags')->nullable()->after('author');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('announcements', function (Blueprint $table) {
            $table->dropColumn(['category', 'image', 'summary', 'author', 'tags']);
        });
    }
};
