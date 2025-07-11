<?php

namespace App\Http\Controllers;

use App\Models\Facility;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class FacilityController extends Controller
{
    /**
     * Display a listing of facilities.
     */
    public function index()
    {
        $facilities = Facility::where('status', 'active')
            ->orderBy('sort_order', 'asc')
            ->orderBy('created_at', 'desc')
            ->paginate(12);
        
        // Image URL'lerini düzelt
        foreach ($facilities as $facility) {
            $facility->image_url = \App\Helpers\ImageHelper::getImageUrl($facility->image);
            if ($facility->gallery) {
                $facility->gallery_urls = \App\Helpers\ImageHelper::getGalleryUrls($facility->gallery);
            }
        }
            
        return view('facilities.index', compact('facilities'));
    }

    /**
     * Display the specified facility.
     */
    public function details($id)
    {
        $facility = Facility::where('status', 'active')
            ->findOrFail($id);
        
        // Görüntülenme sayısını arttır
        $facility->increment('view_count');
        
        // Image URL'lerini düzelt
        $facility->image_url = \App\Helpers\ImageHelper::getImageUrl($facility->image);
        if ($facility->gallery) {
            $facility->gallery_urls = \App\Helpers\ImageHelper::getGalleryUrls($facility->gallery);
        }
        
        // İlgili tesisleri getir (aynı kategoriden)
        $relatedFacilities = Facility::where('status', 'active')
            ->where('id', '!=', $facility->id)
            ->where('facility_type', $facility->facility_type)
            ->orderBy('sort_order', 'asc')
            ->take(3)
            ->get();
        
        // İlgili tesislerin image URL'lerini düzelt
        foreach ($relatedFacilities as $related) {
            $related->image_url = \App\Helpers\ImageHelper::getImageUrl($related->image);
        }
            
        return view('facilities.details', compact('facility', 'relatedFacilities'));
    }

    /**
     * Tesis detay sayfası (slug ile)
     */
    public function detailsBySlug($slug)
    {
        // Slug ile tesisi çek
        $facility = Facility::where('slug', $slug)->where('status', 'active')->firstOrFail();
        
        // Mevcut details method'undaki aynı işlemleri yap
        return $this->details($facility->id);
    }
} 