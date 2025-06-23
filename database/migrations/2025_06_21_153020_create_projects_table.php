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
        Schema::create('projects', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('slug')->unique();
            $table->text('short_description');
            $table->longText('description');
            $table->string('image')->nullable();
            $table->json('gallery')->nullable();
            $table->string('project_type'); // Altyapı, Üstyapı, Sosyal Tesis
            $table->string('status')->default('planned'); // planned, ongoing, completed
            $table->date('start_date')->nullable();
            $table->date('completion_date')->nullable();
            $table->decimal('budget', 15, 2)->nullable();
            $table->string('contractor')->nullable();
            $table->json('features')->nullable();
            $table->json('technical_specs')->nullable();
            $table->string('location')->nullable();
            $table->decimal('latitude', 10, 8)->nullable();
            $table->decimal('longitude', 11, 8)->nullable();
            $table->integer('progress_percentage')->default(0);
            $table->integer('sort_order')->default(0);
            $table->boolean('is_featured')->default(false);
            $table->integer('view_count')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('projects');
    }
};
