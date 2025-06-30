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
            'announcement_type' => 'required|string|in:general,urgent,event,regulation',
            'importance' => 'required|string|in:low,normal,medium,high',
            'start_date' => 'required|date',
            'end_date' => 'nullable|date|after:start_date',
            'status' => 'required|string|in:draft,published',
            'is_pinned' => 'nullable|boolean',
            'attachments.*' => 'nullable|file|max:10240'
        ]);

        $data = $request->all();
        
        // is_pinned checkbox'ı boolean'a çevir
        $data['is_pinned'] = $request->has('is_pinned');
        $data['slug'] = \Illuminate\Support\Str::slug($request->title . '-' . time());
        
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
            'announcement_type' => 'required|string|in:general,urgent,event,regulation',
            'importance' => 'required|string|in:low,normal,medium,high',
            'start_date' => 'required|date',
            'end_date' => 'nullable|date|after:start_date',
            'status' => 'required|string|in:draft,published',
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
        if ($announcement->image) {
            Storage::disk('public')->delete($announcement->image);
        }
        
        $announcement->delete();

        return redirect()->route('admin.announcements.index')
                        ->with('success', 'Duyuru başarıyla silindi.');
    }
}
