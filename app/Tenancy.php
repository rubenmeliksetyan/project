<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tenancy extends Model
{
    //
    protected $fillable = [
        'user_id', 'property_id', 'monthly_rent', 'start_date', 'end_date'

    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function property()
    {
        return $this->belongsTo(Property::class);
    }

    public function tenant()
    {
        return $this->belongsTo(Tenant::class);
    }

}
