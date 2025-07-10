<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\GeneralJobApplication;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class GeneralJobApplicationController extends Controller
{
    public function index(Request $request)
    {
        $query = GeneralJobApplication::query()->orderBy('created_at', 'desc');

        // Filtreleme
        if ($request->has('status') && $request->status !== '') {
            $query->where('status', $request->status);
        }

        if ($request->has('gender') && $request->gender !== '') {
            $query->where('gender', $request->gender);
        }

        if ($request->has('search') && $request->search !== '') {
            $search = $request->search;
            $query->where(function ($q) use ($search) {
                $q->where('first_name', 'like', "%{$search}%")
                  ->orWhere('last_name', 'like', "%{$search}%")
                  ->orWhere('profession', 'like', "%{$search}%");
            });
        }

        $applications = $query->paginate(15);

        return view('admin.general-job-applications.index', compact('applications'));
    }

    public function show(GeneralJobApplication $application)
    {
        return view('admin.general-job-applications.show', compact('application'));
    }

    public function updateStatus(Request $request, GeneralJobApplication $application)
    {
        $request->validate([
            'status' => 'required|in:pending,reviewing,approved,rejected',
            'notes' => 'nullable|string|max:2000',
        ]);

        $application->update([
            'status' => $request->status,
            'notes' => $request->notes ?? $application->notes,
        ]);

        return redirect()->route('admin.general-job-applications.show', $application)
                         ->with('success', 'Başvuru durumu güncellendi.');
    }

    public function destroy(GeneralJobApplication $application)
    {
        // Belgeleri sil
        if ($application->documents) {
            foreach ($application->documents as $document) {
                Storage::disk('public')->delete($document['path']);
            }
        }

        $application->delete();

        return redirect()->route('admin.general-job-applications.index')
                         ->with('success', 'Başvuru silindi.');
    }

    public function downloadDocument(GeneralJobApplication $application, $index)
    {
        if (!isset($application->documents[$index])) {
            abort(404, 'Belge bulunamadı.');
        }

        $document = $application->documents[$index];
        $filePath = storage_path('app/public/' . $document['path']);

        if (!file_exists($filePath)) {
            abort(404, 'Belge dosyası bulunamadı.');
        }

        return response()->download($filePath, $document['original_name']);
    }
}
