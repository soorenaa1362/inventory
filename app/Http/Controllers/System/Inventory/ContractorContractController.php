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


class ContractorContractController extends Controller
{   
// نمایش فرم ثبت قرارداد با پیمانکار 
// Create Function   
    public function create($allocateContractor_id)
    {
        $allocateContractor = InventoryAllocateContractor::find($allocateContractor_id);
        $allocateContractor_id = $allocateContractor->id;
        $contractorContracts = InventoryContractorContract::where('fk_allocateContractor' , $allocateContractor_id)->get();       
        
        return view('system.inventory.contractor.signing' , compact(
            [
                'allocateContractor' , 'contractorContracts'
            ]
        ));
    }


// Store Function (ثبت مفاد قرارداد با پیمانکار)
    public function store($allocateContractor_id , Request $request)
    {
        $allocateContractor = InventoryAllocateContractor::find($allocateContractor_id);

    // Get the date when saving
        $myDate = Carbon::createFromTimestamp($request->start_date)->format('Y/m/d');
        
    //Get the date when editing
        $myDateJalali = Jalalian::fromDateTime($myDate)->format('Y/m/d');

        if(is_null($request->id)){
            $messages =
            [
                'start_date.required' => 'تاریخ را وارد کنید .' ,
                'unit_fee.required' => 'کارمزد را وارد کنید .' ,
                'unit_fee.numeric' => 'کارمزد را به صورت عددی وارد کنید .' ,
                'raw_material.required' => 'مقدار مواد اولیه لازم را وارد کنید .' ,
                'raw_material.numeric' => 'مقدار مواد اولیه لازم را به شکل عددی وارد کنید .' ,
            ];

            $validateData = $request->validate(
                [
                    'start_date' => 'required' ,
                    'unit_fee' => 'required|numeric' ,
                    'raw_material' => 'required|numeric' ,
                ] , $messages
            );

            $contractorContract = 
            [
                'fk_allocateContractor' => $allocateContractor_id,
                'start_date' => $myDate ,
                'unit_fee' => $request->unit_fee ,
                'raw_material' => $request->raw_material ,
            ];            
            InventoryContractorContract::create($contractorContract);
        }else{
            $item = InventoryContractorContract::find($request->id);
            $item->fk_allocateContractor = $allocateContractor_id;
            $item->start_date = $myDate;            
            $item->unit_fee = $request->unit_fee;
            $item->raw_material = $request->raw_material;
            $item->save();            
        }
        $msg = "قرارداد با پیمانکار ثبت شد .";
        return redirect()->back()->with('success' , $msg);
        // return redirect()->route('ContractorContractSigning' , [$allocateContractor_id]);
    }


// Edit Function (ویرایش مفاد قرارداد با پیمانکار)
    public function edit($contractorContract_id)
    {
        $contractorContract = InventoryContractorContract::find($contractorContract_id);
        $allocateContractor = $contractorContract->AllocateContractor;
        $allocateContractor_id = $allocateContractor->id;

        $contractorContracts = InventoryContractorContract::where('fk_allocateContractor' , $allocateContractor_id)->get();
        $contractorContract = $contractorContracts->last();

        return view('system.inventory.contractor.signing' , compact(
            [
                'contractorContract' , 'allocateContractor' , 'contractorContracts'
            ]
        ));
    }


// Destroy Function    
    public function destroy($contractorContract_id)
    {
        $contractorContract = InventoryContractorContract::destroy($contractorContract_id);
        return redirect()->back();
    }   



    public function details($contractorContract_id)
    {
        $contractorContract = InventoryContractorContract::find($contractorContract_id);

    // موارد مربوط به قرارداد جاری    
        $repository = $contractorContract->AllocateContractor->Repository->name;
        $allocateContractor = $contractorContract->AllocateContractor;     
        $unit_fee = $contractorContract->unit_fee;
        $circulation = $allocateContractor->Stage->Contract->circulation;
        $totalUnitFee = $unit_fee * $circulation;
        $contractor_id = $contractorContract->id;

    // دریافت  خروجی های قطعات تولید شده هر پیمانکار        
        $myContractorOutputPiece = InventoryContractorOutputPiece::where('fk_contractorContract' , $contractor_id)->get();

    // محاسبه مجموع خروجی های قطعات تولید شده            
        $sum_weight_outputPiece = 0;
        $sum_number_outputPiece = 0;
        foreach ($myContractorOutputPiece as $contractorOutputPiece) {
            $sum_weight_outputPiece += $contractorOutputPiece->weight;
            $sum_number_outputPiece += $contractorOutputPiece->number;
        } 

        return view('system.inventory.contractor.details' , compact(
            [
                'contractorContract' , 
            // قرارداد جاری
                'repository' ,
                'allocateContractor' , 
                'totalUnitFee' , 
                'myContractorOutputPiece' ,
                'sum_weight_outputPiece' ,
                'sum_number_outputPiece' ,            
            ]
        ));
    }


