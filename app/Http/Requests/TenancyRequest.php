<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Request;

class TenancyRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        switch (Request::method()){
            case 'post':
                return [
                    'monthly_rent' => 'required|numeric',
                    'start_date'   => 'required|date',
                    'end_date'     => 'required|date',
                    'tenant_id'    => 'array'
                ];
                break;
            case 'put':
                return [
                    'monthly_rent' => 'numeric',
                    'start_date'   => 'date',
                    'end_date'     => 'date',
                    'tenant_id'    => ''
                ];
                break;
            default:
                return [
                    'monthly_rent' => 'required|numeric',
                    'start_date'   => 'required|date',
                    'end_date'     => 'required|date',
                    'tenant_id'    => 'array'
                ];
        }

    }
}
