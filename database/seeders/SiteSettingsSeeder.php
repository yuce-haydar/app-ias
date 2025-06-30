<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\SiteSetting;

class SiteSettingsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        SiteSetting::updateOrCreate([], [
            // Site Genel Ayarları
            'site_title' => 'Hatay İmar A.Ş. - Modern İnşaat Çözümleri',
            'site_description' => 'Hatay İmar A.Ş. olarak 15+ yıllık tecrübemizle modern inşaat teknolojileri ve kaliteli hizmet anlayışıyla şehrimizin geleceğini inşa ediyoruz. Konut, ticari ve sosyal tesis projelerinde güvenilir çözüm ortağınız.',
            'site_keywords' => 'hatay imar, inşaat firması hatay, hatay inşaat, modern projeler, yüzme havuzu, spor kompleksi, bedesten, taziye evi, inşaat hizmetleri',
            'founded_year' => 2008,
            
            // Header Ayarları
            'header_phone' => '+90 326 123 45 67',
            'header_email' => 'info@hatayimar.com.tr',
            'header_address' => 'Antakya/Hatay',
            'header_announcement' => 'Yeni projelerimizden haberdar olmak için bizi takip edin!',
            'header_announcement_show' => true,
            
            // Footer Ayarları
            'footer_description' => 'Hatay İmar A.Ş. olarak 15+ yıllık tecrübemizle şehrimizin geleceğini inşa ediyoruz. Modern inşaat teknolojileri ve kaliteli hizmet anlayışıyla projelerinizi hayata geçiriyoruz.',
            'footer_phone' => '+90 326 123 45 67',
            'footer_email' => 'info@hatayimar.com.tr',
            'footer_address' => 'Antakya Merkez, Hatay',
            'footer_working_hours' => 'Pazartesi - Cuma: 08:00-17:00',
            
            // Sosyal Medya
            'social_facebook' => 'https://facebook.com/hatayimar',
            'social_instagram' => 'https://instagram.com/hatayimar',
            'social_twitter' => 'https://twitter.com/hatayimar',
            'social_linkedin' => 'https://linkedin.com/company/hatayimar',
            'social_youtube' => 'https://youtube.com/@hatayimar',
            'social_whatsapp' => '905326123456',
            
            // İletişim Bilgileri
            'contact_phone_1' => '+90 326 123 45 67',
            'contact_phone_2' => '+90 326 123 45 68',
            'contact_email_1' => 'info@hatayimar.com.tr',
            'contact_email_2' => 'proje@hatayimar.com.tr',
            'contact_address' => 'Antakya Merkez, Hatay Türkiye',
            'contact_google_maps' => '<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3243.123456789!2d36.1234567!3d36.1234567!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x0!2zMzbCsDA3JzI0LjQiTiAzNsKwMDcnMjQuNCJF!5e0!3m2!1str!2str!4v1234567890123!5m2!1str!2str" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy"></iframe>',
            
            // Copyright ve Yasal
            'copyright_text' => '© 2024 Hatay İmar A.Ş. Tüm Hakları Saklıdır.',
            'privacy_policy' => 'Gizlilik politikamız yakında güncellenecektir.',
            'terms_conditions' => 'Kullanım şartlarımız yakında güncellenecektir.',
        ]);
    }
}
