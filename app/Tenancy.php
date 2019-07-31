<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tenancy extends Model
{
    use Filterable;
    //
    protected $fillable = [
        'user_id', 'property_id', 'monthly_rent', 'start_date', 'end_date', 'tenant_id'

    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function property()
    {
        return $this->belongsTo(Property::class);
    }

    public function tenants()
    {
        return $this->belongsToMany(Tenant::class, 'tenancy_tenants');
    }

}
