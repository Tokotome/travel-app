<?php

namespace App\Http\Controllers;

use App\Models\Destination;
use Illuminate\Http\Request;

class DestinationController extends Controller
{
    public function index() {
        $destinations = Destination::select('id', 'country', 'city')->get();

        $formattedDestinations = $destinations->mapWithKeys(function ($destination, $index) {
            return [$index => [
                'id' => $destination->id,
                'country' => $destination->country,
                'city' => $destination->city
            ]];
        });
        
        return response()->json(['destinations' => $formattedDestinations]);
    }

    public function cities($country) {
    $cities = Destination::where('country', $country)->distinct()->get(['id', 'city']);
    
    $formattedCities = [];
    
    foreach ($cities as $city) {
        $formattedCities[] = [
            'id' => $city->id,
            'city' => $city->city
        ];
    }
    
        return response()->json(['cities' => $formattedCities]);
    }
}
