
@extends('layouts.mains.main_layout_excursions')

@section('content')
    <div class="album text-muted">
        <div class="container">
            <div class="album py-5 bg-body-tertiary">
                <div class="container">
                    <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
                        @foreach ($excursions->chunk(3) as $chunk)
                            @foreach ($chunk as $excursion)
                                <div class="col">
                                    <div class="card" style="width: 18rem;">
                                        <img class="card-img-top" src="https://picsum.photos/200/300" alt="Card image cap">
                                        <div class="card-body">
                                            <h1 class="ml-3 mt-3">{{ $excursion->country }}</h1>
                                            <h2 class="card-text ml-3">{{ $excursion->city }}</h2>
                                            <h3 class="card-text ml-3">Start: {{ date('d.m.Y', strtotime($excursion->start_date)) }}</h3>
                                            <h3 class="card-text ml-3">Prices from {{ $excursion->price }} lv</h3>
                                            <a href="{{ route('getExcursion', ['id' => $excursion->id]) }}" class="btn btn-primary ml-3 mb-3 mt-3">Go</a>
                                        </div>
                                    </div>
                                    <br>
                                </div>
                            @endforeach
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection


