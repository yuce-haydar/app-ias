<?php

namespace App\Http\Controllers;

use App\Models\Service;
use Illuminate\Http\Request;

class ServiceController extends Controller
{
    /**
     * Display a listing of the services.
     */
    public function index()
    {
        $services = Service::active()
            ->orderBy('sort_order')
            ->paginate(9);

        return view('services.index', compact('services'));
    }

    /**
     * Display the specified service.
     */
    public function details($id)
    {
        $service = Service::active()->findOrFail($id);
        
        // View count'u artır
        $service->incrementViewCount();

        // İlgili hizmetleri getir (aynı kategoriden veya rastgele)
        $relatedServices = Service::active()
            ->where('id', '!=', $id)
            ->where('service_category', $service->service_category)
            ->limit(5)
            ->get();

        // Eğer aynı kategoride yeterli hizmet yoksa, rastgele getir
        if ($relatedServices->count() < 5) {
            $additionalServices = Service::active()
                ->where('id', '!=', $id)
                ->whereNotIn('id', $relatedServices->pluck('id'))
                ->inRandomOrder()
                ->limit(5 - $relatedServices->count())
                ->get();
            
            $relatedServices = $relatedServices->concat($additionalServices);
        }

        return view('services.details', compact('service', 'relatedServices'));
    }
} 