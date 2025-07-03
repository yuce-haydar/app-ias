<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Announcement;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AnnouncementController extends Controller
{
    /**
     * Display a listing of the announcements.
     */
    public function index()
    {
        $announcements = Announcement::latest()->paginate(10);
        return view('admin.announcements.index', compact('announcements'));
    }

    /**
     * Show the form for creating a new announcement.
     */
    public function create()
    {
        return view('admin.announcements.create');
    }

    /**
     * Store a newly created announcement in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'summary' => 'nullable|string|max:1000',
            'author' => 'nullable|string|max:255',
            'tags' => 'nullable|string|max:255',
            'category' => 'nullable|string|max:255',
            'announcement_type' => 'required|string|in:general,urgent,event,regulation',
            'importance' => 'required|string|in:low,normal,medium,high',
            'start_date' => 'required|date',
            'end_date' => 'nullable|date|after:start_date',
            'status' => 'required|string|in:draft,published',
            'published_at' => 'nullable|date',
            'is_pinned' => 'nullable|boolean',
            'attachments.*' => 'nullable|file|max:10240'
        ]);

        $data = $request->all();
        
        // is_pinned checkbox'ı boolean'a çevir
        $data['is_pinned'] = $request->has('is_pinned');
        $data['slug'] = \Illuminate\Support\Str::slug($request->title . '-' . time());
        
        // Default değerler
        $data['author'] = $data['author'] ?: 'Hatay İmar';
        $data['category'] = $data['category'] ?: 'Genel';
        
        // Status published ise ve published_at belirtilmemişse şu anki zamanı set et
        if ($data['status'] === 'published' && !$data['published_at']) {
            $data['published_at'] = now();
        }
        
        // Resim yükleme
        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('announcements/images', 'public');
        }
        
        // Attachments dosyalarını işle
        if ($request->hasFile('attachments')) {
            $attachments = [];
            foreach ($request->file('attachments') as $file) {
                $attachments[] = $file->store('announcements/attachments', 'public');
            }
            $data['attachments'] = $attachments;
        }

        Announcement::create($data);

        return redirect()->route('admin.announcements.index')
                        ->with('success', 'Duyuru başarıyla oluşturuldu.');
    }

    /**
     * Display the specified announcement.
     */
    public function show(Announcement $announcement)
    {
        return view('admin.announcements.show', compact('announcement'));
    }

    /**
     * Show the form for editing the specified announcement.
     */
    public function edit(Announcement $announcement)
    {
        return view('admin.announcements.edit', compact('announcement'));
    }

    /**
     * Update the specified announcement in storage.
     */
    public function update(Request $request, Announcement $announcement)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'summary' => 'nullable|string|max:1000',
            'author' => 'nullable|string|max:255',
            'tags' => 'nullable|string|max:255',
            'category' => 'nullable|string|max:255',
            'announcement_type' => 'required|string|in:general,urgent,event,regulation',
            'importance' => 'required|string|in:low,normal,medium,high',
            'start_date' => 'required|date',
            'end_date' => 'nullable|date|after:start_date',
            'status' => 'required|string|in:draft,published',
            'published_at' => 'nullable|date',
            'is_pinned' => 'nullable|boolean',
            'attachments.*' => 'nullable|file|max:10240'
        ]);

        $data = $request->all();
        
        // is_pinned checkbox'ı boolean'a çevir
        $data['is_pinned'] = $request->has('is_pinned');
        
        // Eğer title değiştiyse slug'ı güncelle
        if ($request->title !== $announcement->title) {
            $data['slug'] = \Illuminate\Support\Str::slug($request->title . '-' . time());
        }
        
        // Default değerler
        $data['author'] = $data['author'] ?: 'Hatay İmar';
        $data['category'] = $data['category'] ?: 'Genel';
        
        // Status published ise ve published_at belirtilmemişse şu anki zamanı set et
        if ($data['status'] === 'published' && !$announcement->published_at) {
            $data['published_at'] = now();
        }
        
        // Resim yükleme
        if ($request->hasFile('image')) {
            // Eski resmi sil
            if ($announcement->image) {
                Storage::disk('public')->delete($announcement->image);
            }
            $data['image'] = $request->file('image')->store('announcements/images', 'public');
        }
        
        // Attachments dosyalarını işle
        if ($request->hasFile('attachments')) {
            $attachments = [];
            foreach ($request->file('attachments') as $file) {
                $attachments[] = $file->store('announcements/attachments', 'public');
        }
            $data['attachments'] = $attachments;
        }

        $announcement->update($data);

        return redirect()->route('admin.announcements.index')
                        ->with('success', 'Duyuru başarıyla güncellendi.');
    }

    /**
     * Remove the specified announcement from storage.
     */
    public function destroy(Announcement $announcement)
    {
        // Resmi sil
        if ($announcement->image) {
            Storage::disk('public')->delete($announcement->image);
        }
        
        // Dosyaları sil
        if ($announcement->attachments) {
            foreach ($announcement->attachments as $attachment) {
                Storage::disk('public')->delete($attachment);
            }
        }

        $announcement->delete();

        return redirect()->route('admin.announcements.index')
                        ->with('success', 'Duyuru başarıyla silindi.');
    }
}
