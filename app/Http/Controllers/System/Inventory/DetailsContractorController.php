<?php

namespace App\Http\Controllers\System\Inventory;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Carbon\Carbon;
use Morilog\Jalali\Jalalian;
use App\InventoryContractor;
use App\InventoryAllocateContractor;
use App\InventoryProductionStage;
use App\InventoryRepository;
use App\InventoryContractorContract;
use App\InventoryRawMaterial;
use App\InventoryContractorInputRawMaterial;
use App\InventoryContractorInputPiece;
use App\InventoryContractorOutputPiece;


class DetailsContractorController extends Controller
{   

////////////////////////////////////// Contractor Input Raw Material : Strat //////////////////////////////////////////

// Create Function (فرم ثبت ورودی مواد خام و لیست ورودی های مواد خام) 

    public function inputRawMaterial($contractorContract_id)
    {
        $contractorContract = InventoryContractorContract::find($contractorContract_id);
        $contractorContract_id = $contractorContract->id;
        $rawMaterials = InventoryRawMaterial::all();

        // دریافت ورودی های مواد اولیه هر پیمانکار        
        $contractorInputRawMaterials = InventoryContractorInputRawMaterial::
            where('fk_contractorContract' , $contractorContract_id)->get();

        // محاسبه مجموع ورودی های مواد اولیه            
        $sum_weight_inputRawMaterial = 0;
        foreach ($contractorInputRawMaterials as $contractorInputRawMaterial) {
            $sum_weight_inputRawMaterial += $contractorInputRawMaterial->weight;
        }
        
        return view('system.inventory.contractor.inputRawMaterial.index' , compact(
            ['contractorContract' ,'rawMaterials' , 'contractorInputRawMaterials' , 'sum_weight_inputRawMaterial']
        ));
    }


// Store Function (ثبت ورودی های مواد خام) 

    public function inputRawMaterialStore($contractorContract_id , Request $request)
    {
        $contractorContract = InventoryContractorContract::find($contractorContract_id);
        // dd($contractorContract);

    // Get the date when saving
        $myDate = Carbon::createFromTimestamp($request->date_input_raw_material)->format('Y/m/d');

        if(is_null($request->id)){
            $messages = 
            [
                'date_input_raw_material.required' => 'تاریخ را وارد کنید .' ,
                'weight.required' => 'مقدار ورودی را وارد کنید .' ,
                'weight.numeric' => 'مقدار ورودی را به شکل عددی وارد کنید .' ,
            ];

            $validateData = $request->validate(
                [
                    'date_input_raw_material' => 'required' ,
                    'weight' => 'required|numeric',                  
                ] , $messages
            );

            $inputRawMaterial = 
            [
                'fk_contractorContract' => $contractorContract_id ,
                'date_input_raw_material' => $myDate ,
                'weight' => $request->weight ,  
                'fk_rawMaterial' => $request->fk_rawMaterial ,
            ];
            InventoryContractorInputRawMaterial::create($inputRawMaterial);
        }else{
            $item = InventoryContractorInputRawMaterial::find($request->id);
            $item->fk_contractorContract = $contractorContract_id;
            $item->date_input_raw_material = $myDate;
            $item->weight = $request->weight;
            $item->fk_rawMaterial = $request->fk_rawMaterial;

            $item->save();
        }
        $msg = "ذخیره ی ورودی مواد خام با موفقیت انجام شد .";
        return redirect()->back()->with('success' , $msg);
    }


// Edit Function

    public function inputRawMaterialEdit($inputRawMaterial_id)
    {     
        $inputRawMaterial = InventoryContractorInputRawMaterial::find($inputRawMaterial_id);
        $contractorContract = $inputRawMaterial->ContractorContract;
        $contractorContract_id = $contractorContract->id;

        $rawMaterials = InventoryRawMaterial::all();
        
        // دریافت ورودی های مواد اولیه هر پیمانکار        
        $contractorInputRawMaterials = InventoryContractorInputRawMaterial::
            where('fk_contractorContract' , $contractorContract_id)->get();

        // محاسبه مجموع ورودی های مواد اولیه            
        $sum_weight_inputRawMaterial = 0;
        foreach ($contractorInputRawMaterials as $contractorInputRawMaterial) {
            $sum_weight_inputRawMaterial += $contractorInputRawMaterial->weight;
        } 

        return view('system.inventory.contractor.inputRawMaterial.index' , compact(
            ['contractorContract','inputRawMaterial','rawMaterials','contractorInputRawMaterials','sum_weight_inputRawMaterial']
        ));
    }



// Destroy Function

    public function inputRawMaterialDestroy($inputRawMaterial_id)
    {
        InventoryContractorInputRawMaterial::destroy($inputRawMaterial_id);
        return redirect()->back();       
    }

////////////////////////////////////// Contractor Input Raw Material : End //////////////////////////////////////////

////////////////////////////////////// Contractor Input Piece : Strat //////////////////////////////////////////

// Create Function (فرم ثبت ورودی قطعات تولید شده و لیست ورودی های قطعات تولید شده) 

    public function inputPiece($contractorContract_id)
    {
        $contractorContract = InventoryContractorContract::find($contractorContract_id);
        $contractorContract_id = $contractorContract->id;

        // دریافت ورودی های مواد اولیه هر پیمانکار        
        $contractorInputPieces = InventoryContractorInputPiece::
            where('fk_contractorContract' , $contractorContract_id)->get();
            // dd($contractorInputPieces);

        // محاسبه مقدار مجموع ورودی های مواد اولیه            
        $sum_weight_inputPiece = 0;
        foreach ($contractorInputPieces as $contractorInputPiece) {
            $sum_weight_inputPiece += $contractorInputPiece->weight;
        }

        // محاسبه تعداد مجموع ورودی های مواد اولیه            
        $sum_number_inputPiece = 0;
        foreach ($contractorInputPieces as $contractorInputPiece) {
            $sum_number_inputPiece += $contractorInputPiece->number;
        }
        
        return view('system.inventory.contractor.inputPiece.index' , compact(
            [
                'contractorContract' ,
                'contractorInputPieces' , 
                'sum_weight_inputPiece' , 
                'sum_number_inputPiece'
            ]
        ));
    }


// Store Function (ثبت ورودی های قطعات تولید شده) 

    public function inputPieceStore($contractorContract_id , Request $request)
    {
        $contractorContract = InventoryContractorContract::find($contractorContract_id);
    // Get the date when saving
        $myDate = Carbon::createFromTimestamp($request->date_input_piece)->format('Y/m/d');

        if(is_null($request->id)){
            $messages = 
            [
                'date_input_piece.required' => 'تاریخ را وارد کنید .' ,
                'weight.required' => 'مقدار ورودی را وارد کنید .' ,
                'weight.numeric' => 'مقدار ورودی را به شکل عددی وارد کنید .' ,
                'number.required' => 'تعداد ورودی را وارد کنید .' ,
                'number.numeric' => 'تعداد ورودی را به شکل عددی وارد کنید .' ,
            ];

            $validateData = $request->validate(
                [
                    'date_input_piece' => 'required' ,
                    'weight' => 'required|numeric',                  
                    'number' => 'required|numeric',                  
                ] , $messages
            );

            $inputPiece = 
            [
                'fk_contractorContract' => $contractorContract_id ,
                'date_input_piece' => $myDate ,
                'weight' => $request->weight ,  
                'number' => $request->number ,  
            ];
            InventoryContractorInputPiece::create($inputPiece);
        }else{
            $item = InventoryContractorInputPiece::find($request->id);
            $item->fk_contractorContract = $contractorContract_id;
            $item->date_input_piece = $myDate;
            $item->weight = $request->weight;
            $item->number = $request->number;

            $item->save();
        }
        $msg = "ذخیره ی ورودی قطعات تولید شده با موفقیت انجام شد .";
        return redirect()->back()->with('success' , $msg);
    }


// // Edit Function

    public function inputPieceEdit($inputPiece_id)
    {     
        $inputPiece = InventoryContractorInputPiece::find($inputPiece_id);
        $contractorContract = $inputPiece->ContractorContract;
        $contractorContract_id = $contractorContract->id;
        
        // دریافت ورودی های مواد اولیه هر پیمانکار        
        $contractorInputPieces = InventoryContractorInputPiece::
            where('fk_contractorContract' , $contractorContract_id)->get();

        // محاسبه مقدار مجموع ورودی های قطعات تولید شده            
        $sum_weight_inputPiece = 0;
        foreach ($contractorInputPieces as $contractorInputPiece) {
            $sum_weight_inputPiece += $contractorInputPiece->weight;
        } 

        // محاسبه تعداد مجموع ورودی های قطعات تولید شده            
        $sum_number_inputPiece = 0;
        foreach ($contractorInputPieces as $contractorInputPiece) {
            $sum_number_inputPiece += $contractorInputPiece->number;
        } 
        

        return view('system.inventory.contractor.inputPiece.index' , compact(
            [
                'contractorContract',
                'inputPiece',
                'contractorInputPieces',
                'sum_weight_inputPiece',
                'sum_number_inputPiece'
            ]
        ));
    }



// Destroy Function

    public function inputPieceDestroy($inputPiece_id)
    {
        InventoryContractorInputPiece::destroy($inputPiece_id);
        return redirect()->back();
    }


// View Function

    public function inputPieceView($inputPiece_id)
    {
        return view('system.inventory.contractor.inputPiece.viewList');
    }

////////////////////////////////////// Contractor Input Piece : End //////////////////////////////////////////









}