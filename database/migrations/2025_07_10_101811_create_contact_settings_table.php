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
        Schema::create('contact_settings', function (Blueprint $table) {
            $table->id();
            
            // Başlık ve açıklama
            $table->string('subtitle')->default('BİZİMLE İLETİŞİME GEÇİN');
            $table->string('title')->default('Hatay İmar ile iletişime geçin iletişim bilgilerimiz');
            $table->text('description')->default('Sorularınız, önerileriniz ve talepleriniz için bizimle iletişim kurabilirsiniz. Size en kısa sürede dönüş yapacağız.');
            
            // Merkez Ofis
            $table->string('office_title')->default('Merkez Ofisimiz');
            $table->text('office_address')->default('Antakya Belediye Binası, Kurtuluş Mahallesi, Atatürk Caddesi Antakya/HATAY - TÜRKİYE');
            
            // Telefon bilgileri
            $table->string('phone_title')->default('Telefon Numaralarımız');
            $table->string('phone_general')->default('+90 326 214 12 34');
            $table->string('phone_fax')->default('+90 326 214 12 35');
            
            // E-posta bilgileri
            $table->string('email_title')->default('E-posta Adreslerimiz');
            $table->string('email_info')->default('info@hatayimar.gov.tr');
            $table->string('email_contact')->default('iletisim@hatayimar.gov.tr');
            
            // Çalışma saatleri
            $table->string('working_hours_title')->default('Çalışma Saatlerimiz');
            $table->string('working_hours_weekday')->default('Pazartesi - Cuma: 08:30 - 17:30');
            $table->string('working_hours_weekend')->default('Cumartesi - Pazar: Kapalı');
            
            // Sosyal medya
            $table->string('facebook_url')->nullable();
            $table->string('twitter_url')->nullable();
            $table->string('instagram_url')->nullable();
            $table->string('youtube_url')->nullable();
            
            // Harita
            $table->text('map_embed_code')->nullable();
            
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('contact_settings');
    }
};
