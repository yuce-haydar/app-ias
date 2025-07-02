<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Announcement;

class AnnouncementController extends Controller
{
    /**
     * Duyuru listesi
     */
    public function index()
    {
        $announcements = Announcement::where('status', 'published')
            ->orderBy('published_at', 'desc')
            ->paginate(12);



        return view('announcements.index', compact('announcements'));
    }

    /**
     * Duyuru detayı
     */
    public function details($id)
    {
        $announcement = Announcement::where('status', 'published')
            ->findOrFail($id);

        // Görüntülenme sayısını artır
        $announcement->increment('view_count');

        // İlgili duyurular
        $relatedAnnouncements = Announcement::where('status', 'published')
            ->where('id', '!=', $id)
            ->where('category', $announcement->category)
            ->orderBy('published_at', 'desc')
            ->take(3)
            ->get();

        return view('announcements.details', compact('announcement', 'relatedAnnouncements'));
    }
} 