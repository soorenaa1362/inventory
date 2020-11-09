<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CustomerRequest extends FormRequest
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
        	'name.required' => 'وارد کردن فیلد نام مشتری الزامی  می باشد .',
        	'name.regex' => 'فیلد نام مشتری باید بهصورت حروف پرشود .',
        	'tel.required' => 'وارد کردن اطلاعات تماس تلفن ثابت الزامی میباشد .',
        	'tel.numeric' => 'فیلد تلفن را با عدد پر کنید .',
            'tel.regex' => 'فیلد تلفن را به صورت یک عدد 11 رقمی پر کنید .',
        	'mobile.required' => 'وارد کردن اطلاعات تلفن همراه الزامی میباشد .',
        	'mobile.numeric' => 'فیلد تلفن همراه را با عدد پر کنید .',
            'mobile.regex' => 'فیلد  تلفن همراه را به صورت یک عدد 11 رقمی پر کنید .',
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
        	// 'tel' => 'required|numeric|regex:/(01)[0-9]{9}/',
        	// 'mobile' => 'required|numeric|regex:/(01)[0-9]{9}/',
        ];
    }
}
