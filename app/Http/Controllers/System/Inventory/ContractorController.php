<?php

namespace App\Http\Controllers\System\Inventory;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\InventoryContractor;
use App\InventoryContract;
use App\InventoryProductionStage;
use App\InventoryRepository;

class ContractorController extends Controller
{   
    
    public function create()
    {
        $repositories = InventoryRepository::all();
        $contractors = InventoryContractor::all();
        
        return view('system.inventory.contractor.contractors' , compact(
            [
                'repositories' , 'contractors'
            ]
        ));
    }


    public function store(Request $request)
    {
        if(is_null($request->id)){
            $messages =
            [
                'name.required' => 'نام را وارد کنید .' ,
                'name.max' => 'تعداد کاراکترهای نام نباید از ۵۰ کاراکتر بیشتر باشد .' ,
                'tel.required' => 'تلفن ثابت را وارد کنید .' ,
                'tel.numeric' => 'تلفن ثابت باید به صورت عددی وارد شود .' ,
                'mobile.required' => 'تلفن همراه را وارد کنید .' ,
                'mobile.numeric' => 'تلفن همراه باید به صورت عددی وارد شود .' ,
            ];

            $validateData = $request->validate(
                [
                    'name' => 'required|unique:inventory_customers|max:50' ,
                    'tel' => 'required|numeric' ,
                    'mobile' => 'required|numeric' ,
                ] , $messages
            );

            $contractor = 
            [
                'fk_repository' => $request->fk_repository ,
                'name' => $request->name , 
                'tel' => $request->tel ,
                'mobile' => $request->mobile
            ];
            InventoryContractor::create($contractor);
        }else{
            $item = InventoryContractor::find($request->id);
            $item->fk_repository = $request->fk_repository;
            $item->name = $request->name;
            $item->tel = $request->tel;
            $item->mobile = $request->mobile;
            $item->save();
        }
        $msg = "ذخیره ی پیمانکار جدید با موفقیت انجام شد .";
        return redirect(route('InventoryContractors'))->with('success' , $msg);
    }


    public function edit($contractor_id)
    {
        $contractors = InventoryContractor::all();
        $repositories = InventoryRepository::all();
        $contractor = InventoryContractor::find($contractor_id);
        return view('system.inventory.contractor.contractors' , compact(
            [
                'repositories' , 'contractors' , 'contractor'
            ]
        ));
    }



// Destroy Function

    public function destroy($contractor_id)
    {
        $contractor = InventoryContractor::destroy($contractor_id);
        return redirect()->back();
    }


// Details Function

    public function details($contractor_id)
    {
        return view('system.inventory.contractor.details');
    }


    
}
