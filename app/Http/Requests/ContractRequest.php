<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ContractRequest extends FormRequest
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
            'fk_customer.required'=>'انتخاب مشتری الزامی است.',
            'fk_customer.numeric'=>'مشتری باید از عددی باشد.',
            'total_amount.required'=>'مبلغ کل الزامی است.',
            'total_amount.numeric'=>'فیلد مبلغ کل باید عدد وارد شود.',
            'prepayment.required'=>'پیش پرداخت الزامی است.',
            'prepayment.numeric'=>'فیلد پیش پرداخت باید عدد وارد شود.',
            'piece.required'=>'قطعه الزامی است.',
            'piece.numeric'=>'فیلد قطعه باید عدد وارد شود.',
            'circulation.required'=>'تیراژ الزامی است.',
            'circulation.numeric'=>'فیلد تیراژ باید عدد وارد شود.',
            'fixed_price.required'=>'قیمت تمام شده الزامی است.',
            'fixed_price.numeric'=>'فیلد قیمت تمام شده باید عدد وارد شود.',
            'sales_price.required'=>'قیمت فروش الزامی است.',
            'sales_price.numeric'=>'فیلد قیمت فروش باید عدد وارد شود.',
            'total_amount.gte'=>'فیلد مبلغ کل باید بیشتر از پیش پرداخت باشد.',
            'sales_price.gte'=>'فیلد قیمت فروش باید بیشتر یا مساوی قیمت تمام شده باشد.',
            'date.required'=>'فیلد تاریخ قرارداد الزامی می باشد.',
            'date.digits'=>'فیلد تاریخ قرارداد صحیح  نمی باشد.',
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
            // 'fk_customer' => 'required|numeric',
            // 'prepayment' => 'required|numeric',
            // 'total_amount' => 'required|numeric|gte:prepayment',
            // 'piece' => 'required|numeric',
            // 'circulation' => 'required|numeric',
            // 'fixed_price' => 'required|numeric',
            // 'sales_price' => 'required|numeric|gte:fixed_price',
            // 'date' => 'required|digits:10',
        ];
    }
}
