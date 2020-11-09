<?php

namespace App\Http\Controllers\System\Inventory;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\InventoryCustomer;

class CustomerController extends Controller
{   
// Create Function    
    public function create()
    {
        $customers = InventoryCustomer::all();
        return view('system.inventory.customer.customers' , compact('customers'));
    }


// Store Function    
    public function store(Request $request)
    {
        if(is_null($request->id)){
            $messages =
            [
                'name.required' => 'فیلد نام را وارد کنید .' ,
                'name.unique' => 'فیلد نام تکراری است لطفا نام دیگری وارد کنید .' ,
                'name.max' => 'تعداد کاراکترهای نام نباید از ۵۰ کاراکتر بیشتر باشد .' ,
                'tel.required' => 'فیلد تلفن ثابت را وارد کنید .' ,
                'tel.numeric' => 'فیلد تلفن ثابت باید به صورت عددی وارد شود .' ,
                // 'tel.min' => 'تعداد کاراکترهای تلفن ثابت نباید از ۸ کاراکتر کمتر باشد .' ,
                // 'tel.max' => 'تعداد کاراکترهای تلفن ثابت نباید از ۱۱ کاراکتر بیشتر باشد .' ,
                'mobile.required' => 'فیلد تلفن همراه را وارد کنید .' ,
                'mobile.numeric' => 'فیلد تلفن همراه باید به صورت عددی وارد شود .' ,
                // 'mobile.min' => 'تعداد کاراکترهای تلفن همراه نباید از ۱۱ کاراکتر کمتر باشد .' ,
                // 'mobile.max' => 'تعداد کاراکترهای تلفن همراه نباید از ۱۱ کاراکتر بیشتر باشد .' ,
            ];

            $validateData = $request->validate(
                [
                    'name' => 'required|unique:inventory_customers|max:50' ,
                    'tel' => 'required|numeric' ,
                    'mobile' => 'required|numeric' ,
                ] , $messages
            );

            $customer = 
                [
                    'name' => $request->name ,
                    'tel' => $request->tel ,
                    'mobile' => $request->mobile
                ];
                InventoryCustomer::create($customer);
        }else{
            $item = InventoryCustomer::find($request->id);
            $item->name = $request->name;
            $item->tel = $request->tel;
            $item->mobile =$request->mobile;
            $item->save();
        }
        $msg = "ذخیره ی مشتری جدید با موفقیت انجام شد .";
        return redirect(route('InventoryCustomers'))->with('success' , $msg);
    }

    
    
// Edit Function   
    public function edit($customer_id)
    {
        $customers = InventoryCustomer::all();
        $customer = InventoryCustomer::find($customer_id);
         
        return view('system.inventory.customer.customers' , compact(
            [
                'customers' , 'customer'
            ])
        );
    }

    
   
// Destroy Function    
    public function destroy($customer_id)
    {
        $customer = InventoryCustomer::destroy($customer_id);
        return redirect()->route('InventoryCustomers');
    }
    
}
