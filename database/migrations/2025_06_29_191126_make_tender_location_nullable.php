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
        Schema::table('tenders', function (Blueprint $table) {
            $table->string('tender_location')->nullable()->change();
            $table->date('tender_date')->nullable()->change();
            $table->time('tender_time')->nullable()->change();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('tenders', function (Blueprint $table) {
            $table->string('tender_location')->nullable(false)->change();
            $table->date('tender_date')->nullable(false)->change();
            $table->time('tender_time')->nullable(false)->change();
        });
    }
};
