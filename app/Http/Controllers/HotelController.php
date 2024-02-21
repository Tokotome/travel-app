<?php

namespace App\Http\Controllers;

use App\Models\Hotel;
use Illuminate\Http\Request;

class HotelController extends Controller
{
    public function index() {
        
    }

    public function getHotels($destination, Request $request) {
        $query = Hotel::where('destination', $destination);

        if ($request->has('has_pool')) {
            $query->where('has_pool', $request->input('has_pool'));
        }

        if ($request->has('has_fitness')) {
            $query->where('has_fitness', $request->input('has_fitness'));
        }

        if ($request->has('category')) {
            $query->where('category', $request->input('category'));
        }
        
        $query->orderBy('category', 'asc');
        $hotels = $query->get();
        return view('layouts.hotels', ['hotels' => $hotels]);
    }
}
