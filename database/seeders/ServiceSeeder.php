<?php

namespace Database\Seeders;

use App\Models\Service;
use Illuminate\Database\Seeder;

class ServiceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $services = [
            [
                'title' => 'Altyapı İnşaatı',
                'short_description' => 'Modern ve dayanıklı altyapı çözümleri ile şehirlerin geleceğini inşa ediyoruz.',
                'description' => 'Hatay İmar olarak, şehirlerin modern altyapı ihtiyaçlarını karşılamak için kapsamlı çözümler sunuyoruz. Yol, köprü, kanalizasyon ve su sistemleri gibi kritik altyapı projelerinde uzmanlaşmış ekibimizle, güvenilir ve uzun ömürlü yapılar inşa ediyoruz.',
                'icon' => 'flaticon-construction',
                'image' => 'services/service01.jpg',
                'service_category' => 'altyapi',
                'features' => [
                    'Yol ve köprü inşaatı',
                    'Kanalizasyon sistemleri',
                    'İçme suyu şebekeleri',
                    'Yağmur suyu drenaj sistemleri',
                    'Altyapı rehabilitasyon projeleri'
                ],
                'benefits' => [
                    'Modern teknoloji kullanımı',
                    'Çevre dostu çözümler',
                    'Uzun ömürlü yapılar',
                    'Hızlı proje teslimi'
                ],
                'status' => 'active',
                'sort_order' => 1,
                'is_featured' => true
            ],
            [
                'title' => 'Üstyapı İnşaatı',
                'short_description' => 'Konut, ticari ve endüstriyel yapılar için profesyonel inşaat hizmetleri.',
                'description' => 'Üstyapı projelerinde kalite ve güvenliği ön planda tutarak, modern yaşam alanları oluşturuyoruz. Konut projelerinden ticari komplekslere, endüstriyel tesislerden kamu binalarına kadar geniş bir yelpazede hizmet veriyoruz.',
                'icon' => 'flaticon-building',
                'image' => 'services/service02.jpg',
                'service_category' => 'ustyapi',
                'features' => [
                    'Konut projeleri',
                    'Ticari binalar',
                    'Endüstriyel tesisler',
                    'Kamu binaları',
                    'Restorasyon ve yenileme'
                ],
                'benefits' => [
                    'Depreme dayanıklı yapılar',
                    'Enerji verimli tasarımlar',
                    'Modern mimari çözümler',
                    'Kaliteli malzeme kullanımı'
                ],
                'status' => 'active',
                'sort_order' => 2,
                'is_featured' => true
            ],
            [
                'title' => 'Proje Yönetimi',
                'short_description' => 'İnşaat projelerinizi baştan sona profesyonelce yönetiyoruz.',
                'description' => 'Deneyimli proje yönetim ekibimizle, inşaat projelerinizin her aşamasını titizlikle planlıyor ve yönetiyoruz. Zaman, bütçe ve kalite hedeflerinize ulaşmanız için kapsamlı proje yönetimi hizmetleri sunuyoruz.',
                'icon' => 'flaticon-project-management',
                'image' => 'services/service03.jpg',
                'service_category' => 'yonetim',
                'features' => [
                    'Fizibilite çalışmaları',
                    'Proje planlama ve tasarım',
                    'Maliyet kontrolü',
                    'Zaman yönetimi',
                    'Kalite güvence sistemleri'
                ],
                'benefits' => [
                    'Profesyonel ekip desteği',
                    'Şeffaf proje takibi',
                    'Risk yönetimi',
                    'Zamanında teslim garantisi'
                ],
                'status' => 'active',
                'sort_order' => 3,
                'is_featured' => false
            ],
            [
                'title' => 'Müteahhitlik Hizmetleri',
                'short_description' => 'Anahtar teslim projeler için güvenilir müteahhitlik çözümleri.',
                'description' => 'Hatay İmar olarak, anahtar teslim projeleriniz için kapsamlı müteahhitlik hizmetleri sunuyoruz. Projenizin tasarımından başlayarak, inşaat sürecinin tamamlanmasına kadar her aşamada yanınızdayız.',
                'icon' => 'flaticon-contractor',
                'image' => 'services/service04.jpg',
                'service_category' => 'muteahhitlik',
                'features' => [
                    'Anahtar teslim projeler',
                    'Tasarım-yap modeli',
                    'İnşaat yönetimi',
                    'Alt yüklenici koordinasyonu',
                    'Garanti ve bakım hizmetleri'
                ],
                'benefits' => [
                    'Tek elden çözüm',
                    'Maliyet optimizasyonu',
                    'Hızlı proje teslimi',
                    'Garanti güvencesi'
                ],
                'status' => 'active',
                'sort_order' => 4,
                'is_featured' => false
            ],
            [
                'title' => 'Kentsel Dönüşüm',
                'short_description' => 'Güvenli ve modern yaşam alanları için kentsel dönüşüm projeleri.',
                'description' => 'Kentsel dönüşüm projelerinde uzman ekibimizle, eski ve riskli yapıları modern, güvenli ve yaşanabilir alanlara dönüştürüyoruz. Sosyal donatı alanları ve yeşil alanlarla desteklenen projeler geliştiriyoruz.',
                'icon' => 'flaticon-city',
                'image' => 'services/service05.jpg',
                'service_category' => 'kentsel-donusum',
                'features' => [
                    'Risk analizi ve değerlendirme',
                    'Proje geliştirme',
                    'Hak sahipleri ile koordinasyon',
                    'Yıkım ve yeniden inşa',
                    'Sosyal donatı alanları'
                ],
                'benefits' => [
                    'Deprem güvenliği',
                    'Modern yaşam alanları',
                    'Değer artışı',
                    'Sosyal yaşam kalitesi'
                ],
                'status' => 'active',
                'sort_order' => 5,
                'is_featured' => true
            ],
            [
                'title' => 'Danışmanlık Hizmetleri',
                'short_description' => 'İnşaat projeleriniz için profesyonel teknik danışmanlık.',
                'description' => 'İnşaat sektöründeki derin deneyimimizle, projelerinizin her aşamasında teknik danışmanlık hizmetleri sunuyoruz. Fizibilite çalışmalarından proje kontrolüne kadar geniş kapsamlı danışmanlık desteği sağlıyoruz.',
                'icon' => 'flaticon-consultation',
                'image' => 'services/service06.jpg',
                'service_category' => 'danismanlik',
                'features' => [
                    'Teknik danışmanlık',
                    'Fizibilite çalışmaları',
                    'Proje değerlendirme',
                    'Maliyet analizi',
                    'Yasal süreç danışmanlığı'
                ],
                'benefits' => [
                    'Uzman görüşü',
                    'Risk minimizasyonu',
                    'Maliyet tasarrufu',
                    'Doğru karar desteği'
                ],
                'status' => 'active',
                'sort_order' => 6,
                'is_featured' => false
            ]
        ];

        foreach ($services as $service) {
            Service::create($service);
        }
    }
} 