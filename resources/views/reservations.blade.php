@extends('layouts.mains.main_layout_reservations')

@section('content')
        <div class="container">  
            <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
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
                            <th></th>
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
                                <td scope="row">
                                    @if ($reservation->free_cancelation_date)
                                        <button class="btn btn-danger">Cancel</button>
                                    @endif
                                </td>
                            </tr>                       
                            @endforeach
                    </tbody>
                </table>
            </div>
        </div>
@endsection