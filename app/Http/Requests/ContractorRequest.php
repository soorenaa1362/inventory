<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ContractorRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        $this->merge(arrayToEnglish($this->all()));
        return true;
    }

    
    public function messages()
    {
        return [
        	'name.required' => 'وارد کردن فیلد نام پیمانکار الزامی  می باشد .',
        	'name.regex' => 'فیلد نام پیمانکار باید به صورت حروف پرشود .',
        ];
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
        	// 'name' => 'required|regex:/^[a-zA-Z]+$/u',
        ];
    }
}
