@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="card">
                    <div class="card-header">
                        <p>Create Tenancy</p>
                    </div>
                    <div class="card-body">
                        <form method="post" action="{{ route('tenancy.store') }}">
                            <div class="form-group">
                                <label for="start_date">Start Date</label>
                                <input type="date" class="form-control  @error('start_date') is-invalid @enderror"
                                       name="start_date">
                            </div>
                            @error('start_date')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                            <div class="form-group">
                                <label for="end_date">End Date</label>
                                <input type="date" class="form-control  @error('end_date') is-invalid @enderror"
                                       name="end_date">
                            </div>
                            @error('end_date')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                            <div class="form-group">
                                <label for="monthly_rent">Monthly Rent</label>
                                <input type="number" class="form-control  @error('monthly_rent') is-invalid @enderror"
                                       min="0" step="0.1"
                                       name="monthly_rent">
                            </div>
                            @error('monthly_rent')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                            @csrf
                            <div class="form-group">
                                <label for="tenant id">Tenants</label>
                                <select class="js-example-basic-multiple large  @error('tenant_id') is-invalid @enderror"
                                        name="tenant_ids[]" multiple="multiple">
                                    @foreach($tenants as $k => $tenant)
                                        <option value="{{ $k}}">{{ $tenant }}</option>
                                    @endforeach
                                </select>
                                @error('tenant_id')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="property_id">Property</label>
                                <select class="form-group" name="property_id" id="">
                                    @foreach($properties as $k => $property)
                                        <option value="{{ $k }}">{{ $property}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <button type="submit" class="btn btn-primary">Assign To Property</button>
                            <hr>

                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection