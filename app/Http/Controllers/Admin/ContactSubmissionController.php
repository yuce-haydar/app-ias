<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ContactSubmission;
use Illuminate\Http\Request;

class ContactSubmissionController extends Controller
{
    /**
     * Display a listing of the contact submissions.
     */
    public function index()
    {
        $submissions = ContactSubmission::latest()->paginate(10);
        return view('admin.contact-submissions.index', compact('submissions'));
    }

    /**
     * Display the specified contact submission.
     */
    public function show(ContactSubmission $contactSubmission)
    {
        // Mark as read
        if ($contactSubmission->status === 'unread') {
            $contactSubmission->update(['status' => 'read']);
        }
        
        return view('admin.contact-submissions.show', compact('contactSubmission'));
    }

    /**
     * Remove the specified contact submission from storage.
     */
    public function destroy(ContactSubmission $contactSubmission)
    {
        $contactSubmission->delete();

        return redirect()->route('admin.contact-submissions.index')
                        ->with('success', 'İletişim formu başarıyla silindi.');
    }

    /**
     * Mark submission as replied.
     */
    public function markReplied(ContactSubmission $contactSubmission)
    {
        $contactSubmission->update([
            'status' => 'replied',
            'replied_at' => now()
        ]);

        return redirect()->back()
                        ->with('success', 'Form yanıtlandı olarak işaretlendi.');
    }

    /**
     * Update admin notes.
     */
    public function updateNotes(Request $request, ContactSubmission $contactSubmission)
    {
        $request->validate([
            'admin_notes' => 'nullable|string'
        ]);

        $contactSubmission->update([
            'admin_notes' => $request->admin_notes
        ]);

        return redirect()->back()
                        ->with('success', 'Notlar güncellendi.');
    }
}
