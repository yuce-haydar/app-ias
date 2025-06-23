<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PageController extends Controller
{
    /**
     * Hakkımızda sayfası
     */
    public function about()
    {
        return view('pages.about');
    }

    /**
     * Ekip sayfası
     */
    public function team()
    {
        return view('pages.team');
    }

    /**
     * Ekip detay sayfası
     */
    public function teamDetails($id)
    {
        return view('pages.team-details', compact('id'));
    }

    /**
     * Projeler sayfası
     */
    public function projects()
    {
        return view('pages.projects');
    }

    /**
     * Proje detay sayfası
     */
    public function projectDetails($id)
    {
        return view('pages.project-details', compact('id'));
    }

    /**
     * Galeri sayfası
     */
    public function gallery()
    {
        return view('pages.gallery');
    }

    /**
     * Referanslar sayfası
     */
    public function testimonial()
    {
        return view('pages.testimonial');
    }

    /**
     * Fiyatlandırma sayfası
     */
    public function pricing()
    {
        return view('pages.pricing');
    }

    /**
     * SSS sayfası
     */
    public function faq()
    {
        return view('pages.faq');
    }

    /**
     * 404 sayfası
     */
    public function notFound()
    {
        return view('pages.404');
    }

    /**
     * Şartlar ve koşullar sayfası
     */
    public function terms()
    {
        return view('pages.terms');
    }

    /**
     * Gizlilik politikası sayfası
     */
    public function privacy()
    {
        return view('pages.privacy');
    }

    /**
     * Yasal sayfası
     */
    public function legal()
    {
        return view('pages.legal');
    }
} 