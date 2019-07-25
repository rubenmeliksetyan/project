<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tenant extends Model
{
    //
    protected $fillable = [
        'image_name', 'name', 'address'
    ];

    public function property()
    {
        return $this->belongsToMany(Property::class, 'tenancies')->withPivot('start_date', 'end_date', 'monthly_rent');
    }

}
