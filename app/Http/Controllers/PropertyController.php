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
        return redirect()->route('properties');
    }

    public function edit(Property $property)
    {
        return view('property.edit', compact('property'));
    }

    public function update(Property $property, PropertyRequest $request)
    {
        $filePath = null;

        if ($request->has('image')) {
            $image = $request->file('image');
            $name = str_slug($request->input('name')) . '_' . time();
            $folder = '/uploads/images/';
            $filePath = $folder . $name . '.' . $image->getClientOriginalExtension();
            $this->uploadOne($image, $folder, 'public', $name);
        }

        $property->update([
            'name'           => $request->name,
            'address'        => $request->address,
            'image_name'     => $filePath,
            'property_value' => $request->property_value,
            'mortgage'       => $request->mortgage,
        ]);

        return redirect()->route('properties');

    }


}
