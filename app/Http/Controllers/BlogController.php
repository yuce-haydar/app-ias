<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BlogController extends Controller
{
    /**
     * Blog ızgara sayfası
     */
    public function grid()
    {
        return view('blog.grid');
    }

    /**
     * Blog liste sayfası
     */
    public function list()
    {
        return view('blog.list');
    }

    /**
     * Blog detay sayfası
     */
    public function details($id)
    {
        return view('blog.details', compact('id'));
    }
} 