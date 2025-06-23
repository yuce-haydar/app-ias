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
        Schema::table('users', function (Blueprint $table) {
            $table->boolean('is_admin')->default(false)->after('email');
            $table->string('role')->default('user')->after('is_admin'); // admin, editor, user
            $table->json('permissions')->nullable()->after('role');
            $table->string('phone')->nullable()->after('permissions');
            $table->string('avatar')->nullable()->after('phone');
            $table->datetime('last_login_at')->nullable()->after('avatar');
            $table->string('last_login_ip')->nullable()->after('last_login_at');
            $table->boolean('is_active')->default(true)->after('last_login_ip');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn(['is_admin', 'role', 'permissions', 'phone', 'avatar', 'last_login_at', 'last_login_ip', 'is_active']);
        });
    }
};
