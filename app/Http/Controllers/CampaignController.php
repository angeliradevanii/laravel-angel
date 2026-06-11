<?php

namespace App\Http\Controllers;

use App\Models\Campaign;
use App\Models\Category;
use Illuminate\Http\Request;

class CampaignController extends Controller
{
    public function index()
    {
        $campaigns = Campaign::with(['account', 'categories', 'donations'])->latest()->get();

        return view('campaign.index', compact('campaigns'));
    }

    public function create()
    {
        $categories = Category::orderBy('name')->get();

        return view('campaign.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'target_donation' => 'required|numeric|min:0',
            'collected_donation' => 'nullable|numeric|min:0',
            'deadline' => 'required|date',
            'bank_name' => 'required|string|max:100',
            'account_number' => 'required|string|max:50',
            'account_holder' => 'required|string|max:100',
            'categories' => 'nullable|array',
            'categories.*' => 'exists:categories,id',
        ]);

        $campaign = Campaign::create([
            'title' => $validated['title'],
            'description' => $validated['description'],
            'target_donation' => $validated['target_donation'],
            'collected_donation' => $validated['collected_donation'] ?? 0,
            'deadline' => $validated['deadline'],
        ]);

        // Simpan relasi One-to-One untuk rekening campaign
        $campaign->account()->create([
            'bank_name' => $validated['bank_name'],
            'account_number' => $validated['account_number'],
            'account_holder' => $validated['account_holder'],
        ]);

        // Simpan relasi Many-to-Many untuk kategori campaign
        $campaign->categories()->attach($validated['categories'] ?? []);

        return redirect()->route('campaign.index')->with('success', 'Campaign berhasil ditambahkan!');
    }

    public function edit(Campaign $campaign)
    {
        $campaign->load(['account', 'categories']);
        $categories = Category::orderBy('name')->get();

        return view('campaign.edit', compact('campaign', 'categories'));
    }

    public function update(Request $request, Campaign $campaign)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'target_donation' => 'required|numeric|min:0',
            'collected_donation' => 'nullable|numeric|min:0',
            'deadline' => 'required|date',
            'bank_name' => 'required|string|max:100',
            'account_number' => 'required|string|max:50',
            'account_holder' => 'required|string|max:100',
            'categories' => 'nullable|array',
            'categories.*' => 'exists:categories,id',
        ]);

        $campaign->update([
            'title' => $validated['title'],
            'description' => $validated['description'],
            'target_donation' => $validated['target_donation'],
            'collected_donation' => $validated['collected_donation'] ?? 0,
            'deadline' => $validated['deadline'],
        ]);

        $campaign->account()->updateOrCreate(
            ['campaign_id' => $campaign->id],
            [
                'bank_name' => $validated['bank_name'],
                'account_number' => $validated['account_number'],
                'account_holder' => $validated['account_holder'],
            ]
        );

        $campaign->categories()->sync($validated['categories'] ?? []);

        return redirect()->route('campaign.index')->with('success', 'Campaign berhasil diperbarui!');
    }

    public function destroy(Campaign $campaign)
    {
        $campaign->delete();

        return redirect()->route('campaign.index')->with('success', 'Campaign berhasil dihapus!');
    }
}
