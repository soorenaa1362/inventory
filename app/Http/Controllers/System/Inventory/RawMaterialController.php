<?php

namespace App\Http\Controllers\System\Inventory;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\InventoryRawMaterial;

class RawMaterialController extends Controller
{  

// Create Function 
    public function create()
    {
        $rawMaterials = InventoryRawMaterial::all();
        return view('system.inventory.rawMaterial.rawMaterials' , compact(
            [
                'rawMaterials'
            ]
        ));
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
                'outlying.required' => 'فیلد درصد پرت را وارد کنید .' ,
                'outlying.numeric' => 'فیلد درصد پرت باید به صورت عددی وارد شود .' ,
            ];

            $validateData = $request->validate(
                [
                    'name' => 'required|unique:inventory_raw_materials|max:50' ,
                    'outlying' => 'required|numeric' ,
                ] , $messages
            );
            
            $rawMaterial = 
            [                
                'name' => $request->name ,
                'outlying' => $request->outlying ,
            ];
            InventoryRawMaterial::create($rawMaterial);
        }else{
            $item = InventoryRawMaterial::find($request->id);
            $item->name = $request->name;
            $item->outlying =$request->outlying;
            $item->save();
        }
        $msg = "ذخیره ی مواد اولیه ی جدید با موفقیت انجام شد .";
        return redirect(route('InventoryRawMaterials'))->with('success' , $msg);
    }
    

// Edit Function    
    public function edit($rawMaterial_id)
    {
        $rawMaterials = InventoryRawMaterial::all();
        $rawMaterial = InventoryRawMaterial::find($rawMaterial_id);
        return view('system.inventory.rawMaterial.rawMaterials' , compact(
            [
                'rawMaterials' , 'rawMaterial'
            ])
        );
    }

    
// Destroy Function
    public function destroy($rawMaterial_id)
    {        
        $rawMaterial = InventoryRawMaterial::destroy($rawMaterial_id);
        return redirect()->back();
    }

}
