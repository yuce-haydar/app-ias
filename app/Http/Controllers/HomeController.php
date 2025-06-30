<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\HomePageSetting;
use App\Models\SiteSetting;
use App\Models\News;

class HomeController extends Controller
{
    /**
     * Ana sayfa
     */
    public function index()
    {
        // Homepage settings'leri al
        $homepageSettings = HomePageSetting::getSettings();
        
        // Site settings'leri al (header/footer için)
        $siteSettings = SiteSetting::getSettings();
        
        // Dinamik haberleri al (eğer gösterilecekse)
        $news = collect();
        if ($homepageSettings->news_show) {
            $newsCount = $homepageSettings->news_count ?? 3;
            $news = News::where('status', 'published')
                       ->orderBy('published_at', 'desc')
                       ->take($newsCount)
                       ->get();
                       
            // Eğer dinamik haber yoksa, fallback statik haberler
            if ($news->isEmpty()) {
                $news = collect([
                    (object)[
                        'id' => 1,
                        'title' => 'Samandağ Mızraklı Modern Taziye ve Adakevi Projesi',
                        'summary' => 'Samandağ ilçesi Mızraklı Mahallesi\'nde 960 m² alanda 2 katlı modern taziye ve adakevi projesi başladı.',
                        'featured_image' => 'assets/images/projeler/adak-taziye-evleri/mızrakli-adak-ve-taziye/RENDER/M_Photo - 1.jpg',
                        'category' => 'Projeler',
                        'author' => 'Hatay İmar',
                        'published_at' => now()->subDays(2)
                    ],
                    (object)[
                        'id' => 2,
                        'title' => 'Kırıkhan Butik Yarı Olimpik Yüzme Havuzu',
                        'summary' => 'Kırıkhan Cumhuriyet Mahallesi\'nde 1500 m² alanda 25x12,5 m ölçülerinde 5 kulvarlı havuz inşaatı başladı.',
                        'featured_image' => 'assets/images/projeler/200-kisilik-yari-olimpik-altinozu/8f716ef6-3ea1-4442-85c9-df8c033a7eee.jpg',
                        'category' => 'Spor Tesisleri',
                        'author' => 'Hatay İmar',
                        'published_at' => now()->subDays(5)
                    ],
                    (object)[
                        'id' => 3,
                        'title' => 'Belen Bedesten Meydan Projesi Devam Ediyor',
                        'summary' => 'Belen Soğukoluk Mahallesi\'nde 2500 m² alanda 15 bölümlü modern bedesten projesi ilerliyor.',
                        'featured_image' => 'assets/images/projeler/cok-amacli-rendet/WhatsApp Image 2025-02-18 at 16.58.59.jpeg',
                        'category' => 'Ticaret Merkezleri',
                        'author' => 'Hatay İmar',
                        'published_at' => now()->subWeek()
                    ]
                ])->take($newsCount);
            }
        }
        
        return view('home', compact('news', 'homepageSettings', 'siteSettings'));
    }

    /**
     * Ana sayfa - İkinci versiyon
     */
    public function home2()
    {
        return view('home-2');
    }

    /**
     * Ana sayfa - Üçüncü versiyon (Koyu tema)
     */
    public function home3()
    {
        return view('home-3');
    }

    /**
     * Ana sayfa - Dördüncü versiyon
     */
    public function home4()
    {
        return view('home-4');
    }
} 