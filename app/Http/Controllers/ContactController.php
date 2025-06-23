<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ContactController extends Controller
{
    /**
     * İletişim sayfası
     */
    public function index()
    {
        return view('contact.index');
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