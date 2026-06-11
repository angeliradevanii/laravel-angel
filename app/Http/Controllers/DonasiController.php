<?php

namespace App\Http\Controllers;

use App\Models\Campaign;
use App\Models\Donation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DonasiController extends Controller
{
    public function index()
    {
        $campaigns = Campaign::with(['account', 'categories'])
            ->latest()
            ->get();

        $donations = Donation::with('campaign')
            ->latest()
            ->take(6)
            ->get();

        return view('donasi', compact('campaigns', 'donations'));
    }

    public function create(Campaign $campaign)
    {
        $campaign->load(['account', 'categories']);

        return view('donation.create', compact('campaign'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'campaign_id' => 'required|exists:campaigns,id',
            'donor_name' => 'required|string|max:100',
            'amount' => 'required|numeric|min:1000',
            'message' => 'nullable|string|max:500',
        ]);

        DB::transaction(function () use ($validated) {
            $donation = Donation::create($validated);

            // Update total donasi terkumpul pada campaign setelah donasi dibuat
            $campaign = Campaign::findOrFail($donation->campaign_id);
            $campaign->increment('collected_donation', $donation->amount);
        });

        return redirect()->route('donasi')->with('success', 'Terima kasih, donasi berhasil disimpan!');
    }
}
