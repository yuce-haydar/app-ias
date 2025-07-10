<?php

namespace App\Http\Controllers;

use App\Models\GeneralJobApplication;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class GeneralJobApplicationController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'birth_date' => 'required|date|before:today',
            'gender' => 'required|in:male,female',
            'military_status' => 'nullable|in:completed,exempt,deferred',
            'profession' => 'required|string|max:255',
            'documents.*' => 'nullable|file|mimes:pdf,doc,docx,jpg,jpeg,png|max:10240', // 10MB max
            'notes' => 'nullable|string|max:2000',
        ]);

        $documents = [];
        
        // Belge yükleme işlemi
        if ($request->hasFile('documents')) {
            foreach ($request->file('documents') as $file) {
                $filename = time() . '_' . Str::random(10) . '.' . $file->getClientOriginalExtension();
                $path = $file->storeAs('general-job-applications', $filename, 'public');
                
                $documents[] = [
                    'original_name' => $file->getClientOriginalName(),
                    'filename' => $filename,
                    'path' => $path,
                    'size' => $file->getSize(),
                    'mime_type' => $file->getClientMimeType(),
                ];
            }
        }

        GeneralJobApplication::create([
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'birth_date' => $request->birth_date,
            'gender' => $request->gender,
            'military_status' => $request->military_status,
            'profession' => $request->profession,
            'documents' => $documents,
            'notes' => $request->notes,
            'status' => 'pending',
        ]);

        return redirect()->back()->with('success', 'Başvurunuz başarıyla gönderilmiştir. En kısa sürede tarafınızla iletişime geçilecektir.');
    }
}
