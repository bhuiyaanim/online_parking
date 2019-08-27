<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BookingRequest extends FormRequest
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
            'email'=>'required|email',
            'number'=>'required|numeric',
            'psname'=>'required',
            'date'=>'required',
            'time'=>'required',
            'duration'=>'required',
            'vnumber'=>'required',
            'type'=>'required'
            
        ];
    }

    public function messages (){

        return [

            "name.required"=> "name required",
            "name.string"=> "name must be string",
            "email.required"=> "email required",
            "email.email"=> "must be in email format",
            "number.required"=> "phone number required",
            "number.size"=> "phone number must be of 11 characters",
            "psname.required"=> "parking space name required",
            "date.required"=> "date required",
            "time.required"=> "time required",
            "duration.required"=> "duration required",
            "vnumber.required"=> "vehicle number required",
            "type.required"=> "type required"
        ];
    }
}
