<?php

namespace App\Http\Controllers;

use App\Http\Requests\TenancyRequest;
use App\Property;
use App\Tenancy;
use App\TenancyFilters;
use App\Tenant;

class TenancyController extends Controller
{
    const PAGINATION = 10;

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(TenancyFilters $filters)
    {
        $tenancies = Tenancy::filter($filters)->with(['property', 'tenants'])->paginate(self::PAGINATION);

        return view('tenancy.index', compact('tenancies'));

    }

    public function create()
    {
        $properties = Property::pluck('name', 'id');
        $tenants = Tenant::pluck( 'name','id' );

        return view('tenancy.create', compact('tenants', 'properties'));

    }

    public function store(TenancyRequest $request)
    {
        $property = Property::find($request->property_id);
        $property->tenancy()->create([
            'user_id' => auth()->id(),
            'monthly_rent' => $request->monthly_rent,
            'start_date' => $request->start_date,
            'end_date' => $request->end_date,
        ]);
        $property->tenancy->tenants()->sync($request->tenant_ids);

        return redirect()->route('tenancies');

    }

    public function edit(Tenancy $tenancy)
    {
        $tenancy->with(['property', 'tenants'])->get();
        $properties = Property::pluck('name', 'id');
        $tenants = Tenant::pluck( 'name','id' );

        return view('tenancy.edit', compact('tenancy', 'properties', 'tenants'));
    }

    public function update(Tenancy $tenancy, TenancyRequest $request)
    {
        $tenancy->update([
            'user_id' => auth()->id(),
            'monthly_rent' => $request->monthly_rent,
            'start_date' => $request->start_date,
            'end_date' => $request->end_date,

        ]);
        $tenancy->tenants()->sync($request->tenant_ids);

        return redirect()->route('tenancies');

    }


}
