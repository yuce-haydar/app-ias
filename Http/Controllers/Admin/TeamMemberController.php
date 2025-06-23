<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\TeamMember;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class TeamMemberController extends Controller
{
    public function index()
    {
        $teamMembers = TeamMember::orderBy('sort_order')->orderBy('name')->paginate(20);
        return view('admin.team-members.index', compact('teamMembers'));
    }

    public function create()
    {
        return view('admin.team-members.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'position' => 'required|string|max:255',
            'department' => 'nullable|string|max:255',
            'biography' => 'nullable',
            'photo' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
            'email' => 'nullable|email|max:255',
            'phone' => 'nullable|string|max:50',
            'linkedin' => 'nullable|url|max:255',
            'education' => 'nullable',
            'experience' => 'nullable',
            'skills' => 'nullable',
            'sort_order' => 'nullable|integer|min:0',
            'is_board_member' => 'boolean',
            'is_active' => 'boolean'
        ]);

        $validated['slug'] = Str::slug($validated['name']);
        $validated['is_board_member'] = $request->has('is_board_member');
        $validated['is_active'] = $request->has('is_active');

        // Fotoğraf yükleme
        if ($request->hasFile('photo')) {
            $validated['photo'] = $request->file('photo')->store('team-members', 'public');
        }

        TeamMember::create($validated);

        return redirect()->route('admin.team-members.index')
            ->with('success', 'Yönetim kurulu üyesi başarıyla eklendi.');
    }

    public function edit(TeamMember $teamMember)
    {
        return view('admin.team-members.edit', compact('teamMember'));
    }

    public function update(Request $request, TeamMember $teamMember)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'position' => 'required|string|max:255',
            'department' => 'nullable|string|max:255',
            'biography' => 'nullable',
            'photo' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
            'email' => 'nullable|email|max:255',
            'phone' => 'nullable|string|max:50',
            'linkedin' => 'nullable|url|max:255',
            'education' => 'nullable',
            'experience' => 'nullable',
            'skills' => 'nullable',
            'sort_order' => 'nullable|integer|min:0',
            'is_board_member' => 'boolean',
            'is_active' => 'boolean'
        ]);

        $validated['slug'] = Str::slug($validated['name']);
        $validated['is_board_member'] = $request->has('is_board_member');
        $validated['is_active'] = $request->has('is_active');

        // Fotoğraf yükleme
        if ($request->hasFile('photo')) {
            // Eski fotoğrafı sil
            if ($teamMember->photo) {
                Storage::disk('public')->delete($teamMember->photo);
            }
            $validated['photo'] = $request->file('photo')->store('team-members', 'public');
        }

        $teamMember->update($validated);

        return redirect()->route('admin.team-members.index')
            ->with('success', 'Yönetim kurulu üyesi başarıyla güncellendi.');
    }

    public function destroy(TeamMember $teamMember)
    {
        // Fotoğrafı sil
        if ($teamMember->photo) {
            Storage::disk('public')->delete($teamMember->photo);
        }

        $teamMember->delete();

        return redirect()->route('admin.team-members.index')
            ->with('success', 'Yönetim kurulu üyesi başarıyla silindi.');
    }
} 