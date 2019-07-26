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
    //todo: make tenancy controller, for tenancy and property assigning, tenancy should  asign tenant too
    use UploadTrait;

    const PAGINATION = 10;

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $properties = Property::paginate(self::PAGINATION);

        return view('property.properties', compact('properties'));
    }

    public function store(PropertyRequest $request)
    {
        $filePath = null;

        if ($request->has('image')) {
            $image = $request->file('image');
            $name = str_slug($request->input('name')) . '_' . time();
            $folder = '/uploads/images/';
            $filePath = $folder . $name . '.' . $image->getClientOriginalExtension();
            $this->uploadOne($image, $folder, 'public', $name);
        }
        Property::create([
            'user_id' => auth()->id(),
            'name' => $request->name,
            'address' => $request->address,
            'property_value' => $request->property_value,
            'mortgage' => $request->mortgage,
            'image_name' => $filePath
        ]);
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

    public function edit(Property $property)
    {

        return view('property.edit', compact('property'));
    }
    public function update(Property $property, PropertyRequest $request)
    {
        $property->update($request->all());



    }


}
