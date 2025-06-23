<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ContactSubmission;
use Illuminate\Http\Request;

class ContactSubmissionController extends Controller
{
    public function index(Request $request)
    {
        $query = ContactSubmission::query();

        // Filtreleme
        if ($request->has('status') && $request->status !== '') {
            if ($request->status === 'read') {
                $query->where('is_read', true);
            } elseif ($request->status === 'unread') {
                $query->where('is_read', false);
            }
        }

        if ($request->has('search') && $request->search !== '') {
            $search = $request->search;
            $query->where(function ($q) use ($search) {
                $q->where('name', 'like', "%{$search}%")
                  ->orWhere('email', 'like', "%{$search}%")
                  ->orWhere('subject', 'like', "%{$search}%")
                  ->orWhere('message', 'like', "%{$search}%");
            });
        }

        $submissions = $query->latest()->paginate(20);

        return view('admin.contact-submissions.index', compact('submissions'));
    }

    public function show(ContactSubmission $submission)
    {
        // Mesajı okundu olarak işaretle
        if (!$submission->is_read) {
            $submission->update(['is_read' => true]);
        }

        return view('admin.contact-submissions.show', compact('submission'));
    }

    public function markAsRead(ContactSubmission $submission)
    {
        $submission->update(['is_read' => true]);

        return redirect()->back()->with('success', 'Mesaj okundu olarak işaretlendi.');
    }

    public function destroy(ContactSubmission $submission)
    {
        $submission->delete();

        return redirect()->route('admin.contact-submissions.index')
            ->with('success', 'Mesaj başarıyla silindi.');
    }

    public function bulkAction(Request $request)
    {
        $request->validate([
            'action' => 'required|in:mark_read,delete',
            'submissions' => 'required|array',
            'submissions.*' => 'exists:contact_submissions,id'
        ]);

        $submissions = ContactSubmission::whereIn('id', $request->submissions);

        switch ($request->action) {
            case 'mark_read':
                $submissions->update(['is_read' => true]);
                $message = 'Seçilen mesajlar okundu olarak işaretlendi.';
                break;
            case 'delete':
                $submissions->delete();
                $message = 'Seçilen mesajlar silindi.';
                break;
        }

        return redirect()->route('admin.contact-submissions.index')
            ->with('success', $message);
    }
} 