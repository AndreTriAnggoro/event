<?php

namespace App\Http\Controllers;

use App\Models\Event;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use App\Models\Tag;
use App\Models\Gallery;

class DashboardController extends Controller
{
    public function index()
    {
        $totalEvents = Event::count();

        $mostFrequentCities = Event::select('city_id', DB::raw('count(*) as total'))
            ->groupBy('city_id')
            ->orderByDesc('total')
            ->get();

        $mostFrequentCities = $mostFrequentCities->filter(function ($city) use ($mostFrequentCities) {
            return $city->total === $mostFrequentCities->first()->total;
        });

        $mostFrequentCityNames = $mostFrequentCities->pluck('city.name');
        $mostFrequentCityEventCount = $mostFrequentCities->first()->total;

        $now = Carbon::now();

        $ongoingEvents = Event::where('start_datetime', '<=', $now)
            ->where('end_date', '>=', $now)
            ->orderBy('start_datetime')
            ->get();

        $mostFrequentTags = Tag::select('tags.name', DB::raw('count(*) as total'))
            ->join('event_tag', 'tags.id', '=', 'event_tag.tag_id')
            ->groupBy('tags.id', 'tags.name')
            ->orderByDesc('total')
            ->limit(5) // Ambil 5 tag teratas
            ->get();

        return view('dashboard', [
            'totalEvents' => $totalEvents,
            'mostFrequentCityNames' => $mostFrequentCityNames,
            'mostFrequentCityEventCount' => $mostFrequentCityEventCount,
            'ongoingEvents' => $ongoingEvents,
            'mostFrequentTags' => $mostFrequentTags,
        ]);
    }

}
