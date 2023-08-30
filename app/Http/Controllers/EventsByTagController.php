<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tag;

class EventsByTagController extends Controller
{
    public function index($tagName)
    {
        $tag = Tag::where('slug', $tagName)->firstOrFail();
        $events = $tag->events;

        $mostFrequentTags = Tag::withCount('events')
            ->orderByDesc('events_count')
            ->take(1)
            ->get();

        $secondMostFrequentTags = Tag::withCount('events')
            ->orderByDesc('events_count')
            ->skip(1)
            ->take(1)
            ->get();

        return view('events-by-tag', compact('tag', 'events', 'mostFrequentTags', 'secondMostFrequentTags'));
    }
}
