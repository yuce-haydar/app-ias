<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\ContactSettings;

class ContactSettingsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        ContactSettings::create([
            'subtitle' => 'BİZİMLE İLETİŞİME GEÇİN',
            'title' => 'Hatay İmar ile iletişime geçin iletişim bilgilerimiz',
            'description' => 'Sorularınız, önerileriniz ve talepleriniz için bizimle iletişim kurabilirsiniz. Size en kısa sürede dönüş yapacağız.',
            'office_title' => 'Merkez Ofisimiz',
            'office_address' => 'Antakya Belediye Binası, Kurtuluş Mahallesi, Atatürk Caddesi Antakya/HATAY - TÜRKİYE',
            'phone_title' => 'Telefon Numaralarımız',
            'phone_general' => '+90 326 214 12 34',
            'phone_fax' => '+90 326 214 12 35',
            'email_title' => 'E-posta Adreslerimiz',
            'email_info' => 'info@hatayimar.gov.tr',
            'email_contact' => 'iletisim@hatayimar.gov.tr',
            'working_hours_title' => 'Çalışma Saatlerimiz',
            'working_hours_weekday' => 'Pazartesi - Cuma: 08:30 - 17:30',
            'working_hours_weekend' => 'Cumartesi - Pazar: Kapalı',
            'facebook_url' => null,
            'twitter_url' => null,
            'instagram_url' => null,
            'youtube_url' => null,
            'map_embed_code' => null,
        ]);
    }
}
