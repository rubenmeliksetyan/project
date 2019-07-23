@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        <p>Create Tenant</p>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('tenant.store') }}" enctype="multipart/form-data">

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
                                       placeholder="Address" value="{{ old('address') }}">
                            </div>
                            @error('address')
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