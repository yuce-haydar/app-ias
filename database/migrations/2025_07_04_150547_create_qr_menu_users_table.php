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
        Schema::create('qr_menu_users', function (Blueprint $table) {
            $table->id();
            $table->foreignId('qr_menu_id')->constrained()->onDelete('cascade');
            $table->string('name'); // Kullanıcı adı
            $table->string('email')->unique(); // Email
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password'); // Şifre
            $table->string('phone')->nullable(); // Telefon
            $table->enum('role', ['owner', 'manager', 'staff'])->default('manager'); // Rol
            $table->boolean('is_active')->default(true);
            $table->timestamp('last_login_at')->nullable();
            $table->rememberToken();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('qr_menu_users');
    }
};
