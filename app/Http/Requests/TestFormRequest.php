<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TestFormRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'bd'=> 'min:10|max:12',
	  'name'=> 'required|min:5'
        ];
    }
	
	public function messages()   
	{
	  return  [
         'name.required'=>'Поле :attribute обязательное',
    ];	  
		
	}	
	
}
