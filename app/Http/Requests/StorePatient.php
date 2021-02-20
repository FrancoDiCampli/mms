<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StorePatient extends FormRequest
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
            'name' => 'required|min:3',
            'surname' => 'required|min:3',
            'dni' => 'required|min:7|max:8|unique:patients,dni',
            'social_work_id' => 'required',
            'num_affiliate' => 'nullable|min:4|unique:patients,num_affiliate',
            'ant_medical' => 'nullable|min:3',
            'ant_surgical' => 'nullable|min:3',
            'age' => 'nullable|integer',
            'fnac' => 'nullable|date',
            'email' => 'nullable|email',
            'phone' => 'nullable|min:6',
            'address' => 'nullable|min:3',
            'city' => 'nullable|min:3',
            'province' => 'nullable|min:3',
            'observations' => 'nullable|min:3',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'El campo nombre es requerido.',
            'surname.required' => 'El campo apellido es requerido.',
            'dni.required' => 'El campo dni es requerido.',
            'social_work_id.required' => 'El campo obra social es requerido.',
        ];
    }
}
