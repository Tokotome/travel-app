<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Excursion;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ExcursionController extends Controller
{
    public function index() {
        
    }

    public function getExcursions($startCity, Request $request) {
        $today = Carbon::today()->toDateString();

        $query = DB::table('excursions')
            ->join('destinations', 'excursions.destination', '=', 'destinations.id')
            ->select(
                'excursions.id',
                'excursions.start_date',
                'excursions.end_date',
                'excursions.start_city',
                'excursions.price',
                'destinations.city',
                'destinations.country',
                DB::raw('DATEDIFF(excursions.end_date, excursions.start_date)-1 as total_nights')
            )
            ->where('excursions.start_city', $startCity)
            ->where('excursions.start_date', '>', $today) // Filter by start_date larger than today
            ->orderBy('excursions.start_date', 'asc');

        // Add a condition to filter by destination if provided in the request
        if ($request->has('destination')) {
            $query->where('destinations.id', $request->input('destination'));
        }
        
        $excursions = $query->distinct()->get();
        
        return $excursions;
        }
}
