<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Facility;
use App\Models\Project;
use App\Models\ContactSettings;

class ContactController extends Controller
{
    /**
     * İletişim sayfası
     */
    public function index()
    {
        // İletişim sayfasında gösterilecek tesisler (öne çıkan 4 tane)
        $facilities = Facility::where('status', 'active')
                            ->where('is_featured', true)
                            ->take(4)
                            ->get();
        
        // İletişim sayfasında gösterilecek projeler (öne çıkan 4 tane)  
        $projects = Project::where('is_featured', true)
                          ->take(4)
                          ->get();
        
        // İletişim ayarlarını al
        $contactSettings = ContactSettings::getSettings();
        
        return view('contact.index', [
            'facilities' => $facilities,
            'projects' => $projects,
            'contactSettings' => $contactSettings
        ]);
    }

    /**
     * İletişim formu gönderimi
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'subject' => 'required|string|max:255',
            'message' => 'required|string',
        ]);

        // Burada e-posta gönderme işlemi yapılabilir
        // Mail::to('info@nexta.com.tr')->send(new ContactMail($request->all()));

        return redirect()->back()->with('success', 'Mesajınız başarıyla gönderildi. En kısa sürede size dönüş yapacağız.');
    }

    /**
     * Bülten aboneliği
     */
    public function newsletter(Request $request)
    {
        $request->validate([
            'email' => 'required|email|max:255',
        ]);

        // Burada veritabanına kaydetme işlemi yapılabilir
        // Newsletter::create(['email' => $request->email]);

        return redirect()->back()->with('success', 'Bülten aboneliğiniz başarıyla oluşturuldu.');
    }
} 