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
        Schema::create('job_applications', function (Blueprint $table) {
            $table->id();
            $table->foreignId('job_posting_id')->constrained()->onDelete('cascade');
            $table->string('name');
            $table->string('email');
            $table->string('phone');
            $table->date('birth_date');
            $table->string('gender')->nullable();
            $table->string('military_status')->nullable();
            $table->string('education_level');
            $table->string('university')->nullable();
            $table->string('department')->nullable();
            $table->year('graduation_year')->nullable();
            $table->text('work_experience')->nullable();
            $table->json('languages')->nullable();
            $table->json('skills')->nullable();
            $table->text('references')->nullable();
            $table->string('cv_file')->nullable();
            $table->text('cover_letter')->nullable();
            $table->string('expected_salary')->nullable();
            $table->date('available_start_date')->nullable();
            $table->string('status')->default('pending'); // pending, reviewing, interviewed, accepted, rejected
            $table->datetime('reviewed_at')->nullable();
            $table->text('admin_notes')->nullable();
            $table->integer('rating')->nullable();
            $table->string('ip_address')->nullable();
            $table->boolean('kvkk_consent')->default(false);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('job_applications');
    }
};
