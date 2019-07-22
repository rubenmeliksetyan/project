<?php

namespace App\Http\Controllers;

use App\Property;
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

    public function show($id)
    {
        $property = Property::findOrFail($id);
        dd($property->tenancy->tenant);

        return view('property.property', compact('property'));

    }

    public function tenancy_to_property(Property $property)
    {
        $property->tenancy()->create([
            'monthly_rent' => \request('monthly_rent'),
            'start_date' => \request('start_date'),
            'end_date' => \request('end_date'),
            'user_id' => auth()->id()
        ]);

        return redirect()->back();

    }


}
