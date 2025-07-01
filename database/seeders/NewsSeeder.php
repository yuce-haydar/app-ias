<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\News;
use Carbon\Carbon;

class NewsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $news = [
            [
                'title' => 'HBB\'den Samandağ\'a Modern Taziye ve Adakevi',
                'summary' => 'Hatay İmar Sanayi Anonim Şirketi (HİSAŞ) tarafından Samandağ ilçesi Mızraklı Mahallesi\'nde modern bir taziye ve adakevinin temeli atıldı.',
                'content' => '<p>Hatay Büyükşehir Belediyesi (HBB), Başkan Mehmet Öntürk\'ün talimatları doğrultusunda, vizyon projelerini hayata geçirmeye devam ediyor.</p>

<p>Hatay İmar Sanayi Anonim Şirketi (HİSAŞ) tarafından Samandağ ilçesi Mızraklı Mahallesi\'nde modern bir taziye ve adakevinin temeli atıldı.</p>

<h3>2 Katlı 960 m²lik Yapı 240 Kişiye Hizmet Verecek</h3>
<p>Toplamda 960 metrekarelik bir alanıyla bölge insanın ihtiyaçlarını karşılayacak olan manevi yapı, zemin ve birinci kat olmak üzere iki kattan oluşacak ve 240 kişiye hizmet verecek.</p>

<h3>İkram, Hizmet ve Maneviyat Alanlarına Sahip</h3>
<p>Zemin katta taziye salonu, depolar, aş ikram terası, genel kullanım odası, mutfak, bulaşıkhane, adak/kurbanlık kesimhane ve odunluk gibi alanlar yer alacak. Birinci katta ise namazgah salonu, depolar ve ayakkabılıklar bulunacak.</p>

<p>HİSAŞ yetkilileri, sosyal altyapının güçlendirilmesine ve vatandaşların ihtiyaçlarının karşılanmasına yönelik çalışmaların devam edeceğini iletti.</p>',
                'featured_image' => 'storage/projeler/adak-taziye-evleri/mızrakli-adak-ve-taziye/RENDER/M_Photo - 1.jpg',
                'category' => 'Projeler',
                'tags' => ['Samandağ', 'Taziye Evi', 'Adakevi', 'HİSAŞ'],
                'author' => 'Hatay İmar',
                'status' => 'published',
                'published_at' => Carbon::now()->subDays(5),
                'is_featured' => true,
                'allow_comments' => true
            ],
            [
                'title' => 'HBB\'nin Kırsal Dönüşüm Projesinde Konutlar Yükseliyor',
                'summary' => 'Hatay İmar Sanayi Anonim Şirketi (HİSAŞ) tarafından Kırıkhan ilçesi Karamağara Mahallesi\'nde inşa edilen kırsal konutlar yükselmeye başladı.',
                'content' => '<p>Hatay Büyükşehir Belediyesi (HBB), kırsal dönüşüm hamlesi kapsamında inşa edilen köy konutlarının inşasına hız kesmeden devam ediyor.</p>

<p>Göreve gelir gelmez vizyon projelerini hayata geçirmeye devam eden HBB Başkanı Mehmet Öntürk\'ün talimatları doğrultusunda, ilk etap sosyal konut projesi hayata geçirildi.</p>

<p>Hatay İmar Sanayi Anonim Şirketi (HİSAŞ) tarafından Kırıkhan ilçesi Karamağara Mahallesi\'nde inşa edilen kırsal konutlar yükselmeye başladı.</p>

<h3>Konutların Kaba İnşaatı Tamamlandı</h3>
<p>Karamağara Mahallesi\'nde konutların kaba inşaatı tamamlanırken inşaatlarda ince işçilik çalışmaları yürütülüyor. Altyapı ve çevre düzenleme işlemlerine ise eş zamanlı olarak başlanacak.</p>

<p>HİSAŞ yetkilileri; 2. etap ve 3. etap evlerin yapımına en kısa sürede başlayacaklarını belirtti.</p>',
                'featured_image' => 'storage/projeler/kirkhan-kulliye/K (1).jpg',
                'category' => 'Projeler',
                'tags' => ['Kırıkhan', 'Kırsal Dönüşüm', 'Konut', 'HİSAŞ'],
                'author' => 'Hatay İmar',
                'status' => 'published',
                'published_at' => Carbon::now()->subDays(7),
                'is_featured' => true,
                'allow_comments' => true
            ],
            [
                'title' => 'HBB\'den Altınözü\'ne Çok Amaçlı Salon',
                'summary' => 'Hatay İmar Sanayi Anonim Şirketi (HİSAŞ) tarafından Altınözü ilçesi Toprakhisar Mahallesi\'nde çok amaçlı salonunun temeli atıldı.',
                'content' => '<p>Hatay Büyükşehir Belediyesi (HBB), "Hatay Ayağa Kalkıyor" misyonuyla il genelinde vizyon projelerini hız kesmeden hayata geçiriyor.</p>

<p>Göreve geldiği günden bu yana vaatlerini birer birer gerçekleştiren HBB Başkan Mehmet Öntürk\'ün talimatları doğrultusunda, Hatay İmar Sanayi Anonim Şirketi (HİSAŞ) tarafından pek çok projenin temeli atıldı.</p>

<h3>1200 m²lik Alanıyla Hizmet Verecek</h3>
<p>1200 metrekarelik alanda inşa edilecek çok amaçlı salon; giriş holü, ana salon, mutfak, kadın-erkek mescit ve abdesthaneler, tuvaletler, muhtar odası, sınıf ve temizlik odası gibi donatılara sahip olacak.</p>

<h3>Her Türlü Organizasyon Yapılabilecek</h3>
<p>Düğün, nişan, toplantı, eğitim ve sosyal etkinliklere uygun olarak inşa edilen salon, bölge sakinlerinin hizmetine sunulacak.</p>

<h3>Betonarme ve Çelik Birlikte Kullanılıyor</h3>
<p>Yapının inşasında betonarme ve çelik sistem birlikte kullanıldığını aktaran HİSAŞ yetkilileri, çok amaçlı salonun en kısa sürede tamamlayarak vatandaşların hizmetine sunacaklarını iletti.</p>',
                'featured_image' => 'storage/projeler/altınözü-gençlik-merkezi/GORSELLER/01.jpg',
                'category' => 'Projeler',
                'tags' => ['Altınözü', 'Çok Amaçlı Salon', 'HİSAŞ'],
                'author' => 'Hatay İmar',
                'status' => 'published',
                'published_at' => Carbon::now()->subDays(3),
                'is_featured' => false,
                'allow_comments' => true
            ],
            [
                'title' => 'HBB\'den Kırıkhan\'a Butik Yarı Olimpik Yüzme Havuzu',
                'summary' => 'Hatay İmar Sanayi Anonim Şirketi (HİSAŞ) Kırıkhan ilçesi Cumhuriyet Mahallesi\'nde butik yarı olimpik yüzme havuzunun projesinin temelini attı.',
                'content' => '<p>Hatay Büyükşehir Belediyesi (HBB), "Hatay Ayağa Kalkıyor" misyonuyla il genelinde vizyon projelerini vatandaşlarla buluşturmaya devam ediyor.</p>

<p>Projeleriyle Hatay\'ın spor altyapısını güçlendirmeye devam eden HBB Başkanı Mehmet Öntürk\'ün talimatları doğrultusunda, Hatay İmar Sanayi Anonim Şirketi (HİSAŞ) Kırıkhan ilçesi Cumhuriyet Mahallesi\'nde butik yarı olimpik yüzme havuzunun projesinin temelini attı.</p>

<h3>1500 m² Alanıyla Tüm Sporseverlere Hizmet Verecek</h3>
<p>Toplam 1500 m² alana sahip olacak tesis, 25x12,5 m ölçülerinde, 5 kulvarlı butik bir yüzme havuzu olarak gençlere, çocuklara ve tüm sporseverlere hizmet verecek.</p>

<h3>HİSAŞ Yetkilileri: En Kısa Zamanda Tamamlayacağız</h3>
<p>200 kişilik kapasiteye sahip yüzme havuzunda idari bina, sağlık odası ve tribün bulunduğunu aktaran HİSAŞ yetkilileri, inşaatı en kısa zamanda tamamlayıp yüzme havuzunu vatandaşların kullanımına açacaklarını iletti.</p>',
                'featured_image' => 'storage/projeler/200-kisilik-yari-olimpik-altinozu/c7eb5dec-3f13-4dcc-b11e-85daaa985401.jpg',
                'category' => 'Projeler',
                'tags' => ['Kırıkhan', 'Yüzme Havuzu', 'Spor', 'HİSAŞ'],
                'author' => 'Hatay İmar',
                'status' => 'published',
                'published_at' => Carbon::now()->subDays(2),
                'is_featured' => true,
                'allow_comments' => true
            ],
            [
                'title' => 'HBB, Payas\'ta Modern Halı Saha Projesini Hayata Geçirdi',
                'summary' => 'HBB bünyesindeki İMAR A.Ş tarafından temeli atılan Payas Halı Saha ve Kafeterya projesi bölgeye önemli değer katacak.',
                'content' => '<p>Hatay Büyükşehir Belediyesi (HBB) Başkanı Mehmet Öntürk\'ün "Hatay Ayağa Kalkıyor" ilkesiyle çalışmalarına devam eden HBB ekipleri, bütün alanlarda Hatay\'ın geleceğine yatırım yapmaya devam ediyor.</p>

<p>Ulaşım, altyapı, turizm ve spor alanlarında yaptığı yatırımlar ile vatandaşların hayatını kolaylaştırmayı hedefleyen HBB, gençlerin modern bir alanda spor yapması adına başlatılan "Modern Halı Saha" projesini Payas Cumhuriyet Mahallesi\'nde devam ettirdi.</p>

<p>HBB bünyesindeki İMAR A.Ş tarafından temeli atılan Payas Halı Saha ve Kafeterya projesi kapsamında bilgi veren HBB, içerisinde çim halı saha, kafeterya ile soyunma kabinlerinin bulunduğu tesisin sosyal kültürel anlamda bölgeye önemli değer katacağını belirtti.</p>

<h3>Spor\'a Ve Gençliğe Verdiği Desteklerden Dolayı Başkan Öntürk\'e Teşekkür</h3>
<p>Payas\'ta yapımına başlanan projenin bölge genelindeki genç kesime önemli derecede sosyal alan oluşturacağını belirten Cumhuriyet Mahalle Muhtarı Şenol Urman, gençlerin stres atmaları için yapılan halı saha ve kafeterya projesi için ve spor alanında yapılan hizmetler için Başkan Öntürk ile emek veren personellere teşekkür etti.</p>',
                'featured_image' => 'storage/projeler/halısaha-render/k1.jpg',
                'category' => 'Projeler',
                'tags' => ['Payas', 'Halı Saha', 'Spor', 'İMAR AŞ'],
                'author' => 'Hatay İmar',
                'status' => 'published',
                'published_at' => Carbon::now()->subDays(4),
                'is_featured' => false,
                'allow_comments' => true
            ],
            [
                'title' => 'Başkan Öntürk Kumlu\'da Kreş Temeli Attı',
                'summary' => 'Hatay İmar Sanayi Anonim Şirketi (HİSAŞ) tarafından 600 metrekarelik alanda yapımına başlanan kreş çok yönlü donatılara sahip olacak.',
                'content' => '<p>Hatay Büyükşehir Belediyesi (HBB), Başkan Mehmet Öntürk\'ün seçim döneminde verdiği vaatlerini hayata geçirmeye devam ediyor.</p>

<p>Bir dizi ziyaretler ve HBB Meclis Toplantısı için Kumlu\'da bulunan Başkan Öntürk; Cumhuriyet Mahallesi\'nde yapımına başlanan kreşin temel atma törenine katıldı.</p>

<h3>Donatılarıyla Çok Yönlü Kreş</h3>
<p>Hatay İmar Sanayi Anonim Şirketi (HİSAŞ) tarafından 600 metrekarelik alanda yapımına başlanan kreş içerisinde; tuvaletler, temizlik odası, ısıtma merkezi, dört sınıf, yemekhane, mutfak, etkinlik odası, uyku ve oyun alanının yanı sıra ofis yer alacak.</p>

<h3>Başkan Öntürk: En Kısa Zamanda Hizmete Sunacağız</h3>
<p>Göreve geldiği günden bu yana eş zamanlı olarak pek çok projeyi 15 ilçede hayata geçirdiklerini hatırlatan Başkan Öntürk, çocukların güvenli, sağlıklı ve eğitici bir ortamda büyümesini desteklemek amacıyla kreşin inşaatını en kısa sürede tamamlayarak vatandaşların hizmetine sunacaklarını iletti.</p>',
                'featured_image' => 'storage/projeler/kres/KRES1 (1).jpg',
                'category' => 'Projeler',
                'tags' => ['Kumlu', 'Kreş', 'Eğitim', 'HİSAŞ'],
                'author' => 'Hatay İmar',
                'status' => 'published',
                'published_at' => Carbon::now()->subDays(1),
                'is_featured' => true,
                'allow_comments' => true
            ],
            [
                'title' => 'Başkan Öntürk\'ten Belen\'e Bedesten Meydan Projesi',
                'summary' => 'HBB iştiraki Hatay İmar Sanayi AŞ (İMAR AŞ) tarafından Belen ilçesi Soğukoluk Mahallesi\'nde Soğukoluk Bedesten Meydan Projesi hızla ilerliyor.',
                'content' => '<p>Hatay Büyükşehir Belediyesi (HBB), Başkan Mehmet Öntürk\'ün liderliğinde vizyon projelerini hayata geçirmeye devam ediyor.</p>

<p>HBB iştiraki Hatay İmar Sanayi AŞ (İMAR AŞ) tarafından Belen ilçesi Soğukoluk Mahallesi\'nde yapımına başlanan Soğukoluk Bedesten Meydan Projesi hızla ilerliyor.</p>

<h3>2 Bin 500 M² Alanda 15 Bölüm</h3>
<p>Temellerinin atıldığı bedestende toplam 2 bin 500 m² açık ve kapalı alana sahip olacak projede, mahalle sakinlerinin ihtiyaçlarına yanıt verecek şekilde planlanan 15 bölüm yer alıyor.</p>

<h3>Çeşitli Sosyal Donatılar Mevcut</h3>
<p>Yapı içerisinde; fırın, restoran, market, muhtarlık, kıraathane, aile çay bahçesi ve 3. nesil kahveci gibi sosyal donatılar yer alacak.</p>

<p>İMAR AŞ yetkilileri, şu ana kadar 5 adet dükkânın temelinin atıldığını belirterek çalışmalarını yaz aylarında tamamlayacaklarını belirtti.</p>

<p>Soğukoluk Mahallesi Muhtarı ise projeyi "yüz yılın yatırımı" olarak değerlendirerek Belen gençlerine ilk kez böyle bir hizmetle tanıştığı için de Başkan Mehmet Öntürk\'e teşekkürlerini iletti.</p>',
                'featured_image' => 'storage/projeler/cok-amacli-rendet/WhatsApp Image 2025-02-18 at 16.58.59.jpeg',
                'category' => 'Projeler',
                'tags' => ['Belen', 'Bedesten', 'Meydan', 'İMAR AŞ'],
                'author' => 'Hatay İmar',
                'status' => 'published',
                'published_at' => Carbon::now()->subHours(12),
                'is_featured' => true,
                'allow_comments' => true
            ],
            [
                'title' => 'HBB\'den Yayladağı\'na Halı Saha Müjdesi',
                'summary' => 'HBB Fen İşleri Dairesi Başkanlığı ve HİSAŞ İMAR AŞ, Yayladağı ilçesine bağlı Görentaş Mahallesi\'nde modern halı saha projesi yürütüyor.',
                'content' => '<p>Hatay Büyükşehir Belediyesi (HBB), seçim sürecinde verdiği sözleri hızla hayata geçirerek şehre yeni yatırımlar kazandırmayı sürdürüyor.</p>

<p>HBB Fen İşleri Dairesi Başkanlığı ve HİSAŞ İMAR AŞ, Başkan Öntürk\'ün talimatıyla gençlerin ve çocukların sporu ve sağlıklı yaşamı teşvik etmek amacıyla Modern Halı Saha Projesi\'ni hayata geçirmeye devam ediyor.</p>

<h3>Görentaş Halı Sahası Yolda</h3>
<p>Halı saha inşa çalışmalarının başladığı Yayladağı ilçesine bağlı Görentaş Mahallesi\'nde; içerisinde halı saha, soyunma odaları ve kafeterya bulunan tesisin inşa çalışmaları sürüyor.</p>

<p>Çalışmaların kısa zamanda tamamlanacağını belirten HBB Fen İşleri Dairesi Başkanlığı ve HİSAŞ İMAR AŞ yetkilileri, genç ve çocukların spor yapmaları için il genelinde halı sahaların yapımına da başlanacağını belirtti.</p>

<h3>Muhtardan Başkan Öntürk\'e Teşekkür</h3>
<p>Çalışmalara dair düşüncelerini aktaran Görentaş Mahallesi Muhtar Abdulberi Aktaran, "Yapımı devam eden halı saha, kafeterya projesi ve diğer hizmetleri gençlerimize sunduğu için HBB Başkanımız Mehmet Öntürk\'e teşekkürlerimim sunarım." diye konuştu.</p>',
                'featured_image' => 'storage/projeler/halısaha-render/k2.jpg',
                'category' => 'Projeler',
                'tags' => ['Yayladağı', 'Halı Saha', 'Spor', 'HİSAŞ'],
                'author' => 'Hatay İmar',
                'status' => 'published',
                'published_at' => Carbon::now()->subHours(6),
                'is_featured' => false,
                'allow_comments' => true
            ]
        ];

        foreach ($news as $newsItem) {
            News::create($newsItem);
        }
    }
}
