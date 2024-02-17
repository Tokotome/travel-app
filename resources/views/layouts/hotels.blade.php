@extends('layouts.mains.main_layout_hotels')

@section('content')

        <div class="container">  
            <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Name</th>
                            <th scope="col">Category</th>
                            <th scope="col">Amenities</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                            @php
                                $count = 1;
                            @endphp
                            @foreach ($hotels as $hotel)
                            <tr>
                                <th scope="row">{{ $count++ }}</th>
                                <td>{{$hotel->name}}</td>
                                <td>{{$hotel->category}}</td>
                                <td>
                                @if ($hotel->has_pool)
                                    pool
                                    @if ($hotel->has_fitness)
                                        ,
                                    @endif
                                @endif
                                @if ($hotel->has_fitness)
                                    fitness
                                @endif
                                </td>
                                <td>
                                    <a href="" class="btn btn-primary ml-5 mb-3">Book</a>
                                </td>
                            </tr>                       
                            @endforeach
                    </tbody>
                </table>
            </div>
        </div>
@endsection