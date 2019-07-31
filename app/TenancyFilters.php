<?php

namespace App;

use Illuminate\Database\Eloquent\Builder;

class TenancyFilters extends QueryFilters
{
    //
    public function date($order = 'desc')
    {
//        dd($this->request->startDate);

        return $this->builder
            ->whereDate('start_date', '>=', $this->request->startDate)
            ->whereDate('end_date', '<=', $this->request->endDate)
            ->orderBy('start_date', $order);
    }


    public function search($name)
    {
        $this->name = $name;

        return $this->builder->whereHas('tenants', function (Builder $query) {
            $query->where('name', 'like', $this->name);

        });

    }

}
