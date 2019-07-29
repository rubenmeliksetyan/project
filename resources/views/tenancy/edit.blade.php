@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        <p>Tenancy Edit</p>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('tenancy.update', $tenancy->id) }}" method="post">
                            @method('put')
                            @csrf
                            <div class="card" style="width: 18rem;">
                                <div class="card-header">
                                    <label for="property">Property Name</label>
                                    <select name="property_id" id="">
                                        @foreach($properties as $k => $property)
                                            <option value="{{ $k }}">{{ $property }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <ul class="list-group list-group-flush">
                                    <li class="list-group-item">
                                        <div class="form-group">
                                            <label for="start_date">Start Date</label>
                                            <input type="date"
                                                   class="form-control  @error('start_date') is-invalid @enderror"
                                                   name="start_date" value="{{ $tenancy->start_date }}">
                                        </div>
                                        @error('start_date')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </li>
                                    <li class="list-group-item">
                                        <div class="form-group">
                                            <label for="end_date">End Date</label>
                                            <input type="date"
                                                   class="form-control  @error('end_date') is-invalid @enderror"
                                                   name="end_date" value="{{ $tenancy->end_date }}">
                                        </div>
                                        @error('end_date')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </li>
                                    <li class="list-group-item">
                                        <div class="form-group">
                                            <label for="monthly_rent">Monthly Rent</label>
                                            <input type="number"
                                                   class="form-control  @error('monthly_rent') is-invalid @enderror"
                                                   min="0" step="0.1"
                                                   name="monthly_rent" value="{{ $tenancy->monthly_rent }}">
                                        </div>
                                        @error('monthly_rent')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </li>
                                    <li class="list-group-item">
                                        <label for="tenant_id">Tenants Name</label>
                                        <select class="js-example-basic-multiple large @error('tenant_id') is-invalid @enderror" name="tenant_ids[]" multiple="multiple">
                                            @foreach($tenancy->tenants as $tenant)
                                                <option value="{{ $tenant->id }}" selected> {{ $tenant->name }}</option>
                                            @endforeach
                                            @foreach($tenants as $k => $tenant)
                                                <option value="{{ $k }}" >{{ $tenant }}</option>
                                            @endforeach
                                        </select>

                                    </li>
                                    <li class="list-group-item">
                                        <button type="submit">Update Tenancy</button>
                                    </li>
                                </ul>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection