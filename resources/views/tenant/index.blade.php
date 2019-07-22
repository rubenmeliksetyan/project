@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="card">
                    <div class="card-header">
                        <p>tenant</p>
                    </div>
                    <div class="card-body">
                        @foreach($tenants as $tenant)
                            <div class="card" style="width: 18rem; margin: 3rem;">
                                <img class="card-img-top" src="{{ asset('storage'.$tenant->image_name) }}" alt="Card image cap">
                                <div class="card-body">
                                    <p class="card-text">Address: {{ $tenant->address }}</p>
                                    <p class="card-text">Address: {{ $tenant->name }}</p>
                                </div>
                            </div>
                        @endforeach

                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

