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
        Schema::table('home_page_settings', function (Blueprint $table) {
            if (!Schema::hasColumn('home_page_settings', 'slider_iframe_code')) {
                $table->text('slider_iframe_code')->nullable()->after('footer_iframe_code');
            }
            if (!Schema::hasColumn('home_page_settings', 'contact_iframe_code')) {
                $table->text('contact_iframe_code')->nullable()->after('slider_iframe_code');
            }
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('home_page_settings', function (Blueprint $table) {
            if (Schema::hasColumn('home_page_settings', 'slider_iframe_code')) {
                $table->dropColumn('slider_iframe_code');
            }
            if (Schema::hasColumn('home_page_settings', 'contact_iframe_code')) {
                $table->dropColumn('contact_iframe_code');
            }
        });
    }
};
