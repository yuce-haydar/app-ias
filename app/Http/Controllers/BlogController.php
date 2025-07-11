<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\News;

class BlogController extends Controller
{
    /**
     * Blog ızgara sayfası
     */
    public function grid()
    {
        // Admin panelinden yayınlanan haberleri çek
        $news = News::published()
            ->orderBy('published_at', 'desc')
            ->orderBy('created_at', 'desc')
            ->paginate(6);

        return view('blog.grid', compact('news'));
    }

    /**
     * Blog liste sayfası
     */
    public function list()
    {
        // Admin panelinden yayınlanan haberleri çek
        $news = News::published()
            ->orderBy('published_at', 'desc')
            ->orderBy('created_at', 'desc')
            ->paginate(6);

        return view('blog.list', compact('news'));
    }

    /**
     * Blog detay sayfası
     */
    public function details($id)
    {
        // Haberi çek
        $article = News::published()->findOrFail($id);
        
        // Görüntülenme sayısını artır
        $article->incrementViewCount();

        // İlgili haberleri çek (aynı kategoriden, farklı ID'li)
        $relatedNews = News::published()
            ->where('id', '!=', $id)
            ->where('category', $article->category)
            ->orderBy('published_at', 'desc')
            ->take(3)
            ->get();

        // Eğer aynı kategoride yeterli haber yoksa, diğer kategorilerden getir
        if ($relatedNews->count() < 3) {
            $additionalNews = News::published()
                ->where('id', '!=', $id)
                ->whereNotIn('id', $relatedNews->pluck('id'))
                ->orderBy('published_at', 'desc')
                ->take(3 - $relatedNews->count())
                ->get();
            
            $relatedNews = $relatedNews->concat($additionalNews);
        }

        return view('blog.details', compact('article', 'relatedNews'));
    }

    /**
     * Blog detay sayfası (slug ile)
     */
    public function detailsBySlug($slug)
    {
        // Slug ile haberi çek
        $article = News::published()->where('slug', $slug)->firstOrFail();
        
        // Mevcut details method'undaki aynı işlemleri yap
        return $this->details($article->id);
    }
} 