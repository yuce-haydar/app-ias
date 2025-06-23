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
        Schema::create('tenders', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('slug')->unique();
            $table->string('tender_number')->unique();
            $table->text('description');
            $table->string('tender_type'); // Mal Alımı, Hizmet Alımı, Yapım İşi
            $table->string('procurement_method'); // Açık İhale, Pazarlık Usulü
            $table->decimal('estimated_cost', 15, 2)->nullable();
            $table->date('announcement_date');
            $table->datetime('deadline');
            $table->date('tender_date');
            $table->time('tender_time');
            $table->string('tender_location');
            $table->json('documents')->nullable(); // İhale dokümanları
            $table->json('requirements')->nullable(); // Katılım şartları
            $table->string('contact_person')->nullable();
            $table->string('contact_phone')->nullable();
            $table->string('contact_email')->nullable();
            $table->string('status')->default('active'); // active, cancelled, completed
            $table->integer('view_count')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tenders');
    }
};
