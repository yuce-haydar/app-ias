<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Project;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $projects = Project::orderBy('sort_order', 'asc')
            ->orderBy('created_at', 'desc')
            ->paginate(10);
            
        return view('admin.projects.index', compact('projects'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.projects.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'short_description' => 'required|string',
            'description' => 'required|string',
            'project_type' => 'required|string',
            'status' => 'required|in:planned,ongoing,completed',
            'start_date' => 'nullable|date',
            'completion_date' => 'nullable|date',
            'budget' => 'nullable|numeric',
            'contractor' => 'nullable|string',
            'features' => 'nullable|array',
            'technical_specs' => 'nullable|array',
            'location' => 'nullable|string',
            'latitude' => 'nullable|numeric',
            'longitude' => 'nullable|numeric',
            'progress_percentage' => 'nullable|integer|min:0|max:100',
            'sort_order' => 'nullable|integer',
            'is_featured' => 'boolean',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'gallery.*' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);

        // Handle image upload
        if ($request->hasFile('image')) {
            $validated['image'] = $request->file('image')->store('projects', 'public');
        }

        // Handle gallery upload
        if ($request->hasFile('gallery')) {
            $gallery = [];
            foreach ($request->file('gallery') as $file) {
                $gallery[] = $file->store('projects/gallery', 'public');
            }
            $validated['gallery'] = $gallery;
        }

        Project::create($validated);

        return redirect()->route('admin.projects.index')
            ->with('success', 'Proje başarıyla oluşturuldu.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $project = Project::findOrFail($id);
        return view('admin.projects.show', compact('project'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $project = Project::findOrFail($id);
        return view('admin.projects.edit', compact('project'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $project = Project::findOrFail($id);
        
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'short_description' => 'required|string',
            'description' => 'required|string',
            'project_type' => 'required|string',
            'status' => 'required|in:planned,ongoing,completed',
            'start_date' => 'nullable|date',
            'completion_date' => 'nullable|date',
            'budget' => 'nullable|numeric',
            'contractor' => 'nullable|string',
            'features' => 'nullable|array',
            'technical_specs' => 'nullable|array',
            'location' => 'nullable|string',
            'latitude' => 'nullable|numeric',
            'longitude' => 'nullable|numeric',
            'progress_percentage' => 'nullable|integer|min:0|max:100',
            'sort_order' => 'nullable|integer',
            'is_featured' => 'boolean',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'gallery.*' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);

        // Handle image upload
        if ($request->hasFile('image')) {
            // Delete old image
            if ($project->image) {
                Storage::disk('public')->delete($project->image);
            }
            $validated['image'] = $request->file('image')->store('projects', 'public');
        }

        // Handle gallery upload
        if ($request->hasFile('gallery')) {
            $gallery = $project->gallery ?? [];
            foreach ($request->file('gallery') as $file) {
                $gallery[] = $file->store('projects/gallery', 'public');
            }
            $validated['gallery'] = $gallery;
        }

        $project->update($validated);

        return redirect()->route('admin.projects.index')
            ->with('success', 'Proje başarıyla güncellendi.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $project = Project::findOrFail($id);
        
        // Delete image
        if ($project->image) {
            Storage::disk('public')->delete($project->image);
        }
        
        // Delete gallery images
        if ($project->gallery) {
            foreach ($project->gallery as $image) {
                Storage::disk('public')->delete($image);
            }
        }
        
        $project->delete();

        return redirect()->route('admin.projects.index')
            ->with('success', 'Proje başarıyla silindi.');
    }
}
