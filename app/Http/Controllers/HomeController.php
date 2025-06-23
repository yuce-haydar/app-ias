<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Ana sayfa
     */
    public function index()
    {
        return view('home');
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