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
            // tender_no sütunu ekle (tender_number'dan farklı)
            $table->string('tender_no')->after('tender_number')->nullable();
            
            // featured sütunu ekle
            $table->boolean('featured')->default(false)->after('status');
            
            // deadline sütununu date tipine çevir
            $table->date('deadline')->change();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('tenders', function (Blueprint $table) {
            $table->dropColumn(['tender_no', 'featured']);
            $table->datetime('deadline')->change();
        });
    }
};
