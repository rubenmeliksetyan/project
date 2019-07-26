@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="card">
                    <div class="card-header">
                        <p>Property</p>
                    </div>
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
                        @if(isset($property->tenancy->pivot))
                            <div class="form-group">
                                <label for="start_date">Start Date</label>
                                <input readonly type="date" class="form-control" name="start_date"
                                       value="{{ $property->tenancy->pivot->start_date }}">
                            </div>
                            <div class="form-group">
                                <label for="end_date">End Date</label>
                                <input readonly type="date" class="form-control" name="end_date"
                                       value="{{ $property->tenancy->pivot->end_date }}">
                            </div>
                            <div class="form-group">
                                <label for="monthly_rent">Monthly Rent</label>
                                <input readonly type="number" class="form-control" min="0" step="0.1"
                                       name="monthly_rent" value="{{ $property->tenancy->pivot->monthly_rent }}">
                            </div>
                            @if(isset($property->tenancy->tenant))
                                <h1>Property Tenant</h1>
                                <p>{{ $property->tenancy->tenant->name }}</p>
                                <p>{{ $property->tenancy->tenant->address }}</p>
                                <img class="card-img-top" src="{{ asset('storage'.$property->tenancy->tenant->image_name) }}"
                                     alt="Property image">
                            @endif
                        @else
                            <form method="post" action="{{ route('tenancy.store', $property->id) }}">

                                <div class="form-group">
                                    <label for="start_date">Start Date</label>
                                    <input type="date" class="form-control  @error('start_date') is-invalid @enderror" name="start_date">
                                </div>
                                @error('start_date')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                                <div class="form-group">
                                    <label for="end_date">End Date</label>
                                    <input type="date" class="form-control  @error('end_date') is-invalid @enderror" name="end_date">
                                </div>
                                @error('end_date')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                                <div class="form-group">
                                    <label for="monthly_rent">Monthly Rent</label>
                                    <input type="number" class="form-control  @error('monthly_rent') is-invalid @enderror" min="0" step="0.1"
                                           name="monthly_rent">
                                </div>
                                @error('monthly_rent')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                                @csrf
                                <select class="js-example-basic-multiple large @error('tenant_id') is-invalid @enderror" name="tenant_ids[]" multiple="multiple">
                                    @foreach($tenant as $value)
                                        <option value="{{ $value->id }}">{{ $value->name }}</option>
                                    @endforeach
                                </select>
                                @error('tenant_id')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror

                                <button type="submit" class="btn btn-primary">Assign To Property</button>
                                <hr>

                            </form>
                        @endif

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection