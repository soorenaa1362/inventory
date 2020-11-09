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
use App\InventoryContractorSeparationOutput;


class ContractorSeparationController extends Controller
{   

// Index Function

    public function create($contractorOutputPiece_id)
    {
        
        // $contractorOutputPiece = InventoryContractorOutputPiece::find($contractorOutputPiece_id);        
        // // dd($contractorContract->AllocateContractor->Contractor);
        
        // $contractorSeparations = InventoryContractorSeparationOutput::all();
        // return view('system.inventory.contractor.separations' , compact(
        //     [
        //         'contractorSeparations'
        //     ]
        // ));
    }



// Store Function

    // public function store($contractorOutputPiece_id , Request $request)
    // {
    //     $contractorOutputPiece = InventoryContractorOutputPiece::find($contractorOutputPiece_id);        

    // // Get the date when saving
    //     $myDate = Carbon::createFromTimestamp($request->date_of_separation)->format('Y/m/d');

    //     $contractorSeparation = 
    //     [
    //         'fk_contractorOutputPiece' => $contractorOutputPiece->id ,
    //         'date_of_separation' => $myDate ,
    //         'healthy_weight' => $request->healthy_weight , 
    //         'healthy_number' => $request->healthy_number ,
    //         'unhealthy_weight' => $request->unhealthy_weight ,
    //         'unhealthy_number' => $request->unhealthy_number ,
    //     ];
    //     // dd($contractorSeparation);
    //     InventoryContractorSeparationOutput::create($contractorSeparation);
    //     return redirect()->back();
    // }
    
    





    
}
