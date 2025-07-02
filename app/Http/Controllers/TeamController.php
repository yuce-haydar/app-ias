<?php

namespace App\Http\Controllers;

use App\Models\TeamMember;
use Illuminate\Http\Request;

class TeamController extends Controller
{
    /**
     * Display a listing of the team members.
     */
    public function index()
    {
        
        $teamMembers = TeamMember::where('status', true)
            ->orderBy('sort_order')
            ->orderBy('name')
            ->paginate(12);

        return view('team.index', compact('teamMembers'));
    }

    /**
     * Display the specified team member.
     */
    public function details($id)
    {
        $teamMember = TeamMember::where('status', true)
            ->findOrFail($id);

        // İlgili ekip üyelerini getir (aynı departmandan)
        $relatedMembers = TeamMember::where('status', true)
            ->where('id', '!=', $id)
            ->where('designation', $teamMember->designation)
            ->limit(4)
            ->get();

        return view('team.details', compact('teamMember', 'relatedMembers'));
    }
} 