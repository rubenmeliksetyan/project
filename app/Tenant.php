<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tenant extends Model
{
    //
    protected $fillable = [
        'image_name', 'name', 'address'
    ];

    public function tenancy()
    {
        return $this->hasMany(Tenancy::class);
    }

}
