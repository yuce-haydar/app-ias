<?php

namespace App\Http\Controllers\QrMenu;

use App\Http\Controllers\Controller;
use App\Models\QrMenu;
use Illuminate\Http\Request;

class QrMenuController extends Controller
{
    /**
     * QR menüyü görüntüle
     */
    public function show($slug)
    {
        $qrMenu = QrMenu::with(['menuCategories.menuItems' => function ($query) {
            $query->active()->available()->ordered();
        }])
        ->where('url_slug', $slug)
        ->active()
        ->firstOrFail();

        // Kategorileri hiyerarşik olarak yükle (ana kategoriler ve alt kategorileri)
        $categories = $qrMenu->menuCategories()
            ->active()
            ->ordered()
            ->with([
                'menuItems' => function ($query) {
                    $query->active()->available()->ordered();
                },
                'children' => function ($query) {
                    $query->active()->ordered()->with(['menuItems' => function ($subQuery) {
                        $subQuery->active()->available()->ordered();
                    }]);
                }
            ])
            ->whereNull('parent_id') // Sadece ana kategoriler, alt kategoriler children ilişkisiyle gelecek
            ->get();

        // Önerilen ürünleri getir
        $recommendedItems = collect();
        foreach ($categories as $category) {
            $recommendedItems = $recommendedItems->merge(
                $category->menuItems->where('is_recommended', true)
            );
        }

        return view('qr-menu.show', compact('qrMenu', 'categories', 'recommendedItems'));
    }


}
