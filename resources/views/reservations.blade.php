@extends('layouts.mains.main_layout_reservations')

@section('content')
        <div class="container">  
            <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
            @if (empty($reservations))
                <div class="alert alert-info text-center mt-5" role="alert">
                    No reservations found.
                </div>
            @else
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Booked at</th>
                            <th scope="col">Country</th>
                            <th scope="col">City</th>
                            <th scope="col">Start</th>
                            <th scope="col">End</th>
                            <th scope="col">Total nights</th>
                            <th scope="col">Cancel</th>
                            <th scope="col">Days left</th>
                        </tr>
                    </thead>
                    <tbody>
                            @php
                                $count = 1;
                            @endphp
                            @foreach ($reservations as $reservation)
                            <tr>
                                <td scope="row">{{ $count++ }}</th>
                                <td scope="row">{{$reservation->created_at}}</td>
                                <td scope="row">{{$reservation->country}}</td>
                                <td scope="row">{{$reservation->city}}</td>
                                <td scope="row">{{$reservation->start_date}}</td>
                                <td scope="row">{{$reservation->end_date}}</td>
                                <td scope="row">{{$reservation->total_nights}}</td>
                                <td scope="row float-right">
                                    @if ($reservation->free_cancelation_date && $reservation->status == 5)
                                        <form method="POST" action="{{ route('reservations.update', ['reservationId' => $reservation->id]) }}">
                                            @csrf
                                            @method('PUT')
                                                <input type="hidden" name="reservationId" value="{{ $reservation->id }}">
                                                <button type="submit" class="btn btn-secondary">Cancel</button>
                                        </form>
                                    @endif

                                    @if ($reservation->status == 6)
                                        <span class="text-right">Cancelled on</span>
                                        <span class="text-right">{{$reservation->updated_at}}</span> 
                                    @endif
                                </td>
                                <td>
                                    @if ($reservation->status == 5 && $reservation->days_left > 1)
                                        {{$reservation->days_left}} days until the start 
                                    @endif

                                    @if ($reservation->status == 5 && $reservation->days_left == 1)
                                        {{$reservation->days_left}} day until the start 
                                    @endif

                                    @if ($reservation->status == 6)
                                        <form method="POST" action="{{ route('reservations.destroy', ['reservationId' => $reservation->id]) }}">
                                            @csrf
                                            @method('DELETE')
                                                <input type="hidden" name="reservationId" value="{{ $reservation->id }}">
                                                <button type="submit" class="btn btn-secondary">Delete the row</button>
                                        </form>
                                    @endif
                                </td>
                            </tr>                       
                            @endforeach
                    </tbody>
                </table>
                @endif
                <!-- Pagination links -->
                <div class="col-12 mt-3">
                    {{ $reservations->links() }}
                    <p>Total Pages: {{ $reservations->lastPage() }}</p> <!-- Display total pages -->
                </div>
            </div>
        </div>
@endsection
