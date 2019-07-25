<?php

namespace App\Http\Controllers;

use App\Http\Requests\TenancyRequest;
use App\Property;
use App\Tenant;
use App\Traits\UploadTrait;
use App\Http\Requests\PropertyRequest;
use Illuminate\Support\Facades\Request;

class PropertyController extends Controller
{
    use UploadTrait;

    const PAGINATION = 10;

    public function index()
    {
        $properties = Property::paginate(self::PAGINATION);

        return view('property.properties', compact('properties'));
    }

    public function store(PropertyRequest $request)
    {
        $property = new Property();

        $property->user_id = auth()->id();
        $property->name = $request->name;
        $property->address = $request->address;
        $property->property_value = $request->property_value;
        $property->mortgage = $request->mortgage;
        if ($request->has('image')) {
            $image = $request->file('image');
            $name = str_slug($request->input('name')) . '_' . time();
            $folder = '/uploads/images/';
            $filePath = $folder . $name . '.' . $image->getClientOriginalExtension();
            $this->uploadOne($image, $folder, 'public', $name);
            $property->image_name = $filePath;
        }

        $property->save();

        return redirect()->back();
    }

    public function show(Property $property)
    {
        $tenant = Tenant::all('id', 'name');
//        dd($tenant);
        return view('property.property', compact('property', 'tenant'));

    }

    public function tenancy_to_property(Property $property, TenancyRequest $request)
    {

//        $property->tenancy->tenant_id = $request->tenant_id;
//        $property->tenancy->monthly_rent = $request->monthly_rent;
//        $property->tenancy->start_date = $request->start_date;
//        $property->tenancy->end_date = $request->end_date;
//        $property->tenancy->user_id = auth()->id();

        foreach ($request->tenant_id as $item)

            $array = [
                'start_date' => $request->start_date,
                'monthly_rent' => $request->monthly_rent,
                'end_date' => $request->end_date,
                'user_id' => auth()->id(),
            ];
        $property->tenancy()->sync([$item => $array]);

        return redirect()->back();

    }


}
