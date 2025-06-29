<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\TeamMember;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class TeamMemberController extends Controller
{
    /**
     * Display a listing of the team members.
     */
    public function index()
    {
        $teamMembers = TeamMember::ordered()->paginate(10);
        return view('admin.team-members.index', compact('teamMembers'));
    }

    /**
     * Show the form for creating a new team member.
     */
    public function create()
    {
        return view('admin.team-members.create');
    }

    /**
     * Store a newly created team member in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'position' => 'required|string|max:255',
            'designation' => 'required|string|max:255',
            'description' => 'nullable|string',
            'bio' => 'nullable|string',
            'image' => 'nullable|image|max:2048',
            'email' => 'nullable|email|max:255',
            'phone' => 'nullable|string|max:20',
            'social_facebook' => 'nullable|url',
            'social_twitter' => 'nullable|url',
            'social_linkedin' => 'nullable|url',
            'social_instagram' => 'nullable|url',
            'experience_years' => 'nullable|integer|min:0',
            'education' => 'nullable|array',
            'specialties' => 'nullable|array',
            'status' => 'boolean',
            'sort_order' => 'nullable|integer|min:0'
        ]);

        $data = $request->all();
        
        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('team-members', 'public');
        }

        // Education ve specialties'i array'a çevir
        if (isset($data['education']) && is_string($data['education'])) {
            $data['education'] = array_filter(explode("\n", $data['education']));
        }
        if (isset($data['specialties']) && is_string($data['specialties'])) {
            $data['specialties'] = array_filter(explode("\n", $data['specialties']));
        }

        $data['status'] = $request->has('status');
        $data['sort_order'] = $data['sort_order'] ?? 0;
        $data['slug'] = \Illuminate\Support\Str::slug($request->name . '-' . time());

        TeamMember::create($data);

        return redirect()->route('admin.team-members.index')
                        ->with('success', 'Ekip üyesi başarıyla oluşturuldu.');
    }

    /**
     * Display the specified team member.
     */
    public function show(TeamMember $teamMember)
    {
        return view('admin.team-members.show', compact('teamMember'));
    }

    /**
     * Show the form for editing the specified team member.
     */
    public function edit(TeamMember $teamMember)
    {
        return view('admin.team-members.edit', compact('teamMember'));
    }

    /**
     * Update the specified team member in storage.
     */
    public function update(Request $request, TeamMember $teamMember)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'position' => 'required|string|max:255',
            'designation' => 'required|string|max:255', 
            'description' => 'nullable|string',
            'bio' => 'nullable|string',
            'image' => 'nullable|image|max:2048',
            'email' => 'nullable|email|max:255',
            'phone' => 'nullable|string|max:20',
            'social_facebook' => 'nullable|url',
            'social_twitter' => 'nullable|url',
            'social_linkedin' => 'nullable|url',
            'social_instagram' => 'nullable|url',
            'experience_years' => 'nullable|integer|min:0',
            'education' => 'nullable|array',
            'specialties' => 'nullable|array',
            'status' => 'boolean',
            'sort_order' => 'nullable|integer|min:0'
        ]);

        $data = $request->all();
        
        if ($request->hasFile('image')) {
            if ($teamMember->image) {
                Storage::disk('public')->delete($teamMember->image);
            }
            $data['image'] = $request->file('image')->store('team-members', 'public');
        }

        // Education ve specialties'i array'a çevir
        if (isset($data['education']) && is_string($data['education'])) {
            $data['education'] = array_filter(explode("\n", $data['education']));
        }
        if (isset($data['specialties']) && is_string($data['specialties'])) {
            $data['specialties'] = array_filter(explode("\n", $data['specialties']));
        }

        $data['status'] = $request->has('status');
        $data['sort_order'] = $data['sort_order'] ?? 0;
        
        // Eğer name değiştiyse slug'ı güncelle
        if ($request->name !== $teamMember->name) {
            $data['slug'] = \Illuminate\Support\Str::slug($request->name . '-' . time());
        }

        $teamMember->update($data);

        return redirect()->route('admin.team-members.index')
                        ->with('success', 'Ekip üyesi başarıyla güncellendi.');
    }

    /**
     * Remove the specified team member from storage.
     */
    public function destroy(TeamMember $teamMember)
    {
        if ($teamMember->image) {
            Storage::disk('public')->delete($teamMember->image);
        }
        
        $teamMember->delete();

        return redirect()->route('admin.team-members.index')
                        ->with('success', 'Ekip üyesi başarıyla silindi.');
    }
}
