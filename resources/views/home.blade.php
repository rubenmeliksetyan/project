@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        <p>Dashboard</p>

                    </div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif
                        <h1>Create Property</h1>

                        <form method="POST" action="{{ route('property.store') }}" enctype="multipart/form-data">

                            <div class="form-group">
                                <label for="image">Property image</label>
                                <input type="file" class="form-control-file" name="image">
                            </div>

                            <div class="form-group">
                                <label for="name">Name</label>
                                <input type="text" name="name" class="form-control @error('name') is-invalid @enderror"
                                       placeholder="Enter name" value="{{ old('name') }}">
                            </div>
                            @error('name')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                            <div class="form-group">
                                <label for="address">Address</label>
                                <input type="text" name="address"
                                       class="form-control @error('address') is-invalid @enderror"
                                       placeholder="Address" value="{{ old('address') }}" >
                            </div>
                            @error('address')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                            <div class="form-group">
                                <label for="property_value">Property value</label>
                                <input type="number" name="property_value"
                                       class="form-control @error('property_value') is-invalid @enderror" step="0.1"
                                       min="0" placeholder="Property value" value="{{ old('property_value') }}">
                            </div>
                            @error('property_value')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                            <div class="form-group">
                                <label for="mortgage">Mortgage</label>
                                <input type="number" name="mortgage"
                                       class="form-control @error('mortgage') is-invalid @enderror" step="0.1"
                                       min="0" placeholder="Mortgage" value="{{ old('mortgage') }}">
                            </div>
                            @error('mortgage')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror

                            @csrf
                            <button type="submit" class="btn btn-primary">Submit</button>

                        </form>





                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
