<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\HomePageSetting;

class HomePageSettingsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        HomePageSetting::updateOrCreate([], [
            // Hero Slider Settings
            'hero_title_1' => 'Modern İnşaat Çözümleri',
            'hero_description_1' => 'Hatay\'ın geleceğini şekillendiren projelerle şehrimize değer katıyoruz. Kaliteli ve sürdürülebilir inşaat hizmetleri sunuyoruz.',
            'hero_title_2' => 'Kırıkhan Butik Yarı Olimpik Havuz',
            'hero_description_2' => '1500 m² alanda, 25x12,5 m ölçülerinde 5 kulvarlı modern yüzme havuzu projesi. 200 kişi kapasiteli modern tesis.',
            'hero_title_3' => 'Belen Bedesten Meydan Projesi',
            'hero_description_3' => '2500 m² alanda 15 bölümlü modern bedesten kompleksi. Ticaretin kalbi olacak yeni nesil alışveriş merkezi.',
            
            // About Section
            'about_title' => 'Modern İnşaat Teknolojileri ile',
            'about_subtitle' => 'Hayata Geçirdiğimiz Projeler',
            'about_description' => '15+ yıllık tecrübemizle Hatay\'ın kentsel dönüşümüne öncülük ediyoruz. Modern inşaat teknolojileri ve sürdürülebilir yaklaşımlarla gelecek nesillere yaşanabilir mekanlar bırakıyoruz. Her projede kalite, güvenilirlik ve estetik anlayışımızı ön planda tutarak şehrimizin siluetini güzelleştiriyoruz.',
            'about_stat_1_number' => '16+',
            'about_stat_1_text' => 'Proje',
            'about_stat_2_number' => '15+',
            'about_stat_2_text' => 'Yıl Tecrübe',
            
            // Facilities Section
            'facilities_title' => 'Tamamlanan Tesisler',
            'facilities_subtitle' => 'Şehrimize Kazandırdığımız Projeler',
            'facilities_show' => true,
            
            // Construction Expertise Section  
            'expertise_title' => 'Modern İnşaat Teknolojileri ile',
            'expertise_subtitle' => 'Hatay\'ın Geleceğini İnşa Ediyoruz',
            'expertise_description' => 'Türkiye\'nin köklü şehirlerinden Hatay\'da, modern inşaat teknolojileri ile kaliteli projeler üretiyoruz.',
            'expertise_stat_1_number' => '16+',
            'expertise_stat_1_text' => 'Proje',
            'expertise_stat_2_number' => '15+',
            'expertise_stat_2_text' => 'Yıl Tecrübe',
            
            // News Section
            'news_title' => 'Son Haberler',
            'news_subtitle' => 'Projelerimizden Haberler',
            'news_show' => true,
            'news_count' => 3,
            
            // Projects Section
            'projects_title' => 'Devam Eden Projeler',
            'projects_subtitle' => 'Şehrimizin Geleceği',
            'projects_show' => true,
            'projects_map_show' => true,
            
            // Contact CTA Section
            'contact_title' => 'Projeleriniz İçin',
            'contact_subtitle' => 'Bizimle İletişime Geçin',
            'contact_show' => true,
        ]);
    }
}
