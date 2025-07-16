<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\News;
use App\Models\Project;
use App\Models\Facility;
use App\Models\Service;
use App\Models\HomePageSettings;

class HomeController extends Controller
{
    /**
     * Ana sayfa
     */
    public function index()
    {
        // Haberler veritabanından çek
        $news = News::where('status', 'published')
            ->orderBy('published_at', 'desc')
            ->take(3)
            ->get();
            
        // Projeleri veritabanından çek (harita için tüm projeler, görüntü için 8 tane)
        $allProjects = Project::with('locations')
            ->orderBy('sort_order', 'asc')
            ->orderBy('created_at', 'desc')
            ->get()
            ->map(function($project) {
                // Image path'i düzelt
                $project->image_url = \App\Helpers\ImageHelper::getImageUrl($project->image);
                return $project;
            });
            
        $projects = $allProjects->take(8);
            
        // Öne çıkan projeleri çek
        $featuredProjects = Project::where('is_featured', true)
            ->orderBy('sort_order', 'asc')
            ->take(3)
            ->get()
            ->map(function($project) {
                // Image path'i düzelt
                $project->image_url = \App\Helpers\ImageHelper::getImageUrl($project->image);
                
                // Area bilgisini ekle
                if ($project->features && is_array($project->features)) {
                    foreach ($project->features as $feature) {
                        if (str_contains(strtolower($feature), 'm²') || str_contains(strtolower($feature), 'alan')) {
                            $project->area = $feature;
                            break;
                        }
                    }
                }
                
                return $project;
            });
            
        // Öne çıkan tesisleri çek (card'larda gösterilecek)
        $facilities = Facility::where('status', 'active')
            ->where('is_featured', true)
            ->orderBy('sort_order', 'asc')
            ->take(4)
            ->get()
            ->map(function($facility) {
                // Image path'i düzelt
                $facility->image_url = \App\Helpers\ImageHelper::getImageUrl($facility->image);
                
                // Icon mapping
                $iconMap = [
                    'factory' => 'flaticon-factory',
                    'parking' => 'flaticon-parking',
                    'mountain' => 'flaticon-mountain',
                    'brick' => 'flaticon-brick',
                    'utensils' => 'flaticon-food',
                    'fish' => 'flaticon-fish'
                ];
                
                $facility->icon_class = $iconMap[$facility->icon] ?? 'flaticon-building';
                
                return $facility;
            });
            
        // Harita için tüm aktif tesisleri çek
        $allFacilities = Facility::where('status', 'active')
            ->whereNotNull('latitude')
            ->whereNotNull('longitude')
            ->orderBy('sort_order', 'asc')
            ->get()
            ->map(function($facility) {
                // Image path'i düzelt
                $facility->image_url = \App\Helpers\ImageHelper::getImageUrl($facility->image);
                return $facility;
            });
            
        // Öne çıkan hizmetleri çek
        $services = Service::active()
            ->featured()
            ->orderBy('sort_order', 'asc')
            ->take(4)
            ->get();
            
        // Ana sayfa ayarlarını çek
        $homeSettings = HomePageSettings::getSettings();
        
        return view('home', compact('news', 'projects', 'allProjects', 'featuredProjects', 'facilities', 'allFacilities', 'services', 'homeSettings'));
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