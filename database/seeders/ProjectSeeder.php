<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Project;

class ProjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $projects = [
            [
                'title' => 'İskenderun Kapalı Spor ve Yarı Olimpik Havuz Kompleksi',
                'short_description' => 'İskenderun\'da 8500 m² alanda modern spor tesisi projemiz.',
                'description' => 'İskenderun İSK Kapalı Spor ve Yarı Olimpik Yüzme Havuzu Kompleksi, şehrimizin spor altyapısını güçlendiren en büyük projelerimizden biridir.',
                'image' => 'projeler/isk-kapali-spor-ve-yari-olimpik/5.jpg',
                'gallery' => [
                    'projeler/isk-kapali-spor-ve-yari-olimpik/1.png',
                    'projeler/isk-kapali-spor-ve-yari-olimpik/2.png',
                    'projeler/isk-kapali-spor-ve-yari-olimpik/3.png',
                    'projeler/isk-kapali-spor-ve-yari-olimpik/4.jpg'
                ],
                'project_type' => 'Spor Tesisi',
                'status' => 'ongoing',
                'location' => 'İskenderun',
                'features' => [
                    '8500 m² kapalı alan',
                    'Yarı olimpik yüzme havuzu (25x12.5m, 6 kulvar)',
                    'Kapalı spor salonu (basketbol, voleybol)',
                    'Fitness merkezi ve kondisyon salonu',
                    'Cafe ve sosyal alanlar',
                    'Geniş otopark alanı',
                    'Engelli erişim imkanları'
                ],
                'is_featured' => true,
                'sort_order' => 1
            ],
            [
                'title' => 'Kırıkhan Külliye Projesi',
                'short_description' => 'Kırıkhan\'da 6500 m² alanda sosyal tesis kompleksi.',
                'description' => 'Kırıkhan Külliye Projesi, bölgenin sosyal ve kültürel ihtiyaçlarına cevap verecek kapsamlı bir tesis olarak tasarlanmıştır.',
                'image' => 'projeler/kirkhan-kulliye/K (9).jpg',
                'gallery' => [
                    'projeler/kirkhan-kulliye/K (1).jpg',
                    'projeler/kirkhan-kulliye/K (2).jpg',
                    'projeler/kirkhan-kulliye/K (4).jpg',
                    'projeler/kirkhan-kulliye/K (5).jpg'
                ],
                'project_type' => 'Sosyal Tesis',
                'status' => 'completed',
                'location' => 'Kırıkhan',
                'features' => [
                    '6500 m² toplam alan',
                    'Cami ve mescit alanları',
                    'Kültür merkezi',
                    'Çok amaçlı salon',
                    'Otopark alanı'
                ],
                'is_featured' => true,
                'sort_order' => 2
            ],
            [
                'title' => 'Sebze Hali Kompleksi',
                'short_description' => 'Antakya\'da 12000 m² alanda modern ticaret merkezi.',
                'description' => 'Antakya Sebze Hali Kompleksi, bölgenin en büyük sebze-meyve pazarlama merkezi olarak hizmet vermektedir.',
                'image' => 'projeler/sebze-hali/WhatsApp Image 2023-05-24 at 10.39.51 (1).jpeg',
                'gallery' => [
                    'projeler/sebze-hali/WhatsApp Image 2023-05-24 at 10.39.51 (2).jpeg',
                    'projeler/sebze-hali/WhatsApp Image 2023-05-24 at 10.39.51 (3).jpeg',
                    'projeler/sebze-hali/WhatsApp Image 2023-05-24 at 10.39.51 (4).jpeg'
                ],
                'project_type' => 'Ticaret Merkezi',
                'status' => 'completed',
                'location' => 'Antakya',
                'features' => [
                    '12000 m² kapalı alan',
                    '200 adet dükkan ve satış alanı',
                    'Soğuk hava depoları',
                    'Yükleme-boşaltma rampaları',
                    'Geniş araç park alanları',
                    'Modern güvenlik sistemi'
                ],
                'sort_order' => 3
            ],
            [
                'title' => 'Halısaha Kompleks Projeleri',
                'short_description' => 'Defne\'de 2800 m² alanda modern halısaha tesisi.',
                'description' => 'Modern halısaha kompleksi projesi, gençlerin ve sporseverlerin kaliteli spor yapabilecekleri bir tesis olarak tasarlanmaktadır.',
                'image' => 'projeler/halısaha-render/WhatsApp Image 2024-11-20 at 10.22.05.jpeg',
                'gallery' => [
                    'projeler/halısaha-render/k1.jpg',
                    'projeler/halısaha-render/k2.jpg',
                    'projeler/halısaha-render/k3.jpg'
                ],
                'project_type' => 'Spor Tesisi',
                'status' => 'planned',
                'location' => 'Defne',
                'features' => [
                    '2800 m² toplam alan',
                    'FIFA standartlarında halısaha',
                    'LED aydınlatma sistemi',
                    'Tribün ve izleyici alanları',
                    'Soyunma odaları ve duşlar',
                    'Cafe ve sosyal alanlar'
                ],
                'sort_order' => 4
            ],
            [
                'title' => 'Kreş Kompleksi',
                'short_description' => 'Kumlu\'da 3200 m² alanda modern eğitim tesisi.',
                'description' => 'Çocukların güvenli, sağlıklı ve eğitici bir ortamda büyümesini desteklemek amacıyla modern kreş kompleksi.',
                'image' => 'projeler/kres/KRES1 (1).jpg',
                'gallery' => [
                    'projeler/kres/KRES1 (2).jpg',
                    'projeler/kres/KRES1 (3).jpg',
                    'projeler/kres/KRES1 (4).jpg',
                    'projeler/kres/KRES1 (5).jpg'
                ],
                'project_type' => 'Eğitim Tesisi',
                'status' => 'ongoing',
                'location' => 'Kumlu',
                'features' => [
                    '3200 m² kapalı alan',
                    '4 adet sınıf',
                    'Yemekhane ve mutfak',
                    'Etkinlik odası',
                    'Uyku ve oyun alanları',
                    'Güvenli bahçe alanı'
                ],
                'sort_order' => 5
            ],
            [
                'title' => '200 Kişilik Yarı Olimpik Altınözü Havuzu',
                'short_description' => 'Altınözü\'nde 1500 m² alanda yarı olimpik yüzme havuzu.',
                'description' => '200 kişilik kapasiteye sahip modern yarı olimpik yüzme havuzu projesi.',
                'image' => 'projeler/200-kisilik-yari-olimpik-altinozu/c7eb5dec-3f13-4dcc-b11e-85daaa985401.jpg',
                'gallery' => [
                    'projeler/200-kisilik-yari-olimpik-altinozu/2bd7edf2-2c13-431a-87d7-f3353ef69697.jpg',
                    'projeler/200-kisilik-yari-olimpik-altinozu/4df76de5-e252-4c46-be9e-ddab23559426.jpg',
                    'projeler/200-kisilik-yari-olimpik-altinozu/dfc99099-3568-430c-af5e-d36439aabf6f.jpg'
                ],
                'project_type' => 'Spor Tesisi',
                'status' => 'ongoing',
                'location' => 'Altınözü',
                'features' => [
                    '1500 m² toplam alan',
                    '25x12,5 m yarı olimpik havuz',
                    '5 kulvar',
                    '200 kişilik tribün',
                    'Sağlık odası',
                    'İdari bina'
                ],
                'sort_order' => 6
            ],
            [
                'title' => 'Altınözü Gençlik Merkezi',
                'short_description' => 'Altınözü\'nde 4800 m² alanda gençlik merkezi projesi.',
                'description' => 'Gençlerin sosyal, kültürel ve sportif aktiviteler yapabileceği modern gençlik merkezi.',
                'image' => 'projeler/altınözü-gençlik-merkezi/GORSELLER/01.jpg',
                'gallery' => [
                    'projeler/altınözü-gençlik-merkezi/GORSELLER/02.jpg',
                    'projeler/altınözü-gençlik-merkezi/GORSELLER/03.jpg',
                    'projeler/altınözü-gençlik-merkezi/GORSELLER/04.jpg',
                    'projeler/altınözü-gençlik-merkezi/GORSELLER/05.jpg'
                ],
                'project_type' => 'Sosyal Tesis',
                'status' => 'planned',
                'location' => 'Altınözü',
                'features' => [
                    '4800 m² toplam alan',
                    'Kütüphane ve okuma salonları',
                    'Bilgisayar laboratuvarı',
                    'Spor salonu',
                    'Etkinlik ve toplantı salonları',
                    'Kafeterya'
                ],
                'sort_order' => 7
            ],
            [
                'title' => 'Çok Amaçlı Render Projesi',
                'short_description' => 'Hatay Merkez\'de 7800 m² alanda çok amaçlı tesis.',
                'description' => 'Düğün, nişan, toplantı ve sosyal etkinlikler için çok amaçlı modern tesis projesi.',
                'image' => 'projeler/cok-amacli-rendet/WhatsApp Image 2025-02-18 at 16.58.59.jpeg',
                'gallery' => [
                    'projeler/cok-amacli-rendet/CAS2 (1).jpg',
                    'projeler/cok-amacli-rendet/CAS2 (2).jpg',
                    'projeler/cok-amacli-rendet/CAS2 (3).jpg'
                ],
                'project_type' => 'Çok Amaçlı',
                'status' => 'planned',
                'location' => 'Hatay Merkez',
                'features' => [
                    '7800 m² toplam alan',
                    '1200 m² ana salon',
                    'Mutfak ve servis alanları',
                    'Kadın-erkek mescit',
                    'Muhtar odası',
                    'Otopark alanı'
                ],
                'sort_order' => 8
            ],
            [
                'title' => 'Samandağ Mızraklı Adak ve Taziye Evi',
                'short_description' => 'Samandağ\'da 960 m² alanda 240 kişilik taziye evi.',
                'description' => '2 katlı, 960 m²lik modern taziye ve adak evi projesi. Zemin katta taziye salonu, ikram alanları, birinci katta namazgah bulunmaktadır.',
                'image' => 'projeler/adak-taziye-evleri/mızrakli-adak-ve-taziye/RENDER/M_Photo - 1.jpg',
                'gallery' => [
                    'projeler/adak-taziye-evleri/mızrakli-adak-ve-taziye/RENDER/M_Photo - 3.jpg',
                    'projeler/adak-taziye-evleri/mızrakli-adak-ve-taziye/RENDER/M_Photo - 6.jpg',
                    'projeler/adak-taziye-evleri/mızrakli-adak-ve-taziye/RENDER/M_Photo - 8.jpg'
                ],
                'project_type' => 'Sosyal Tesis',
                'status' => 'ongoing',
                'location' => 'Samandağ',
                'features' => [
                    '960 m² toplam alan',
                    '240 kişi kapasiteli',
                    'Taziye salonu',
                    'Aş ikram terası',
                    'Namazgah salonu',
                    'Adak/kurbanlık kesimhane'
                ],
                'is_featured' => true,
                'sort_order' => 9
            ]
        ];

        foreach ($projects as $project) {
            Project::create($project);
        }
    }
} 