    // public function inputRawMaterial($contractorContract_id)
    // {
    //     // $allocateContractor = InventoryAllocateContractor::find($allocateContractor_id);
    //     // dd($allocateContractor);
    // }


    // public function storeInputRawMaterial($contractorContract_id , Request $request)
    // {
    //     $contractorContract = InventoryContractorContract::find($contractorContract_id);
    //     // dd($contractorContract);

    // // Get the date when saving
    //     $myDate = Carbon::createFromTimestamp($request->date_input_raw_material)->format('Y/m/d');

    //     $contractorInputRawMaterial = 
    //     [
    //         'fk_contractorContract' => $contractorContract->id ,
    //         'date_input_raw_material' => $myDate ,
    //         'weight' => $request->weight ,  
    //         'fk_rawMaterial' => $request->fk_rawMaterial ,
    //     ];
    //     // dd($request);
    //     InventoryContractorInputRawMaterial::create($contractorInputRawMaterial);
    //     return redirect()->back();
    // }


    public function inputRawMaterialPrint($contractorContract_id)
    {
        $contractorContract = InventoryContractorContract::find($contractorContract_id);
        $contractor_id = $contractorContract->id;
        $rawMaterials = InventoryRawMaterial::all();

        // دریافت ورودی های مواد اولیه هر پیمانکار        
        $myContractorInputRawMaterial = InventoryContractorInputRawMaterial::
            where('fk_contractorContract' , $contractor_id)->get();

        // محاسبه مجموع ورودی های مواد اولیه            
        $sum_weight_inputRawMaterial = 0;
        foreach ($myContractorInputRawMaterial as $contractorInputRawMaterial) {
            $sum_weight_inputRawMaterial += $contractorInputRawMaterial->weight;
        } 
        return view('system.inventory.contractor.inputRawMaterial.print' , compact(
            ['contractorContract' , 'rawMaterials' , 'myContractorInputRawMaterial' , 'sum_weight_inputRawMaterial']
        ));
    }

    
    public function inputPiece($contractorContract_id)
    {
        dd($contractorContract_id);
    }







    public function inputRawMaterialViewList($contractorContract_id)
    {        
        $contractorContract = InventoryContractorContract::find($contractorContract_id);
        $contractorContract_id = $contractorContract->id;

    // دریافت ورودی های مواد اولیه هر پیمانکار
        $myContractorInputRawMaterial = InventoryContractorInputRawMaterial::
            where('fk_contractorContract' , $contractorContract_id)->get();
        
    // محاسبه مجموع ورودی های مواد اولیه هر پیمانکار
        $sum_weight_inputRawMaterial = 0;
        foreach ($myContractorInputRawMaterial as $contractorInputRawMaterial) {
            $sum_weight_inputRawMaterial += $contractorInputRawMaterial->weight;
        }  
        

    // دریافت خروجی های هر پیمانکار
        $myContractorOutputPiece = InventoryContractorOutputPiece::
            where('fk_contractorContract' , $contractorContract_id)->get();

    // محاسبه مجموع خروجی های هر پیمانکار
        $sum_weight_output = 0;
        $sum_number_output = 0;
        foreach ($myContractorOutputPiece as $contractorOutputPiece) {
            $sum_weight_output += $contractorOutputPiece->weight;
            $sum_number_output += $contractorOutputPiece->number;
        } 

        return view('system.inventory.contractor.inputRawMaterial.viewList' , compact(
            [
                'contractorContract' , 
                'myContractorInputRawMaterial' ,
                'sum_weight_inputRawMaterial' ,
                'myContractorOutputPiece' ,
                'sum_weight_output' ,
                'sum_number_output'
            ]
        ));
    }


    // public function inputPiece($contractorContract_id , Request $request)
    // {
    //     $contractorContract = InventoryContractorContract::find($contractorContract_id);
    //     $contractorContract_id = $contractorContract->id;

    // // Get the date when saving
    //     $myDate = Carbon::createFromTimestamp($request->date_input_piece)->format('Y/m/d');

    //     $contractorInputPiece = 
    //     [
    //         'fk_contractorContract' => $contractorContract->id ,
    //         'date_input_piece' => $myDate ,
    //         'weight' => $request->weight ,  
    //         'number' => $request->number ,
    //     ];
    //     InventoryContractorInputPiece::create($contractorInputPiece);
    //     return redirect()->back();
    // } 



    // public function inputPieceViewList($contractorContract_id)
    // {
    //     $contractorContract = InventoryContractorContract::find($contractorContract_id);
    //     $contractorContract_id = $contractorContract->id;

    // // دریافت ورودی های قطعات تولید شده هر پیمانکار
    //     $myContractorInputPiece = InventoryContractorInputPiece::
    //         where('fk_contractorContract' , $contractorContract_id)->get();

