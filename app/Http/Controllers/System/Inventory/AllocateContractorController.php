<?php

namespace App\Http\Controllers\System\Inventory;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\InventoryContractor;
use App\InventoryAllocateContractor;
use App\InventoryProductionStage;
use App\InventoryRepository;

class AllocateContractorController extends Controller
{   

// Create Function (فرم اختصاص پیمانکار و لیست پیمانکاران تخصیص داده شده به انبار)   
    public function create($stage_id)
    {
        $stage = InventoryProductionStage::find($stage_id);
        $repository_id = $stage->Repository->id;
        $contract_id = $stage->Contract->id;
        
    // Contractor List In Select Form
        $myContractors = InventoryContractor::where('fk_repository' , $repository_id)->get();
    
    // Contractor In List Form
        $allocateContractors = InventoryAllocateContractor::where('fk_repository' , $repository_id)
            ->where('fk_contract' , $contract_id)->get();

        return view('system.inventory.contractor.allocateContractors' , compact(
            [
                'stage' , 'myContractors' , 'allocateContractors'
            ]
        ));
    }

    
// Store Function (اختصاص پیمانکار به انبار انتخاب شده)  
    public function store($stage_id , Request $request)
    {
        $stage = InventoryProductionStage::find($stage_id);        
        $repository_id = $stage->Repository->id;
        $contract_id = $stage->Contract->id;
        
        $allocateContractor = 
            [   
                'fk_contract' => $contract_id ,
                'fk_stage' => $stage_id ,
                'fk_repository' => $repository_id ,
                'fk_contractor' => $request->fk_contractor
            ];
        InventoryAllocateContractor::create($allocateContractor);
        return redirect()->back();

    }


// Destroy Function (حذف پیمانکاران اختصاص داده شده به انبار)      
    public function destroy($allocateContractor_id)    
    {
        $allocateContractor = InventoryAllocateContractor::destroy($allocateContractor_id);
        return redirect()->back();
    }






    
}
