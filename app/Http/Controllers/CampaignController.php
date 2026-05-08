<?php

namespace App\Http\Controllers;

use App\Models\campaign;
use Illuminate\Http\Request;

class CampaignController extends Controller
{
    public function index()
    {
        $campaigns = campaign::latest()->get();
        return view('campaign.index', compact('campaigns'));
    }

    public function create()
    {
        return view('campaign.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title'              => 'required|string|max:255',
            'description'        => 'required|string',
            'target_donation'    => 'required|integer|min:0',
            'collected_donation' => 'nullable|integer|min:0',
            'deadline'           => 'required|date',
        ]);

        campaign::create([
            'title'              => $request->title,
            'description'        => $request->description,
            'target_donation'    => $request->target_donation,
            'collected_donation' => $request->collected_donation ?? 0,
            'deadline'           => $request->deadline,
        ]);

        return redirect()->route('campaign.index')->with('success', 'Campaign berhasil ditambahkan!');
    }

    public function edit($id)
    {
        $campaign = campaign::findOrFail($id);
        return view('campaign.edit', compact('campaign'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'title'              => 'required|string|max:255',
            'description'        => 'required|string',
            'target_donation'    => 'required|integer|min:0',
            'collected_donation' => 'nullable|integer|min:0',
            'deadline'           => 'required|date',
        ]);

        $campaign = campaign::findOrFail($id);
        $campaign->update([
            'title'              => $request->title,
            'description'        => $request->description,
            'target_donation'    => $request->target_donation,
            'collected_donation' => $request->collected_donation ?? 0,
            'deadline'           => $request->deadline,
        ]);

        return redirect()->route('campaign.index')->with('success', 'Campaign berhasil diperbarui!');
    }

    public function destroy($id)
    {
        $campaign = campaign::findOrFail($id);
        $campaign->delete();

        return redirect()->route('campaign.index')->with('success', 'Campaign berhasil dihapus!');
    }
}
