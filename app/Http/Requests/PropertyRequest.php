<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Request;

class PropertyRequest extends FormRequest
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
                'name' => 'required|string|max:255',
                'address' => 'required|string|max:255',
                'property_value' => 'required|numeric',
                'mortgage' => 'required|numeric',
                'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            ];
            break;
            case 'put':
                return [
                'name' => 'string|max:255',
                'address' => 'string|max:255',
                'property_value' => 'numeric',
                'mortgage' => 'numeric',
                'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            ];

        }




    }
}