    // // محاسبه مجموع ورودی های قطعات تولید شده هر پیمانکار
    //     $sum_weight_inputPiece = 0;
    //     $sum_number_inputPiece = 0;
    //     foreach ($myContractorInputPiece as $contractorInputPiece) {
    //         $sum_weight_inputPiece += $contractorInputPiece->weight;
    //         $sum_number_inputPiece += $contractorInputPiece->number;
    //     } 

    // // دریافت خروجی های هر پیمانکار
    //     $myContractorOutputPiece = InventoryContractorOutputPiece::
    //         where('fk_contractorContract' , $contractorContract_id)->get();
        
    // // محاسبه مجموع خروجی های هر پیمانکار
    //     $sum_weight_output = 0;
    //     $sum_number_output = 0;
    //     foreach ($myContractorOutputPiece as $contractorOutputPiece) {
    //         $sum_weight_output += $contractorOutputPiece->weight;
    //         $sum_number_output += $contractorOutputPiece->number;
    //     }
        
    //     return view('system.inventory.contractor.inputPiece.viewList' , compact(
    //         [
    //             'myContractorInputPiece' ,
    //             'contractorContract' , 
    //             'myContractorOutputPiece' ,
    //             'sum_weight_inputPiece' ,
    //             'sum_number_inputPiece' ,
    //             'sum_weight_output' ,
    //             'sum_number_output'
    //         ]
    //     ));
    // }


    // public function outputPiece($contractorContract_id , Request $request)
    // {
    //     $contractorContract = InventoryContractorContract::find($contractorContract_id);
    //     $contractorContract_id = $contractorContract->id;

    // // Get the date when saving
    //     $myDate = Carbon::createFromTimestamp($request->date_output_piece)->format('Y/m/d');

    //     $contractorOutputPiece = 
    //     [
    //         'fk_contractorContract' => $contractorContract->id ,
    //         'date_output_piece' => $myDate ,
    //         'weight' => $request->weight ,  
    //         'number' => $request->number ,
    //     ];
    //     InventoryContractorOutputPiece::create($contractorOutputPiece);
    //     return redirect()->back();
    // }


    // public function outputPieceViewList($contractorContract_id)
    // {
    //     $contractorContract = InventoryContractorContract::find($contractorContract_id);
    //     $contractorContract_id = $contractorContract->id;

    // // دریافت خروجی های قطعات تولید شده هر پیمانکار
    //     $myContractorOutputPiece = InventoryContractorOutputPiece::
    //         where('fk_contractorContract' , $contractorContract_id)->get();

    // // محاسبه مجموع خروجی های قطعات تولید شده هر پیمانکار
    //     $sum_weight_output = 0;
    //     $sum_number_output = 0;
    //     foreach ($myContractorOutputPiece as $contractorOutputPiece) {
    //         $sum_weight_output += $contractorOutputPiece->weight;
    //         $sum_number_output += $contractorOutputPiece->number;
    //     } 

    //     return view('system.inventory.contractor.outputPiece.viewList' , compact(
    //         [
    //             'myContractorOutputPiece' ,
    //             'sum_weight_output' ,
    //             'sum_number_output'
    //         ]
    //     ));
    // }


    // public function lineSeparation($contractorOutputPiece_id)
    // {
    //     $contractorOutputPiece = InventoryContractorOutputPiece::find($contractorOutputPiece_id);
    //     $contractorContract = $contractorOutputPiece->ContractorContract;

    //     $contractor_id = $contractorContract->id;

    // // دریافت خروجی های قطعات تولید شده هر پیمانکار
    //     $myContractorOutputPiece = InventoryContractorOutputPiece::
    //         where('fk_contractorContract' , $contractor_id)->get();

    // // محاسبه مجموع خروجی های قطعات تولید شده هر پیمانکار
    //     $sum_weight_output = 0;
    //     $sum_number_output = 0;
    //     foreach ($myContractorOutputPiece as $contractorOutputPiece) {
    //         $sum_weight_output += $contractorOutputPiece->weight;
    //         $sum_number_output += $contractorOutputPiece->number;
    //     } 
        
    //     return view('system.inventory.contractor.outputPiece.viewList' , compact(
    //         [
    //             'myContractorOutputPiece' ,
    //             'sum_weight_output' ,
    //             'sum_number_output'
    //         ]
    //     ));
    // }


    // public function separationStore($contractorOutputPiece_id , Request $request)
    // {
    // // Get the date when saving
    //     $myDate = Carbon::createFromTimestamp($request->date_of_separation)->format('Y/m/d');

    //     $separation = 
    //     [
    //         'fk_contractorOutputPiece' => $contractorOutputPiece->id ,
    //         'date_of_separation' => $myDate ,
    //         'healthy_weight' => $request->healthy_weight ,
    //         'healthy_number' => $request->healthy_number ,
    //         'unhealthy_weight' => $request->unhealthy_weight ,
    //         'unhealthy_number' => $request->unhealthy_number ,
    //     ];
    //     InventoryContractorSeparationOutput::create($separation);
    //     dd($separation);
    // }



    
    





    
}
