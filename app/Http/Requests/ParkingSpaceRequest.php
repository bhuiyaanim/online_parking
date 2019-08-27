<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ParkingSpaceRequest extends FormRequest
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
        return [

            'name'=>'required|string',
            'houseNo'=>'required',
            'roadNo'=>'required|numeric',
            'area'=>'required|string',
            'motorcycle'=>'required|numeric',
            'car'=>'required|numeric',
            'truck'=>'required|numeric',
            'buse'=>'required|numeric',
            'charge'=>'required|numeric'
            
        ];
    }

    public function messages (){

        return [

            "name.required"=> "name required",
            "name.string"=> "name must be string",
            "houseNo.required"=> "location required",
            "roadNo.required"=> "location required",
            "roadNo.numeric"=> "road munber must be numeric",
            "motorcycle.required"=> "capacity required",
            "motorcycle.numeric"=> "capacity must be numeric",
            "car.required"=> "capacity required",
            "car.numeric"=> "capacity must be numeric",
            "truck.required"=> "capacity required",
            "truck.numeric"=> "capacity must be numeric",
            "buse.required"=> "capacity required",
            "buse.numeric"=> "capacity must be numeric",
            "charge.required"=> "charge required",
            "charge.numeric"=> "charge must be numeric"
        ];
    }
}
