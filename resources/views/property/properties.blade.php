@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="card">
                    <div class="card-header">
                        <p>Properties</p>
                    </div>
                    @csrf
                    <div class="card-body">

                        @if($properties->count() > 0)

                            @foreach($properties as $property)

                                <div class="card" style="margin-bottom: 30px">
                                    <a href="{{ route('property.edit', $property->id) }}">
                                        <img class="card-img-top" src="{{ asset('storage'.$property->image_name) }}"
                                             alt="Property image">
                                    </a>
                                    <div class="card-body">
                                        <h5 class="card-title">Name: {{ $property->name }}</h5>
                                        <p class="card-text">Address: {{ $property->address }}</p>
                                    </div>
                                    <ul class="list-group list-group-flush">
                                        <li class="list-group-item">Property Value: {{ $property->property_value }}$
                                        </li>
                                        <li class="list-group-item">Mortgage: {{ $property->mortgage }} $</li>
                                    </ul>

                                </div>
                            @endforeach
                        @else
                            <h1>There aren't any property yet...</h1>
                            <p>please create one </p>
                        @endif


                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection