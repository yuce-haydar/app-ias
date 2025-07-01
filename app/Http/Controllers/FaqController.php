<?php

namespace App\Http\Controllers;

use App\Models\Faq;
use Illuminate\Http\Request;

class FaqController extends Controller
{
    /**
     * Display FAQ page.
     */
    public function index()
    {
        $faqs = Faq::where('status', true)
            ->orderBy('sort_order')
            ->orderBy('created_at', 'desc')
            ->get()
            ->groupBy('category');

        return view('faq.index', compact('faqs'));
    }
} 