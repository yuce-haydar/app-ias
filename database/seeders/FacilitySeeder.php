<?php

namespace Database\Seeders;

use App\Models\Facility;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class FacilitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $facilities = [
            [
                'name' => 'Büz Üretim Tesisi',
                'slug' => 'buz-uretim-tesisi',
                'short_description' => 'Büz, Beton Boru (künk) gibi isimlerle anılan ürünlerimiz milimetre cinsinden iç çap genişlikleri ile adlandırılan...',
                'description' => 'Büz, Beton Boru (künk) gibi isimlerle anılan ürünlerimiz milimetre cinsinden iç çap genişlikleri ile adlandırılan betonarme alt yapı elemanlarıdır. Yol, su, kanalizasyon, sulama ve drenaj gibi sahalarda kullanılmaktadır. Hatay İmar A.Ş. tesisimizde imal edilen Büz ve beton borular uluslararası standartlara uygun üretilmektedir.

Üretim tesisimizde modern teknoloji ile donatılmış makineler ve deneyimli personelimizle yıllık 50.000 ton üretim kapasitesine sahibiz. Ürünlerimiz TS EN 1916 standardına uygun olarak üretilmekte ve sürekli kalite kontrol testlerinden geçirilmektedir.

Çeşitli çap ve boyutlarda üretilen büzlerimiz, şehrimizin altyapı projelerinde güvenle kullanılmaktadır. Ayrıca çevre illerin altyapı ihtiyaçlarına da cevap vermekteyiz.',
                'facility_type' => 'production',
                'category' => 'Üretim Tesisi',
                'status' => 'active',
                'opening_date' => '2010-01-01',
                'capacity' => '50.000 ton/yıl',
                'features' => [
                    'Modern üretim teknolojisi',
                    'TS EN 1916 standardına uygun üretim',
                    'Çeşitli çap ve boyutlarda üretim',
                    'Kalite kontrol laboratuvarı',
                    'Deneyimli teknik kadro',
                    'Geniş depolama alanı'
                ],
                'working_hours' => [
                    'Pazartesi-Cuma' => '08:00-17:00',
                    'Cumartesi' => '08:00-13:00',
                    'Pazar' => 'Kapalı'
                ],
                'address' => 'Organize Sanayi Bölgesi, Hatay',
                'phone' => '+90 326 285 XX XX',
                'email' => 'uretim@hatayimar.com',
                'image' => 'tesisler/b1.jpg',
                'gallery' => [
                    'tesisler/Büz-Üretim-Tesisi.jpg',
                    'tesisler/b1.jpg'
                ],
                'latitude' => 36.2027,
                'longitude' => 36.1621,
                'sort_order' => 1,
                'is_featured' => true,
                'icon' => 'factory'
            ],
            [
                'name' => 'Katlı Otopark',
                'slug' => 'katli-otopark',
                'short_description' => '2005 yılında şehir merkezinde faaliyete geçen Katlı Otopark, şehrimizde yoğun trafikten araçlarına park yeri bulamayan...',
                'description' => '2005 yılında şehir merkezinde faaliyete geçen Katlı Otopark, şehrimizde yoğun trafikten araçlarına park yeri bulamayan vatandaşlarımıza güvenli park hizmeti sunmaktadır. 5 katlı olarak inşa edilen tesisimiz, 350 araç kapasitesi ile hizmet vermektedir.

Tesisimizde 24 saat güvenlik kamera sistemi, yangın söndürme sistemi ve modern ödeme sistemleri bulunmaktadır. Şehir merkezindeki konumu ile alışveriş merkezlerine, resmi kurumlara ve ticari alanlara yakın mesafededir.

Otopark içerisinde engelli park yerleri, elektrikli araç şarj istasyonları ve vale hizmeti de sunulmaktadır. Ayrıca tesisimizde araç yıkama ve detaylı temizlik hizmetleri de verilmektedir.',
                'facility_type' => 'service',
                'category' => 'Hizmet Tesisi',
                'status' => 'active',
                'opening_date' => '2005-06-15',
                'capacity' => '350 araç',
                'features' => [
                    '5 katlı modern yapı',
                    '24 saat güvenlik sistemi',
                    'Yangın söndürme sistemi',
                    'Engelli park yerleri',
                    'Elektrikli araç şarj istasyonu',
                    'Vale hizmeti',
                    'Araç yıkama hizmeti'
                ],
                'working_hours' => [
                    'Her gün' => '00:00-24:00'
                ],
                'address' => 'Cumhuriyet Meydanı, Antakya/Hatay',
                'phone' => '+90 326 214 XX XX',
                'email' => 'otopark@hatayimar.com',
                'image' => 'tesisler/katlı-otopark.jpg',
                'gallery' => [
                    'tesisler/katlı-otopark.jpg'
                ],
                'latitude' => 36.2065,
                'longitude' => 36.1590,
                'sort_order' => 2,
                'is_featured' => true,
                'icon' => 'parking'
            ],
            [
                'name' => 'Habib-i Neccar Sosyal Tesisi',
                'slug' => 'habib-i-neccar-sosyal-tesisi',
                'short_description' => '2013 yılında faaliyete açıldı. Habib-i Neccar Dağı Eteklerinde İzmir Caddesi\'nde, Antakyalıların ailece ziyaret edebilecekleri...',
                'description' => '2013 yılında faaliyete açılan Habib-i Neccar Sosyal Tesisi, Habib-i Neccar Dağı eteklerinde, İzmir Caddesi üzerinde konumlanmıştır. Antakyalıların ailece ziyaret edebilecekleri, doğa ile iç içe huzurlu bir ortam sunmaktadır.

Tesisimizde açık ve kapalı oturma alanları, çocuk oyun parkı, yürüyüş yolları ve mescit bulunmaktadır. 500 kişi kapasiteli tesisimizde düğün, nişan, toplantı ve özel organizasyonlar için salon hizmeti verilmektedir.

Antakya mutfağının en güzel örneklerinin sunulduğu restoranımızda, geleneksel lezzetler modern sunum teknikleriyle birleştirilmektedir. Ayrıca tesisimizde canlı müzik geceleri ve kültürel etkinlikler düzenlenmektedir.',
                'facility_type' => 'social',
                'category' => 'Sosyal Tesis',
                'status' => 'active',
                'opening_date' => '2013-05-01',
                'capacity' => '500 kişi',
                'features' => [
                    'Açık ve kapalı oturma alanları',
                    'Çocuk oyun parkı',
                    'Yürüyüş yolları',
                    'Mescit',
                    'Organizasyon salonu',
                    'Antakya mutfağı',
                    'Canlı müzik',
                    'Otopark'
                ],
                'working_hours' => [
                    'Her gün' => '08:00-24:00'
                ],
                'address' => 'İzmir Caddesi, Habib-i Neccar Dağı Etekleri, Antakya/Hatay',
                'phone' => '+90 326 225 XX XX',
                'email' => 'habibineccar@hatayimar.com',
                'google_maps_link' => 'https://maps.google.com/?q=36.2150,36.1750',
                'image' => 'tesisler/hatay3.jpeg',
                'gallery' => [
                    'tesisler/habibineccar.png',
                    'tesisler/hatay3.jpeg'
                ],
                'latitude' => 36.2150,
                'longitude' => 36.1750,
                'sort_order' => 3,
                'is_featured' => true,
                'icon' => 'mountain'
            ],
            [
                'name' => 'Defne Gastronomi Evi',
                'slug' => 'defne-gastronomi-evi',
                'short_description' => 'Defne ilçemizde hizmete açılan Gastronomi Evimiz, Hatay mutfağının zengin lezzetlerini modern bir ortamda sunmaktadır.',
                'description' => 'Defne Gastronomi Evi, Hatay\'ın eşsiz mutfak kültürünü yaşatmak ve gelecek nesillere aktarmak amacıyla kurulmuştur. Modern mimarisi ve geleneksel dokunuşlarıyla dikkat çeken tesisimiz, 300 kişi kapasiteli salonu ile hizmet vermektedir.

Tesisimizde yöresel yemek kursları, gastronomi atölyeleri ve özel tadım etkinlikleri düzenlenmektedir. Uzman aşçılarımız eşliğinde Hatay mutfağının inceliklerini öğrenme fırsatı sunuyoruz. Künefe, humus, zahter salatası gibi yöresel lezzetlerimiz özel tariflerle hazırlanmaktadır.

Açık ve kapalı oturma alanları, özel toplantı odaları ve etkinlik salonlarıyla çok amaçlı kullanıma uygun tasarlanmıştır. Ayrıca tesisimizde Hatay el sanatları ürünlerinin sergilendiği ve satıldığı bir bölüm de bulunmaktadır.',
                'facility_type' => 'gastronomy',
                'category' => 'Gastronomi',
                'status' => 'active',
                'opening_date' => '2020-09-01',
                'capacity' => '300 kişi',
                'features' => [
                    'Yöresel yemek kursları',
                    'Gastronomi atölyeleri',
                    'Tadım etkinlikleri',
                    'Açık/kapalı oturma alanları',
                    'Toplantı odaları',
                    'El sanatları satış bölümü',
                    'Özel etkinlik salonu'
                ],
                'working_hours' => [
                    'Pazartesi-Pazar' => '09:00-22:00'
                ],
                'address' => 'Sümerler Mahallesi, Defne/Hatay',
                'phone' => '+90 326 656 XX XX',
                'email' => 'defnegastronomi@hatayimar.com',
                'image' => 'tesisler/defne.png',
                'gallery' => [
                    'tesisler/defne.png',
                    'tesisler/defne.heic'
                ],
                'latitude' => 36.1580,
                'longitude' => 36.1120,
                'sort_order' => 4,
                'is_featured' => false,
                'icon' => 'utensils'
            ],
            [
                'name' => 'Hidirbey Gastronomi Evi',
                'slug' => 'hidirbey-gastronomi-evi',
                'short_description' => 'Samandağ ilçemizde hizmet veren Hidirbey Gastronomi Evi, deniz manzaralı konumu ve özgün mimarisi ile dikkat çekmektedir.',
                'description' => 'Hidirbey Gastronomi Evi, Samandağ\'ın eşsiz doğası ve deniz manzarası eşliğinde, Hatay mutfağının en özel tatlarını sunmaktadır. 2019 yılında hizmete açılan tesisimiz, modern mutfak donanımı ve deneyimli kadrosuyla misafirlerine unutulmaz bir gastronomi deneyimi yaşatmaktadır.

Tesisimizde özellikle deniz ürünleri ve zeytinyağlı yemekler konusunda uzmanlaşmış mutfağımız, yöresel tatları modern tekniklerle harmanlayarak sunmaktadır. Organik ürünlerle hazırlanan menümüzde vegan ve vejetaryen seçenekler de bulunmaktadır.

Denize sıfır konumumuz sayesinde taze balık ve deniz ürünlerini günlük olarak temin ediyoruz. Açık terasımızda gün batımı manzarası eşliğinde yemek yeme imkanı sunuyoruz. Ayrıca özel günler için rezervasyon ve catering hizmetlerimiz de mevcuttur.',
                'facility_type' => 'gastronomy',
                'category' => 'Gastronomi',
                'status' => 'active',
                'opening_date' => '2019-07-15',
                'capacity' => '250 kişi',
                'features' => [
                    'Deniz manzarası',
                    'Açık teras',
                    'Taze deniz ürünleri',
                    'Organik menü',
                    'Vegan/vejetaryen seçenekler',
                    'Catering hizmeti',
                    'Özel gün organizasyonları'
                ],
                'working_hours' => [
                    'Pazartesi-Pazar' => '10:00-23:00'
                ],
                'address' => 'Deniz Mahallesi, Samandağ/Hatay',
                'phone' => '+90 326 512 XX XX',
                'email' => 'hidirbeygastronomi@hatayimar.com',
                'image' => 'tesisler/hidirbeygastronomi.png',
                'gallery' => [
                    'tesisler/hidirbeygastronomi.png',
                    'tesisler/hidirbey.heic'
                ],
                'latitude' => 36.0780,
                'longitude' => 35.9320,
                'sort_order' => 5,
                'is_featured' => false,
                'icon' => 'fish'
            ],
            [
                'name' => 'Parke Taşı Üretim Tesisi',
                'slug' => 'parke-tasi-uretim-tesisi',
                'short_description' => 'Kullanımı çok eski çağlara dayanan parke taşı: taşın yontulup şekle konulması veya mevcut şekliyle montajının yapılması...',
                'description' => 'Parke Taşı Üretim Tesisimiz, şehrimizin ve çevre illerin kaldırım, yol ve peyzaj düzenleme ihtiyaçlarına yönelik kaliteli parke taşı üretimi yapmaktadır. 2008 yılında kurulan tesisimizde, modern üretim teknolojileri kullanılarak çeşitli renk, desen ve ebatlarda parke taşı üretilmektedir.

Yıllık 100.000 m² üretim kapasitemizle, kilitli parke taşı, bordür taşı, oluk taşı ve dekoratif yer döşemeleri üretiyoruz. Ürünlerimiz TS EN 1338 standardına uygun olarak üretilmekte ve dayanıklılık testlerinden geçirilmektedir.

Tesisimizde bulunan Ar-Ge birimimiz sayesinde yeni ürün geliştirme çalışmaları sürekli devam etmektedir. Çevre dostu üretim anlayışımızla geri dönüşümlü malzemeler kullanarak sürdürülebilir üretim yapmaktayız.',
                'facility_type' => 'production',
                'category' => 'Üretim Tesisi',
                'status' => 'active',
                'opening_date' => '2008-03-20',
                'capacity' => '100.000 m²/yıl',
                'features' => [
                    'Modern üretim teknolojisi',
                    'Çeşitli renk ve desen seçenekleri',
                    'TS EN 1338 standardı',
                    'Ar-Ge birimi',
                    'Çevre dostu üretim',
                    'Geri dönüşümlü malzeme kullanımı',
                    'Kalite kontrol laboratuvarı'
                ],
                'working_hours' => [
                    'Pazartesi-Cumartesi' => '07:00-18:00',
                    'Pazar' => 'Kapalı'
                ],
                'address' => 'Organize Sanayi Bölgesi 2. Cadde, Hatay',
                'phone' => '+90 326 285 XX XX',
                'email' => 'parke@hatayimar.com',
                'image' => 'tesisler/p1.jpg',
                'gallery' => [
                    'tesisler/p1.jpg',
                    'tesisler/Parke-Taşı-Üretim-Tesisi.jpg'
                ],
                'latitude' => 36.2350,
                'longitude' => 36.1850,
                'sort_order' => 6,
                'is_featured' => true,
                'icon' => 'brick'
            ]
        ];

        foreach ($facilities as $facility) {
            Facility::create($facility);
        }
    }
} 