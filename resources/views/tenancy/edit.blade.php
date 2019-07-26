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

                        <div class="card" style="width: 18rem;">
                            <div class="card-header">
                                <select name="property" id="">
                                    <option value="{{ $tenancy->property->id }}">{{ $tenancy->property->name }}</option>
                                </select>
                            </div>
                            <ul class="list-group list-group-flush">
                                <li class="list-group-item">{{ $tenancy->start_date }}</li>
                                <li class="list-group-item">{{ $tenancy->end_date }}</li>
                                <li class="list-group-item">{{ $tenancy->monthly_rent }}</li>
                            </ul>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection