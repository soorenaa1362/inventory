<?php

namespace App\Http\Controllers\System\Inventory;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\InventoryPiece;

class PieceController extends Controller
{  
// Create Function
    public function create()
    {
        $pieces = InventoryPiece::all();
        return view('system.inventory.piece.pieces' , compact(
            ['pieces']
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
                'material.required' => 'فیلد نوع جنس را وارد کنید .' ,
                'weight.required' => 'فیلد وزن را وارد کنید .' ,
                'weight.numeric' => 'فیلد وزن باید به صورت عددی وارد شود .' ,
            ];

            $validateData = $request->validate(
                [
                    'name' => 'required|unique:inventory_pieces|max:50' ,
                    'material' => 'required' ,
                    'weight' => 'required|numeric' ,
                ] , $messages
            );

            $piece = 
                [
                    'name' => $request->name ,
                    'material' => $request->material ,
                    'weight' => $request->weight
                ];
            InventoryPiece::create($piece);
        }else{
            $item = InventoryPiece::find($request->id);
            $item->name = $request->name;
            $item->material = $request->material;
            $item->weight =$request->weight;
            $item->save();
        }
        $msg = "ذخیره ی قطعه ی جدید با موفقیت انجام شد .";
        return redirect(route('InventoryPieces'))->with('success' , $msg);
    }

    
// Edit Function
    public function edit($piece_id)
    {
        $pieces = InventoryPiece::all();
        $piece = InventoryPiece::find($piece_id);
        return view('system.inventory.piece.pieces' , compact(
            ['pieces' , 'piece']
        ));
    }

    
// Destroy Function
    public function destroy($piece_id)
    {
        $piece = InventoryPiece::destroy($piece_id);
        return redirect()->route('InventoryPieces');
    }

}
