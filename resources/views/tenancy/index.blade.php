@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        <p>Tenancy</p>

                    </div>
                    <div class="card-body">
                        <div>
                            <form action="{{ route('tenancies') }}" method="get">
                                <div class="filters">
                                    <div>
                                        <label for="startDate">Start Date</label>
                                        <input type="hidden" name="date">
                                        <input type="date" class="form-control" name="startDate">
                                    </div>
                                    <div>
                                        <label for="endDate">End Date</label>
                                        <input type="date" class="form-control" name="endDate">
                                    </div>
                                    <div>
                                        <label for="search">Search</label>
                                        <div class="input-group">
                                            <input type="text" name="search" class="form-control" placeholder="Search Tenant">
                                            <div class="input-group-append">
                                                <button class="btn btn-secondary" type="submit">
                                                    <i class="fa fa-search"></i>
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </form>

                        </div>
                        <table class="table">
                            <thead>

                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Start Date</th>
                                <th scope="col">End Date</th>
                                <th scope="col">Monthly Rent</th>
                                <th scope="col">Property</th>
                                <th scope="col">Tenant</th>
                                <th scope="col">Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($tenancies as $tenancy)
                                <tr>
                                    <th scope="row">{{ $tenancy->id }}</th>
                                    <td>{{ $tenancy->start_date }}</td>
                                    <td>{{ $tenancy->end_date }}</td>
                                    <td>{{ $tenancy->monthly_rent }} $</td>
                                    <td>{{ $tenancy->property->name }}</td>
                                    <td> @foreach($tenancy->tenants as $tenant) {{ $tenant->name  }}  @endforeach </td>
                                    <td><a href="{{  route('tenancy.edit', $tenancy->id) }}">Edit</a></td>
                                </tr>
                            @endforeach

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection