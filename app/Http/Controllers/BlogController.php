<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BlogController extends Controller
{
    /**
     * Blog ızgara sayfası
     */
    public function grid()
    {
        // Şimdilik statik haberler - göstermelik
        $newsArray = [
            (object)[
                'id' => 1,
                'title' => 'Samandağ Mızraklı Modern Taziye ve Adakevi Projesi',
                'summary' => 'Samandağ ilçesi Mızraklı Mahallesi\'nde 960 m² alanda 2 katlı modern taziye ve adakevi projesi başladı.',
                'featured_image' => 'storage/projeler/adak-taziye-evleri/mızrakli-adak-ve-taziye/RENDER/M_Photo - 1.jpg',
                'category' => 'Projeler',
                'author' => 'Hatay İmar',
                'published_at' => now()->subDays(2)
            ],
            (object)[
                'id' => 2,
                'title' => 'Kırıkhan Butik Yarı Olimpik Yüzme Havuzu',
                'summary' => 'Kırıkhan Cumhuriyet Mahallesi\'nde 1500 m² alanda 25x12,5 m ölçülerinde 5 kulvarlı havuz inşaatı başladı.',
                'featured_image' => 'storage/projeler/200-kisilik-yari-olimpik-altinozu/8f716ef6-3ea1-4442-85c9-df8c033a7eee.jpg',
                'category' => 'Spor Tesisleri',
                'author' => 'Hatay İmar',
                'published_at' => now()->subDays(5)
            ],
            (object)[
                'id' => 3,
                'title' => 'Belen Bedesten Meydan Projesi',
                'summary' => 'Belen Soğukoluk Mahallesi\'nde 2500 m² alanda 15 bölümlü modern bedesten projesi ilerliyor.',
                'featured_image' => 'storage/projeler/cok-amacli-rendet/WhatsApp Image 2025-02-18 at 16.58.59.jpeg',
                'category' => 'Ticaret Merkezleri',
                'author' => 'Hatay İmar',
                'published_at' => now()->subWeek()
            ],
            (object)[
                'id' => 4,
                'title' => 'Modern Kreş Kompleksleri İnşaatı',
                'summary' => 'Kumlu ve Altınözü ilçelerinde 600 m² alanda 4 sınıflı modern kreş tesisleri inşa ediliyor.',
                'featured_image' => 'storage/projeler/kres/KRES1 (1).jpg',
                'category' => 'Eğitim',
                'author' => 'Hatay İmar',
                'published_at' => now()->subDays(10)
            ],
            (object)[
                'id' => 5,
                'title' => 'Halısaha Projeleri Devam Ediyor',
                'summary' => 'Payas, Kumlu, Yayladağı, Kırıkhan ve Dörtyol\'da modern halısaha kompleksleri inşa ediliyor.',
                'featured_image' => 'storage/projeler/halısaha-render/k1.jpg',
                'category' => 'Spor Tesisleri',
                'author' => 'Hatay İmar',
                'published_at' => now()->subDays(15)
            ],
            (object)[
                'id' => 6,
                'title' => 'Sebze Hali Kompleksi Tamamlandı',
                'summary' => 'Modern altyapısı ve geniş kapasitesi ile bölgenin tarımsal ürün ticaretinin merkezi oldu.',
                'featured_image' => 'storage/projeler/sebze-hali/WhatsApp Image 2023-05-24 at 10.39.51 (1).jpeg',
                'category' => 'Ticaret',
                'author' => 'Hatay İmar',
                'published_at' => now()->subDays(20)
            ],
            (object)[
                'id' => 7,
                'title' => 'Antakya Merkez Park Projesi',
                'summary' => 'Antakya merkezde 5000 m² alanda modern park ve rekreasyon alanı projesi başladı.',
                'featured_image' => 'storage/projeler/park-projeleri/park1.jpg',
                'category' => 'Park ve Rekreasyon',
                'author' => 'Hatay İmar',
                'published_at' => now()->subDays(25)
            ],
            (object)[
                'id' => 8,
                'title' => 'Defne Kültür Merkezi İnşaatı',
                'summary' => 'Defne ilçesinde 2000 m² alanda modern kültür merkezi ve konferans salonu inşa ediliyor.',
                'featured_image' => 'storage/projeler/kultur-merkezi/kultur1.jpg',
                'category' => 'Kültür ve Sanat',
                'author' => 'Hatay İmar',
                'published_at' => now()->subDays(30)
            ],
            (object)[
                'id' => 9,
                'title' => 'İskenderun Liman Bölgesi Yenileme',
                'summary' => 'İskenderun liman bölgesinde 10000 m² alanda modern ticaret ve turizm merkezi projesi.',
                'featured_image' => 'storage/projeler/liman-projesi/liman1.jpg',
                'category' => 'Turizm',
                'author' => 'Hatay İmar',
                'published_at' => now()->subDays(35)
            ],
            (object)[
                'id' => 10,
                'title' => 'Reyhanlı Organize Sanayi Bölgesi',
                'summary' => 'Reyhanlı ilçesinde 50000 m² alanda organize sanayi bölgesi ve fabrika tesisleri.',
                'featured_image' => 'storage/projeler/sanayi-bolgesi/sanayi1.jpg',
                'category' => 'Sanayi',
                'author' => 'Hatay İmar',
                'published_at' => now()->subDays(40)
            ],
            (object)[
                'id' => 11,
                'title' => 'Hassa Sağlık Kompleksi',
                'summary' => 'Hassa ilçesinde 3000 m² alanda modern sağlık merkezi ve poliklinik tesisleri.',
                'featured_image' => 'storage/projeler/saglik-kompleksi/saglik1.jpg',
                'category' => 'Sağlık',
                'author' => 'Hatay İmar',
                'published_at' => now()->subDays(45)
            ],
            (object)[
                'id' => 12,
                'title' => 'Yayladağı Tarım Destek Merkezi',
                'summary' => 'Yayladağı ilçesinde 1500 m² alanda modern tarım destek merkezi ve eğitim tesisleri.',
                'featured_image' => 'storage/projeler/tarim-merkezi/tarim1.jpg',
                'category' => 'Tarım',
                'author' => 'Hatay İmar',
                'published_at' => now()->subDays(50)
            ]
        ];
        
        // Pagination için collection'ı sayfalara böl
        $news = collect($newsArray);
        $perPage = 6; // Sayfa başına 6 haber
        $currentPage = request()->get('page', 1);
        
        // Manuel pagination oluştur
        $total = $news->count();
        $offset = ($currentPage - 1) * $perPage;
        $items = $news->slice($offset, $perPage);
        
        // Paginator oluştur
        $paginator = new \Illuminate\Pagination\LengthAwarePaginator(
            $items,
            $total,
            $perPage,
            $currentPage,
            [
                'path' => request()->url(),
                'pageName' => 'page',
            ]
        );
        
        return view('blog.grid', compact('news', 'paginator'));
    }

    /**
     * Blog liste sayfası
     */
    public function list()
    {
        return $this->grid(); // Aynı veriyi kullan
    }

    /**
     * Blog detay sayfası
     */
    public function details($id)
    {
        $newsArray = [
            1 => (object)[
                'id' => 1,
                'title' => 'Samandağ Mızraklı Modern Taziye ve Adakevi Projesi',
                'summary' => 'Samandağ ilçesi Mızraklı Mahallesi\'nde 960 m² alanda 2 katlı modern taziye ve adakevi projesi başladı.',
                'content' => '<p>Hatay Büyükşehir Belediyesi (HBB), Başkan Mehmet Öntürk\'ün talimatları doğrultusunda, vizyon projelerini hayata geçirmeye devam ediyor.</p><p>Hatay İmar Sanayi Anonim Şirketi (HİSAŞ) tarafından Samandağ ilçesi Mızraklı Mahallesi\'nde modern bir taziye ve adakevinin temeli atıldı.</p><h3>2 Katlı 960 m²lik Yapı 240 Kişiye Hizmet Verecek</h3><p>Toplamda 960 metrekarelik bir alanıyla bölge insanın ihtiyaçlarını karşılayacak olan manevi yapı, zemin ve birinci kat olmak üzere iki kattan oluşacak ve 240 kişiye hizmet verecek.</p>',
                'featured_image' => 'storage/projeler/adak-taziye-evleri/mızrakli-adak-ve-taziye/RENDER/M_Photo - 1.jpg',
                'category' => 'Projeler',
                'author' => 'Hatay İmar',
                'published_at' => now()->subDays(2)
            ],
            2 => (object)[
                'id' => 2,
                'title' => 'Kırıkhan Butik Yarı Olimpik Yüzme Havuzu',
                'summary' => 'Kırıkhan Cumhuriyet Mahallesi\'nde 1500 m² alanda 25x12,5 m ölçülerinde 5 kulvarlı havuz inşaatı başladı.',
                'content' => '<p>Kırıkhan ilçesi Cumhuriyet Mahallesi\'nde 1500 m² alanda butik yarı olimpik yüzme havuzu projesi hayata geçiriliyor.</p><h3>Tesis Özellikleri</h3><ul><li>25x12,5 m havuz ölçüleri</li><li>5 kulvarlı butik tasarım</li><li>200 kişi kapasiteli</li><li>Modern filtrasyon sistemleri</li></ul>',
                'featured_image' => 'storage/projeler/200-kisilik-yari-olimpik-altinozu/8f716ef6-3ea1-4442-85c9-df8c033a7eee.jpg',
                'category' => 'Spor Tesisleri',
                'author' => 'Hatay İmar',
                'published_at' => now()->subDays(5)
            ],
            3 => (object)[
                'id' => 3,
                'title' => 'Belen Bedesten Meydan Projesi',
                'summary' => 'Belen Soğukoluk Mahallesi\'nde 2500 m² alanda 15 bölümlü modern bedesten projesi ilerliyor.',
                'content' => '<p>Belen ilçesi Soğukoluk Mahallesi\'nde 2500 m² alanda 15 bölümlü modern bedesten projesi devam ediyor.</p><h3>Bedesten Özellikleri</h3><ul><li>2500 m² açık ve kapalı alan</li><li>15 bölümlü modern tasarım</li><li>Fırın ve restoran</li><li>Market ve muhtarlık</li></ul>',
                'featured_image' => 'storage/projeler/cok-amacli-rendet/WhatsApp Image 2025-02-18 at 16.58.59.jpeg',
                'category' => 'Ticaret Merkezleri',
                'author' => 'Hatay İmar',
                'published_at' => now()->subWeek()
            ]
        ];
        
        $article = $newsArray[$id] ?? $newsArray[1];
        $relatedNews = collect(array_filter($newsArray, function($item) use ($id, $article) {
            return $item->id != $id && $item->category == $article->category;
        }))->take(3);
            
        return view('blog.details', compact('article', 'relatedNews'));
    }
} 