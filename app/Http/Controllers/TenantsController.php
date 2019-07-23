<?php

namespace App\Http\Controllers;

use App\Http\Requests\TenantRequest;
use App\Tenancy;
use App\Tenant;
use App\Traits\UploadTrait;
use Illuminate\Http\Request;

class TenantsController extends Controller
{
    //
    use UploadTrait;
    const PAGINATION = 10;

    public function index()
    {
        $tenants = Tenant::paginate(self::PAGINATION);

        return view('tenant.index', compact('tenants'));

    }

    public function create()
    {
        return view('tenant');
    }

    public function store(TenantRequest $request)
    {
        $tenant = new Tenant();

        $tenant->name = $request->name;
        $tenant->address = $request->address;

        if ($request->has('image')) {
            $image = $request->file('image');
            $name = str_slug($request->input('name')) . '_' . time();
            $folder = '/uploads/images/';
            $filePath = $folder . $name . '.' . $image->getClientOriginalExtension();
            $this->uploadOne($image, $folder, 'public', $name);
            $tenant->image_name = $filePath;
        }

        $tenant->save();

        return redirect()->back();

    }

    public function show($id)
    {
        $tenant = Tenant::findOrFail($id);

        return view('show', compact('tenant'));

    }

    // todo: make this functionality
    public function tenant_to_tenancy(Tenancy $tenancy, $id)
    {


    }
}
