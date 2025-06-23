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
        Schema::create('job_postings', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('slug')->unique();
            $table->string('department');
            $table->string('position_type'); // Tam Zamanlı, Yarı Zamanlı, Stajyer
            $table->string('education_level');
            $table->string('experience_required');
            $table->text('job_description');
            $table->json('requirements')->nullable();
            $table->json('responsibilities')->nullable();
            $table->json('qualifications')->nullable();
            $table->string('location');
            $table->decimal('salary_min', 10, 2)->nullable();
            $table->decimal('salary_max', 10, 2)->nullable();
            $table->boolean('show_salary')->default(false);
            $table->date('posting_date');
            $table->date('deadline');
            $table->integer('number_of_positions')->default(1);
            $table->string('status')->default('active'); // active, closed, filled
            $table->integer('view_count')->default(0);
            $table->integer('application_count')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('job_postings');
    }
};
