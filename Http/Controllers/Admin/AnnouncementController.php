<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Announcement;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class AnnouncementController extends Controller
{
    public function index()
    {
        $announcements = Announcement::latest()->paginate(20);
        return view('admin.announcements.index', compact('announcements'));
    }

    public function create()
    {
        return view('admin.announcements.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required',
            'announcement_type' => 'required|in:general,urgent,event,regulation',
            'importance' => 'required|in:low,medium,high',
            'start_date' => 'required|date',
            'end_date' => 'nullable|date|after_or_equal:start_date',
            'attachments.*' => 'nullable|file|mimes:pdf,doc,docx,xls,xlsx|max:10240',
            'status' => 'required|in:draft,published',
            'is_pinned' => 'boolean'
        ]);

        $validated['slug'] = Str::slug($validated['title']);
        $validated['is_pinned'] = $request->has('is_pinned');

        // Dosya yükleme
        if ($request->hasFile('attachments')) {
            $attachments = [];
            foreach ($request->file('attachments') as $file) {
                $path = $file->store('announcements/attachments', 'public');
                $attachments[] = [
                    'name' => $file->getClientOriginalName(),
                    'path' => $path,
                    'size' => $file->getSize()
                ];
            }
            $validated['attachments'] = $attachments;
        }

        Announcement::create($validated);

        return redirect()->route('admin.announcements.index')
            ->with('success', 'Duyuru başarıyla oluşturuldu.');
    }

    public function edit(Announcement $announcement)
    {
        return view('admin.announcements.edit', compact('announcement'));
    }

    public function update(Request $request, Announcement $announcement)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required',
            'announcement_type' => 'required|in:general,urgent,event,regulation',
            'importance' => 'required|in:low,medium,high',
            'start_date' => 'required|date',
            'end_date' => 'nullable|date|after_or_equal:start_date',
            'attachments.*' => 'nullable|file|mimes:pdf,doc,docx,xls,xlsx|max:10240',
            'status' => 'required|in:draft,published',
            'is_pinned' => 'boolean'
        ]);

        $validated['slug'] = Str::slug($validated['title']);
        $validated['is_pinned'] = $request->has('is_pinned');

        // Dosya yükleme
        if ($request->hasFile('attachments')) {
            // Eski dosyaları sil
            if ($announcement->attachments) {
                foreach ($announcement->attachments as $attachment) {
                    Storage::disk('public')->delete($attachment['path']);
                }
            }

            $attachments = [];
            foreach ($request->file('attachments') as $file) {
                $path = $file->store('announcements/attachments', 'public');
                $attachments[] = [
                    'name' => $file->getClientOriginalName(),
                    'path' => $path,
                    'size' => $file->getSize()
                ];
            }
            $validated['attachments'] = $attachments;
        }

        $announcement->update($validated);

        return redirect()->route('admin.announcements.index')
            ->with('success', 'Duyuru başarıyla güncellendi.');
    }

    public function destroy(Announcement $announcement)
    {
        // Dosyaları sil
        if ($announcement->attachments) {
            foreach ($announcement->attachments as $attachment) {
                Storage::disk('public')->delete($attachment['path']);
            }
        }

        $announcement->delete();

        return redirect()->route('admin.announcements.index')
            ->with('success', 'Duyuru başarıyla silindi.');
    }
}