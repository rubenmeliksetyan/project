<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Property extends Model
{
    //
    protected $fillable = [
        'name', 'address', 'image_name', 'property_value', 'mortgage', 'user_id'
    ];


    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function tenancy()
    {
        return $this->HasOne(Tenancy::class);
    }


}
