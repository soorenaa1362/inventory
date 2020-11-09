<?php

namespace App\Http\Controllers\System\Inventory;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\InventoryContract;
use App\InventoryRepository;
use App\InventoryProductionStage;


class ProductionStageController extends Controller
{   

// Index Function (لیست قراردادها)
    public function index()
    {
        $contracts = InventoryContract::all();
        return view('system.inventory.productionStage.contractList' , compact(
            [
                'contracts'
            ]
        ));
    }


// Create Function (فرم اختصاص انبار و لیست انبارهای تخصیص داده شده به قرارداد)   
    public function create($contract_id)
    {
        $allrepositories = InventoryRepository::all();
        $contract = InventoryContract::find($contract_id);                
        $productionStage = $contract->ProductionStage;
        $repositories = InventoryProductionStage::where('fk_contract' , $contract_id)->get();
        
        return view('system.inventory.productionStage.allocate' , compact(
            [
                'allrepositories' , 
                'contract' , 
                'productionStage'
            ]
        ));
    }


// Store Function (اختصاص انبار به قرارداد انتخاب شده)  
    public function store($contract_id , Request $request)
    {
        $productionStage = 
            [
                'fk_contract' => $request->contract_id,
                'fk_repository' => $request->fk_repository
            ];
        InventoryProductionStage::create($productionStage);
        return redirect()->back();
    }

      
// Destroy Function (حذف انبارهای اختصاص داده شده به قرارداد)      
    public function destroy($stage_id)
    {
        $productionStage = InventoryProductionStage::destroy($stage_id);
        return redirect()->back();        
    }




































    

}
