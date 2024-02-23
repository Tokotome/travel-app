
@extends('layouts.mains.main_layout_excursions')

@section('content')
    <div class="album text-muted">
        <div class="container">
            <div class="album py-5 bg-body-tertiary">
                <div class="container">
                    <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
                        <div class="col">
                            <div class="card">
                                <div class="card-body">
                                    <div class="ml-5 mt-3"><strong>Country:</strong> {{ $excursion->country }}</div>
                                    <div class="ml-5"><strong>City:</strong> {{ $excursion->city }}</div>
                                    <div class="ml-5"><strong>Start from:</strong> {{ $excursion->start_city }}</div>
                                    <div class="ml-5"><strong>Start date:</strong> {{ date('d.m.Y', strtotime($excursion->start_date)) }}</div>
                                    <div class="ml-5"><strong>End date:</strong> {{ date('d.m.Y', strtotime($excursion->end_date)) }}</div>
                                    <div class="ml-5 mb-3"><strong>Total nights:</strong>{{$excursion->total_nights}} </div>
                                    <a href="{{ route('getHotels', ['destinationId' => $excursion->destination, 'excursionId' => $excursion->id]) }}" class="btn btn-primary ml-5 mb-3">Check hotels</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection