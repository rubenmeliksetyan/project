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
                        <div class="card" style="margin-bottom: 30px">
                            <img class="card-img-top" src="{{ asset('storage'.$property->image_name) }}"
                                 alt="Property image">
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
                        @if(isset($property->tenancy))
                            <div class="form-group">
                                <label for="start_date">Start Date</label>
                                <input type="date" class="form-control" name="start_date"
                                       value="{{ $property->tenancy->start_date }}">
                            </div>
                            <div class="form-group">
                                <label for="end_date">End Date</label>
                                <input type="date" class="form-control" name="end_date"
                                       value="{{ $property->tenancy->end_date }}">
                            </div>
                            <div class="form-group">
                                <label for="monthly_rent">Monthly Rent</label>
                                <input type="number" class="form-control" min="0" step="0.1"
                                       name="monthly_rent" value="{{ $property->tenancy->monthly_rent }}">
                            </div>
                        @else
                            <form action="{{ route('property.tenancy', $property->id) }}">
                                <div class="form-group">
                                    <label for="start_date">Start Date</label>
                                    <input type="date" class="form-control" name="start_date">
                                </div>
                                <div class="form-group">
                                    <label for="end_date">End Date</label>
                                    <input type="date" class="form-control" name="end_date">
                                </div>
                                <div class="form-group">
                                    <label for="monthly_rent">Monthly Rent</label>
                                    <input type="number" class="form-control" min="0" step="0.1"
                                           name="monthly_rent">
                                </div>
                                @csrf

                                <button type="submit" class="btn btn-primary">Assign To Property</button>
                                <hr>

                            </form>
                        @endif
                        {{--                        @isset($property->tenancy->tenant)--}}
                        <div class="card" style="width: 18rem; margin: 3rem;">
                            <img class="card-img-top"
                                 src="{{ asset('storage'.$property->tenancy->tenant->image_name) }}"
                                 alt="Card image cap">
                            <div class="card-body">
                                <p class="card-text">Address: {{ $property->tenancy->tenant->address }}</p>
                                <p class="card-text">Address: {{ $property->tenancy->tenant->name }}</p>
                            </div>
                        </div>
                        {{--                        @endisset--}}

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection