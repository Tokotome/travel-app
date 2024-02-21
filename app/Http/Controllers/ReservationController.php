<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Excursion;
use App\Models\Reservation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ReservationController extends Controller
{

    public function index() {
       
    }

    public function edit() {
        
    }

    public function store(Request $request)
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
            //return redirect()->route('views.reservations')->with('success', 'Reservation created successfully!');
        } else {
            
           return redirect()->route('login')->with('error', 'Please log in to make a reservation.');
        }

    }

    private function setFreeCancelationDate($startDate) {
        $startDate = Carbon::parse($startDate);
        
        return $freeCancellationDate = $startDate->subDays(14)->format('Y-m-d');
    }

    private function setBookedToReservation() {  
        $statusBooked = 5;
        return $statusBooked;
    }
}
