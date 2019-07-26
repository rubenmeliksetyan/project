<?php

namespace App\Http\Controllers;

use App\Http\Requests\TenancyRequest;
use App\Property;
use App\Tenancy;
use Illuminate\Http\Request;

class TenancyController extends Controller
{
    //
    const PAGINATION = 10;

    public function index()
    {

        $tenancies = Tenancy::paginate(self::PAGINATION);

        return view('tenancy.index', compact('tenancies'));

    }

    public function store(Property $property, TenancyRequest $request)
    {
        $property->tenancy()->sync($request->tenant_ids);

        return redirect()->back();

    }

    public function edit(Tenancy $tenancy)
    {
        return view('tenancy.edit', compact('tenancy'));
    }

    public function update(Tenancy $tenancy, TenancyRequest $request)
    {
        $tenancy->update([
            
            'user_id' => auth()->id(),
            'monthly_rent' => $request->monthly_rent,
            'start_date' => $request->start_date,
            'end_date' => $request->end_date,
            'tenant_id' => $request->tenant_id

        ]);

    }

}
