<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Excursion;
use App\Models\Reservation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\ReservationRequest;

class ReservationController extends Controller
{

    public function index() {
        
        $user = Auth::user();
        if ($user) {
           
            $query = DB::table('reservations')
            ->join('excursions', 'reservations.excursion_id', '=', 'excursions.id')
            ->join('destinations', 'excursions.destination', '=', 'destinations.id')
            ->select(
                'reservations.free_cancelation_date as free_cancelation_date',
                'reservations.status as status',
                 DB::raw("DATE_FORMAT(reservations.created_at, '%d.%m.%Y') as created_at"),
                'reservations.status as status',
                 DB::raw("DATE_FORMAT(excursions.start_date, '%d.%m.%Y') as start_date"),
                 DB::raw("DATE_FORMAT(excursions.end_date, '%d.%m.%Y') as end_date"),
                 DB::raw("DATEDIFF(excursions.end_date, excursions.start_date)-1 as total_nights"),
                'destinations.country as country',
                'destinations.city as city',
            )
            ->orderBy('excursions.start_date', 'asc');
            $reservations = $query->distinct()->get();
            
            return view('reservations', compact('reservations'));
        } else {

            return redirect()->route('login')->with('error', 'Please log in to view your reservations.');
        }
    }

    public function edit() {
        
    }

    public function store(ReservationRequest $request)
    {
        $user = Auth::user();
        $excursion = Excursion::find($request->excursionId);
    
        if ($user) {
            $reservation = new Reservation();

            // Assign values to its properties
            $reservation->user_id = $user->id; 
            $reservation->excursion_id = $request->input('excursionId');
            $reservation->hotel_id = $request->input('hotelId');
            
            $startDate = Carbon::parse($excursion->start_date);
            $currentDate = Carbon::now();
            $daysDifference = $currentDate->diffInDays($startDate);
            
            if($daysDifference > 14) {
                $reservation->free_cancelation_date = $this->setFreeCancelationDate($startDate);
            }

            $reservation->status = $this->setBookedToReservation();
            $reservation->save();
            return redirect()->route('views.reservations')->with('success', 'Reservation created successfully!');
        } else {
            
           return redirect()->route('login')->with('error', 'Please log in to make a reservation.');
        }

    }

    private function setFreeCancelationDate($startDate) {
        $startDate = Carbon::parse($startDate);
        $freeCancellationDate = $startDate->subDays(14)->format('Y-m-d');
        return $freeCancellationDate;
    }

    private function setBookedToReservation() {  
        $statusBooked = 5;
        return $statusBooked;
    }
}
