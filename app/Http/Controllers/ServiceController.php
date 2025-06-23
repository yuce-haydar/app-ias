<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ServiceController extends Controller
{
    /**
     * Hizmetler sayfası
     */
    public function index()
    {
        return view('services.index');
    }

    /**
     * Hizmet detay sayfası
     */
    public function details($id)
    {
        return view('services.details', compact('id'));
    }
} 