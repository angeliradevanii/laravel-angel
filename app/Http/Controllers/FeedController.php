<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Feed;

class FeedController extends Controller
{
    public function index(Request $request)
    {
        $feeds = Feed::query()
        ->when($request->filled('search'), function ($query) use ($request){
            return $query->where('tittle', 'like', '%');
        })

        ->when($request->filled('min_like'), function ($query) use ($request){
            return $query->where('likeFeed', '>=', $request->min_like);
        })

        ->latest()
        ->paginate(10)
        ->withQueryString();

        return view('feeds.index', compact('feeds'));
    }
}
