<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProjectController extends Controller
{
    public function index()
    {
        // Projeler listesi
        $projects = [
            [
                'id' => 1,
                'title' => 'İskenderun Kapalı Spor ve Yarı Olimpik Havuz Kompleksi',
                'location' => 'İskenderun',
                'status' => 'Devam Ediyor',
                'type' => 'Spor Tesisi',
                'area' => '8500 m²',
                'image' => 'assets/images/projeler/isk-kapali-spor-ve-yari-olimpik/1.png'
            ],
            [
                'id' => 2, 
                'title' => 'Sebze Hali Kompleksi',
                'location' => 'Antakya',
                'status' => 'Tamamlandı',
                'type' => 'Ticaret Merkezi',
                'area' => '12000 m²',
                'image' => 'assets/images/projeler/sebze-hali/WhatsApp Image 2023-05-24 at 10.39.51 (1).jpeg'
            ],
            [
                'id' => 3,
                'title' => 'Halısaha Kompleks Projeleri',
                'location' => 'Defne',
                'status' => 'Tasarım',
                'type' => 'Spor Tesisi',
                'area' => '2800 m²',
                'image' => 'assets/images/projeler/halısaha-render/k1.jpg'
            ],
            [
                'id' => 4,
                'title' => 'Kırıkhan Külliye Projesi',
                'location' => 'Kırıkhan',
                'status' => 'Tamamlandı',
                'type' => 'Sosyal Tesis',
                'area' => '6500 m²',
                'image' => 'assets/images/projeler/kirkhan-kulliye/K (1).jpg'
            ],
            [
                'id' => 5,
                'title' => 'Kreş Kompleksi',
                'location' => 'Kumlu',
                'status' => 'Devam Ediyor',
                'type' => 'Eğitim Tesisi',
                'area' => '3200 m²',
                'image' => 'assets/images/projeler/kres/KRES1 (1).jpg'
            ],
            [
                'id' => 6,
                'title' => '200 Kişilik Yarı Olimpik Altınözü Havuzu',
                'location' => 'Altınözü',
                'status' => 'Devam Ediyor',
                'type' => 'Spor Tesisi',
                'area' => '1500 m²',
                'image' => 'assets/images/projeler/200-kisilik-yari-olimpik-altinozu/c7eb5dec-3f13-4dcc-b11e-85daaa985401.jpg'
            ],
            [
                'id' => 7,
                'title' => 'Altınözü Gençlik Merkezi',
                'location' => 'Altınözü',
                'status' => 'Tasarım',
                'type' => 'Sosyal Tesis',
                'area' => '4800 m²',
                'image' => 'assets/images/projeler/altınözü-gençlik-merkezi/GORSELLER/01.jpg'
            ],
            [
                'id' => 8,
                'title' => 'Arsuz Gülcihan Spor Tesisi',
                'location' => 'Arsuz',
                'status' => 'Planlanan',
                'type' => 'Spor Tesisi', 
                'area' => '5200 m²',
                'image' => 'assets/images/projeler/arsuz-gulcihan-spor-tesis/1.png'
            ],
            [
                'id' => 9,
                'title' => 'Çok Amaçlı Render Projesi',
                'location' => 'Hatay Merkez',
                'status' => 'Tasarım',
                'type' => 'Çok Amaçlı',
                'area' => '7800 m²',
                'image' => 'assets/images/projeler/cok-amacli-rendet/WhatsApp Image 2025-02-18 at 16.58.59.jpeg'
            ],
            [
                'id' => 10,
                'title' => 'Dörtyol 1500 Spor Kompleksi',
                'location' => 'Dörtyol',
                'status' => 'Devam Ediyor',
                'type' => 'Spor Tesisi',
                'area' => '9200 m²',
                'image' => 'assets/images/projeler/dortyol-1500-spor-kompleksi/d1.jpeg'
            ],
            [
                'id' => 11,
                'title' => 'Fizyoterapi Render Projesi',
                'location' => 'Antakya',
                'status' => 'Tasarım',
                'type' => 'Sağlık Tesisi',
                'area' => '1800 m²',
                'image' => 'assets/images/projeler/fizyoterapi-render/f1.jpg'
            ],
            
            [
                'id' => 13,
                'title' => 'Samandağ Mızraklı Adak ve Taziye Evi',
                'location' => 'Samandağ',
                'status' => 'Temel Atıldı',
                'type' => 'Sosyal Tesis',
                'area' => '960 m²',
                'image' => 'assets/images/projeler/adak-taziye-evleri/mızrakli-adak-ve-taziye/RENDER/M_Photo - 1.jpg'
            ],
            [
                'id' => 14,
                'title' => 'Kırıkhan Butik Yarı Olimpik Yüzme Havuzu',
                'location' => 'Kırıkhan',
                'status' => 'Devam Ediyor',
                'type' => 'Spor Tesisi',
                'area' => '1500 m²',
                'image' => 'assets/images/projeler/kirkhan-kulliye/K (8)-.jpg'
            ],
           
            [
                'id' => 16,
                'title' => 'Yayladağı Halısaha Kompleksi',
                'location' => 'Yayladağı',
                'status' => 'Planlanan',
                'type' => 'Spor Tesisi',
                'area' => '3500 m²',
                'image' => 'assets/images/projeler/halısaha-render/k2.jpg'
            ]
        ];

        return view('projects.index', compact('projects'));
    }

    public function details($id)
    {
        // Proje detayları
        $projects = [
            1 => [
                'id' => 1,
                'title' => 'İSK Kapalı Spor ve Yarı Olimpik Havuz Kompleksi',
                'location' => 'İskenderun',
                'status' => 'Devam Ediyor',
                'type' => 'Spor Tesisi',
                'category' => 'Spor ve Rekreasyon',
                'area' => '8500 m²',
                'capacity' => '500 kişi',
                'description' => 'İskenderun İSK Kapalı Spor ve Yarı Olimpik Yüzme Havuzu Kompleksi, şehrimizin spor altyapısını güçlendiren en büyük projelerimizden biridir.',
                'features' => [
                    'Yarı olimpik yüzme havuzu (25x12.5m, 6 kulvar)',
                    'Kapalı spor salonu (basketbol, voleybol)',
                    'Fitness merkezi ve kondisyon salonu',
                    'Cafe ve sosyal alanlar',
                    'Geniş otopark alanı',
                    'Engelli erişim imkanları'
                ],
                'timeline' => [
                    'Proje Başlangıcı: Ocak 2024',
                    'Temel Atma: Mart 2024',
                    'Kaba İnşaat: Mayıs 2024 - Devam Ediyor',
                    'İç Dekorasyon: Eylül 2024 (Planlanan)',
                    'Açılış: Aralık 2024 (Planlanan)'
                ],
                'images' => [
                    'assets/images/projeler/isk-kapali-spor-ve-yari-olimpik/1.png',
                    'assets/images/projeler/isk-kapali-spor-ve-yari-olimpik/2.png',
                    'assets/images/projeler/isk-kapali-spor-ve-yari-olimpik/3.png',
                    'assets/images/projeler/isk-kapali-spor-ve-yari-olimpik/4.png'
                ]
            ],
            2 => [
                'id' => 2,
                'title' => 'Sebze Hali Kompleksi',
                'location' => 'Antakya',
                'status' => 'Tamamlandı',
                'type' => 'Ticaret Merkezi',
                'category' => 'Ticaret ve Ekonomi',
                'area' => '12000 m²',
                'capacity' => '200 dükkan',
                'description' => 'Antakya Sebze Hali Kompleksi, bölgenin en büyük sebze-meyve pazarlama merkezi olarak hizmet vermektedir.',
                'features' => [
                    '200 adet dükkan ve satış alanı',
                    'Soğuk hava depoları',
                    'Yükleme-boşaltma rampaları',
                    'Geniş araç park alanları',
                    'Modern güvenlik sistemi',
                    'İdari bina ve ofisler'
                ],
                'timeline' => [
                    'Proje Başlangıcı: Haziran 2022',
                    'Temel Atma: Ağustos 2022',
                    'Kaba İnşaat: Aralık 2022',
                    'İç Dekorasyon: Mart 2023',
                    'Açılış: Mayıs 2023'
                ],
                'images' => [
                    'assets/images/projeler/sebze-hali/WhatsApp Image 2023-05-24 at 10.39.51 (1).jpeg',
                    'assets/images/projeler/sebze-hali/WhatsApp Image 2023-05-24 at 10.39.51 (2).jpeg',
                    'assets/images/projeler/sebze-hali/WhatsApp Image 2023-05-24 at 10.39.51 (3).jpeg'
                ]
            ],
            3 => [
                'id' => 3,
                'title' => 'Halısaha Render Projesi',
                'location' => 'Defne',
                'status' => 'Tasarım',
                'type' => 'Spor Tesisi',
                'category' => 'Spor ve Rekreasyon',
                'area' => '2800 m²',
                'capacity' => '22 sporcu + 200 izleyici',
                'description' => 'Modern halısaha kompleksi projesi, gençlerin ve sporseverlerin kaliteli spor yapabilecekleri bir tesis olarak tasarlanmaktadır.',
                'features' => [
                    'FIFA standartlarında halısaha',
                    'LED aydınlatma sistemi',
                    'Tribün ve izleyici alanları',
                    'Soyunma odaları ve duşlar',
                    'Cafe ve sosyal alanlar',
                    'Otopark alanı'
                ],
                'timeline' => [
                    'Proje Tasarımı: Ocak 2024',
                    'Ruhsat İşlemleri: Mart 2024',
                    'İnşaat Başlangıcı: Haziran 2024 (Planlanan)',
                    'Tamamlanma: Ekim 2024 (Planlanan)'
                ],
                'images' => [
                    'assets/images/projeler/halısaha-render/k1.jpg',
                    'assets/images/projeler/halısaha-render/k2.jpg',
                    'assets/images/projeler/halısaha-render/k3.jpg'
                ]
            ],
            4 => [
                'id' => 4,
                'title' => 'Kırıkhan Külliye Projesi',
                'location' => 'Kırıkhan',
                'status' => 'Tamamlandı',
                'type' => 'Sosyal Tesis',
                'category' => 'Sosyal ve Kültürel',
                'area' => '6500 m²',
                'capacity' => '1000 kişi',
                'description' => 'Kırıkhan Külliye Projesi, bölgenin sosyal ve kültürel ihtiyaçlarını karşılayan çok amaçlı bir kompleks olarak hizmete sunulmuştur.',
                'features' => [
                    'Çok amaçlı salon (nikah, düğün, konferans)',
                    'İbadet alanları',
                    'Kursane ve eğitim sınıfları',
                    'Kütüphane ve okuma salonu',
                    'Cafe ve dinlenme alanları',
                    'Geniş bahçe ve yeşil alanlar'
                ],
                'timeline' => [
                    'Proje Başlangıcı: Eylül 2021',
                    'Temel Atma: Kasım 2021',
                    'Kaba İnşaat: Nisan 2022',
                    'İç Dekorasyon: Ağustos 2022',
                    'Açılış: Ekim 2022'
                ],
                'images' => [
                    'assets/images/projeler/kirkhan-kulliye/K (1).jpg',
                    'assets/images/projeler/kirkhan-kulliye/K (2).jpg',
                    'assets/images/projeler/kirkhan-kulliye/K (3).jpg',
                    'assets/images/projeler/kirkhan-kulliye/K (4).jpg'
                ]
            ],
            5 => [
                'id' => 5,
                'title' => 'Kreş Kompleksi',
                'location' => 'Kumlu',
                'status' => 'Devam Ediyor',
                'type' => 'Eğitim Tesisi',
                'category' => 'Eğitim ve Sosyal',
                'area' => '3200 m²',
                'capacity' => '200 çocuk',
                'description' => 'Kumlu ilçesinde inşa edilen modern kreş kompleksi, çocukların güvenli ve eğitici bir ortamda büyümeleri için tasarlanmaktadır.',
                'features' => [
                    '12 adet sınıf (yaş gruplarına göre)',
                    'Oyun alanları ve bahçe',
                    'Yemek salonu ve mutfak',
                    'Uyku odaları',
                    'Sağlık odası',
                    'Güvenlik kamera sistemi'
                ],
                'timeline' => [
                    'Proje Başlangıcı: Kasım 2023',
                    'Temel Atma: Ocak 2024',
                    'Kaba İnşaat: Mart 2024 - Devam Ediyor',
                    'İç Dekorasyon: Ağustos 2024 (Planlanan)',
                    'Açılış: Ekim 2024 (Planlanan)'
                ],
                'images' => [
                    'assets/images/projeler/kres/KRES1 (1).jpg',
                    'assets/images/projeler/kres/KRES1 (2).jpg',
                    'assets/images/projeler/kres/KRES1 (3).jpg'
                ]
            ],
            6 => [
                'id' => 6,
                'title' => '200 Kişilik Yarı Olimpik Altınözü Havuzu',
                'location' => 'Altınözü',
                'status' => 'Devam Ediyor',
                'type' => 'Spor Tesisi',
                'category' => 'Spor ve Rekreasyon',
                'area' => '1500 m²',
                'capacity' => '200 kişi',
                'description' => 'Altınözü ilçesinin ilk yarı olimpik yüzme havuzu projesi, bölgenin spor turizmini destekleyecek modern bir tesis olarak inşa edilmektedir.',
                'features' => [
                    'Yarı olimpik yüzme havuzu (25x12.5m, 5 kulvar)',
                    'Çocuk havuzu',
                    'Soyunma odaları ve duşlar',
                    'Tribün alanı (200 kişi)',
                    'Cafe ve sosyal alanlar',
                    'Otopark alanı'
                ],
                'timeline' => [
                    'Proje Başlangıcı: Aralık 2023',
                    'Temel Atma: Şubat 2024',
                    'Havuz İnşaatı: Nisan 2024 - Devam Ediyor',
                    'Sistem Kurulumu: Temmuz 2024 (Planlanan)',
                    'Açılış: Eylül 2024 (Planlanan)'
                ],
                'images' => [
                    'assets/images/projeler/200-kisilik-yari-olimpik-altinozu/c7eb5dec-3f13-4dcc-b11e-85daaa985401.jpg',
                    'assets/images/projeler/200-kisilik-yari-olimpik-altinozu/WhatsApp Image 2025-02-18 at 16.52.10 (1).jpeg',
                    'assets/images/projeler/200-kisilik-yari-olimpik-altinozu/WhatsApp Image 2025-02-18 at 16.52.10 (2).jpeg'
                ]
            ],
            7 => [
                'id' => 7,
                'title' => 'Altınözü Gençlik Merkezi',
                'location' => 'Altınözü',
                'status' => 'Tasarım',
                'type' => 'Sosyal Tesis',
                'category' => 'Gençlik ve Sosyal',
                'area' => '4800 m²',
                'capacity' => '300 kişi',
                'description' => 'Altınözü Gençlik Merkezi, gençlerin sosyal, kültürel ve sportif faaliyetlerini gerçekleştirebilecekleri modern bir kompleks olarak tasarlanmaktadır.',
                'features' => [
                    'Çok amaçlı spor salonu',
                    'Kursane ve atölye alanları',
                    'İnternet cafe ve oyun alanları',
                    'Kütüphane ve çalışma alanları',
                    'Konferans salonu',
                    'Cafe ve sosyal alanlar'
                ],
                'timeline' => [
                    'Proje Tasarımı: Şubat 2024',
                    'Ruhsat İşlemleri: Mayıs 2024 (Planlanan)',
                    'İnşaat Başlangıcı: Ağustos 2024 (Planlanan)',
                    'Tamamlanma: Mart 2025 (Planlanan)'
                ],
                'images' => [
                    'assets/images/projeler/altınözü-gençlik-merkezi/A1.png'
                ]
            ],
            8 => [
                'id' => 8,
                'title' => 'Arsuz Gülcihan Spor Tesisi',
                'location' => 'Arsuz',
                'status' => 'Planlanan',
                'type' => 'Spor Tesisi',
                'category' => 'Spor ve Rekreasyon',
                'area' => '5200 m²',
                'capacity' => '400 kişi',
                'description' => 'Arsuz Gülcihan bölgesinde planlanmakta olan modern spor tesisi, bölgenin spor altyapısını güçlendirecek kapsamlı bir proje olarak hazırlanmaktadır.',
                'features' => [
                    'Kapalı spor salonu (basketbol, voleybol)',
                    'Fitness merkezi',
                    'Halısaha',
                    'Yürüyüş ve koşu parkuru',
                    'Tribün alanları',
                    'Sosyal tesisler'
                ],
                'timeline' => [
                    'Proje Planlama: Mart 2024',
                    'Ruhsat İşlemleri: Haziran 2024 (Planlanan)',
                    'İnşaat Başlangıcı: Ekim 2024 (Planlanan)',
                    'Tamamlanma: Haziran 2025 (Planlanan)'
                ],
                'images' => [
                    'assets/images/projeler/arsuz-gulcihan-spor-tesis/WhatsApp Image 2025-02-18 at 17.04.58.jpeg'
                ]
            ],
            9 => [
                'id' => 9,
                'title' => 'Çok Amaçlı Render Projesi',
                'location' => 'Hatay Merkez',
                'status' => 'Tasarım',
                'type' => 'Çok Amaçlı',
                'category' => 'Karma Kullanım',
                'area' => '7800 m²',
                'capacity' => '500 kişi',
                'description' => 'Hatay merkezde tasarlanan çok amaçlı kompleks, ticaret, kültür ve sosyal faaliyetleri bir arada barındıran modern bir yapı olarak planlanmaktadır.',
                'features' => [
                    'Alışveriş merkezi',
                    'Sinema salonu',
                    'Restoran ve cafe alanları',
                    'Ofis bölümleri',
                    'Konferans salonları',
                    'Çok katlı otopark'
                ],
                'timeline' => [
                    'Proje Tasarımı: Ocak 2024',
                    'Ruhsat İşlemleri: Mayıs 2024 (Planlanan)',
                    'İnşaat Başlangıcı: Eylül 2024 (Planlanan)',
                    'Tamamlanma: Eylül 2025 (Planlanan)'
                ],
                'images' => [
                    'assets/images/projeler/cok-amacli-rendet/WhatsApp Image 2025-02-18 at 16.58.59.jpeg',
                    'assets/images/projeler/cok-amacli-rendet/WhatsApp Image 2025-02-18 at 16.59.05.jpeg'
                ]
            ],
            10 => [
                'id' => 10,
                'title' => 'Dörtyol 1500 Spor Kompleksi',
                'location' => 'Dörtyol',
                'status' => 'Devam Ediyor',
                'type' => 'Spor Tesisi',
                'category' => 'Spor ve Rekreasyon',
                'area' => '9200 m²',
                'capacity' => '1500 kişi',
                'description' => 'Dörtyol ilçesinin en büyük spor kompleksi projesi, 1500 kişi kapasiteli modern bir tesis olarak inşa edilmektedir.',
                'features' => [
                    'Ana stadyum (1500 kişi kapasiteli)',
                    'Atletizm pisti',
                    'Futbol sahası (doğal çim)',
                    'Sporcular için antrenman alanları',
                    'İdari bina ve ofisler',
                    'Geniş otopark alanı'
                ],
                'timeline' => [
                    'Proje Başlangıcı: Temmuz 2023',
                    'Temel Atma: Eylül 2023',
                    'Stadyum İnşaatı: Aralık 2023 - Devam Ediyor',
                    'Çim Serimi: Ağustos 2024 (Planlanan)',
                    'Açılış: Ekim 2024 (Planlanan)'
                ],
                'images' => [
                    'assets/images/projeler/dortyol-1500-spor-kompleksi/d1.jpg'
                ]
            ],
            11 => [
                'id' => 11,
                'title' => 'Fizyoterapi Render Projesi',
                'location' => 'Antakya',
                'status' => 'Tasarım',
                'type' => 'Sağlık Tesisi',
                'category' => 'Sağlık ve Rehabilitasyon',
                'area' => '1800 m²',
                'capacity' => '100 hasta/gün',
                'description' => 'Modern fizyoterapi ve rehabilitasyon merkezi, hastalarımızın en iyi şartlarda tedavi görebilmeleri için tasarlanmaktadır.',
                'features' => [
                    'Fizyoterapi seansları için özel odalar',
                    'Hidroterapi havuzu',
                    'Jimnastik ve egzersiz salonları',
                    'Masaj ve manuel tedavi alanları',
                    'Bekleme ve danışma alanları',
                    'Modern tıbbi ekipman'
                ],
                'timeline' => [
                    'Proje Tasarımı: Şubat 2024',
                    'Ruhsat İşlemleri: Haziran 2024 (Planlanan)',
                    'İnşaat Başlangıcı: Ağustos 2024 (Planlanan)',
                    'Tamamlanma: Şubat 2025 (Planlanan)'
                ],
                'images' => [
                    'assets/images/projeler/fizyoterapi-render/f1.jpg'
                ]
            ],
            12 => [
                'id' => 12,
                'title' => 'Gökmeydan Adak ve Taziye Evi',
                'location' => 'Samandağ',
                'status' => 'Tamamlandı',
                'type' => 'Sosyal Tesis',
                'category' => 'Sosyal ve Kültürel',
                'area' => '800 m²',
                'capacity' => '300 kişi',
                'description' => 'Samandağ Gökmeydan bölgesinde tamamlanan adak ve taziye evi, halkımızın sosyal ihtiyaçlarını karşılayan modern bir tesis olarak hizmete açılmıştır.',
                'features' => [
                    'Ana salon (300 kişi kapasiteli)',
                    'Mutfak ve yemek hazırlama alanı',
                    'Abdest alma yerleri',
                    'Otopark alanı',
                    'Bahçe ve yeşil alanlar',
                    'Engelli erişim rampaları'
                ],
                'timeline' => [
                    'Proje Başlangıcı: Mayıs 2022',
                    'Temel Atma: Temmuz 2022',
                    'Kaba İnşaat: Ekim 2022',
                    'İç Dekorasyon: Aralık 2022',
                    'Açılış: Ocak 2023'
                ],
                'images' => [
                    'assets/images/projeler/adak-taziye-evleri/gökmeydan-adak-ve-taziye/RENDER/G_Photo - 1.jpg'
                ]
            ],
            13 => [
                'id' => 13,
                'title' => 'Samandağ Mızraklı Adak ve Taziye Evi',
                'location' => 'Samandağ',
                'status' => 'Temel Atıldı',
                'type' => 'Sosyal Tesis',
                'category' => 'Sosyal ve Kültürel',
                'area' => '960 m²',
                'capacity' => '240 kişi',
                'description' => 'Samandağ Mızraklı bölgesinde inşa edilmekte olan adak ve taziye evi, 2 katlı modern mimarisi ile dikkat çeken bir projedir.',
                'features' => [
                    '2 katlı yapı (240 kişi kapasiteli)',
                    'Geniş ana salon',
                    'Modern mutfak donanımları',
                    'Abdest alma ve temizlik alanları',
                    'Bahçe düzenlemesi',
                    'Araç park alanı'
                ],
                'timeline' => [
                    'Proje Başlangıcı: Ekim 2023',
                    'Temel Atma: Aralık 2023',
                    'Kaba İnşaat: Şubat 2024 - Devam Ediyor',
                    'İç Dekorasyon: Haziran 2024 (Planlanan)',
                    'Açılış: Ağustos 2024 (Planlanan)'
                ],
                'images' => [
                    'assets/images/projeler/adak-taziye-evleri/mızrakli-adak-ve-taziye/RENDER/M_Photo - 1.jpg'
                ]
            ],
            14 => [
                'id' => 14,
                'title' => 'Kırıkhan Butik Yarı Olimpik Yüzme Havuzu',
                'location' => 'Kırıkhan',
                'status' => 'Devam Ediyor',
                'type' => 'Spor Tesisi',
                'category' => 'Spor ve Rekreasyon',
                'area' => '1500 m²',
                'capacity' => '200 kişi',
                'description' => 'Kırıkhan ilçesinde inşa edilmekte olan butik yarı olimpik yüzme havuzu, 25x12,5 metre ölçülerinde 5 kulvarlı modern bir tesistir.',
                'features' => [
                    'Yarı olimpik yüzme havuzu (25x12.5m, 5 kulvar)',
                    'Butik tasarım ve modern mimarı',
                    'Soyunma odaları ve duşlar',
                    'Cafe ve dinlenme alanları',
                    'İzleyici tribünü (200 kişi)',
                    'Otopark alanı'
                ],
                'timeline' => [
                    'Proje Başlangıcı: Eylül 2023',
                    'Temel Atma: Kasım 2023',
                    'Havuz İnşaatı: Ocak 2024 - Devam Ediyor',
                    'Sistem Kurulumu: Mayıs 2024 (Planlanan)',
                    'Açılış: Temmuz 2024 (Planlanan)'
                ],
                'images' => [
                    'assets/images/projeler/kirkhan-kulliye/K (8).jpg',
                    'assets/images/projeler/kirkhan-kulliye/K (5).jpg',
                    'assets/images/projeler/kirkhan-kulliye/K (6).jpg'
                ]
            ],
            15 => [
                'id' => 15,
                'title' => 'Belen Bedesten Meydan Projesi',
                'location' => 'Belen',
                'status' => 'Devam Ediyor',
                'type' => 'Ticaret Merkezi',
                'category' => 'Ticaret ve Kültür',
                'area' => '2500 m²',
                'capacity' => '15 bölüm',
                'description' => 'Belen ilçesinde geleneksel bedesten mimarisinden ilham alınarak tasarlanan modern ticaret merkezi projesi.',
                'features' => [
                    '15 farklı ticaret bölümü',
                    'Geleneksel bedesten mimarisi',
                    'Merkezi meydan alanı',
                    'Cafe ve restoran bölümü',
                    'Kültürel etkinlik alanları',
                    'Otopark ve ulaşım kolaylığı'
                ],
                'timeline' => [
                    'Proje Başlangıcı: Kasım 2023',
                    'Temel Atma: Ocak 2024',
                    'Kaba İnşaat: Mart 2024 - Devam Ediyor',
                    'İç Dekorasyon: Haziran 2024 (Planlanan)',
                    'Açılış: Ağustos 2024 (Planlanan)'
                ],
                'images' => [
                    'assets/images/projeler/cok-amacli-rendet/WhatsApp Image 2025-02-18 at 16.59.05.jpeg'
                ]
            ],
            16 => [
                'id' => 16,
                'title' => 'Yayladağı Halısaha Kompleksi',
                'location' => 'Yayladağı',
                'status' => 'Planlanan',
                'type' => 'Spor Tesisi',
                'category' => 'Spor ve Rekreasyon',
                'area' => '3500 m²',
                'capacity' => '150 kişi',
                'description' => 'Yayladağı ilçesinde planlanmakta olan halısaha kompleksi, bölgenin gençlik ve spor faaliyetlerini destekleyecek modern bir proje olarak hazırlanmaktadır.',
                'features' => [
                    'FIFA standartlarında halısaha',
                    'Tribün alanı (150 kişi)',
                    'Soyunma odaları ve duşlar',
                    'Antrenman alanları',
                    'Çay ocağı ve sosyal alanlar',
                    'Otopark ve çevre düzenlemesi'
                ],
                'timeline' => [
                    'Proje Planlama: Mart 2024',
                    'Ruhsat İşlemleri: Temmuz 2024 (Planlanan)',
                    'İnşaat Başlangıcı: Ekim 2024 (Planlanan)',
                    'Tamamlanma: Mart 2025 (Planlanan)'
                ],
                'images' => [
                    'assets/images/projeler/halısaha-render/k2.jpg'
                ]
            ]
        ];

        $project = $projects[$id] ?? null;
        
        if (!$project) {
            abort(404);
        }

        return view('projects.details', compact('project'));
    }
} 