<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Excursion;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ExcursionController extends Controller {
    
    public function index(Request $request, $startCity = null, $destination = null) {
        $today = Carbon::today()->toDateString();

        $query = DB::table('excursions')
        ->join('destinations', 'excursions.destination', '=', 'destinations.id')
        ->select(
            'excursions.*',
            'destinations.city',
            'destinations.country',
            DB::raw('DATEDIFF(excursions.end_date, excursions.start_date)-1 as total_nights')
        )
        ->where('excursions.start_date', '>', $today)
        ->orderBy('excursions.start_date', 'asc');

    
        if (!is_null($startCity)) {
            $query->where('excursions.start_city', $startCity);
        } elseif ($request->has('start_city')) {
            $query->where('excursions.start_city', $request->input('start_city'));
        }

    
        if ($request->has('destination')) {
            $query->where('destinations.id', $request->input('destination'));
        }
        
        $excursions = $query->distinct()->paginate(12);
        
        return view('layouts.excursions', compact('excursions'));
    }

    public function getSingle ($id) {
        $excursion = Excursion::join('destinations', 'excursions.destination', '=', 'destinations.id')
        ->select(
            'excursions.*',
            'destinations.city',
            'destinations.country',
            DB::raw('DATEDIFF(excursions.end_date, excursions.start_date)-1 as total_nights')
        )
        ->where('excursions.id', $id)
        ->firstOrFail();
         return view('layouts.single_excursion', ['excursion' => $excursion]);
    }
}
