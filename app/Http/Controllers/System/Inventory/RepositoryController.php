<?php

namespace App\Http\Controllers\System\Inventory;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\InventoryContract;
use App\InventoryRepository;

class RepositoryController extends Controller
{   
// Create Function    
    public function create()
    {
        $repositories = InventoryRepository::all();
        $contracts = InventoryContract::all();
        return view('system.inventory.repository.repositories' , compact(
            [
                'repositories' , 'contracts' 
            ]
        ));
    }


// Store Function    
    public function store(Request $request)
    {   
        if(is_null($request->id)){
            $messages = 
            [
                'name.required' => 'نام انبار را وارد کنید .' ,
                'name.unique' => 'نام انبار تکراری است . نام دیگری وارد کنید .' ,
            ];

            $validateData = $request->validate(
                [
                    'name' => 'required|unique:inventory_repositories' ,
                ] , $messages
            );

            $repository = 
                [
                    'name' => $request->name
                ];
            InventoryRepository::create($repository);            
        }else{
            $item = InventoryRepository::find($request->id);
            $item->name = $request->name ;

            $item->save();
        }
        $msg = "دخیره ی انبار جدید با موفقیت انجام شد .";
        return redirect(route('InventoryRepositories'))->with('success' , $msg);
    }

       
// Edit Function    
    public function edit($repository_id)
    {
        $repositories = InventoryRepository::all();
        $repository = InventoryRepository::find($repository_id);
        $contracts = InventoryContract::all();
         
        return view('system.inventory.repository.repositories' , compact(
            [
                'repositories' , 'repository' , 'contracts'
            ])
        );
    }

    
// Destroy Function    
    public function destroy($repository_id)
    {
        $repository = InventoryRepository::destroy($repository_id);
        return redirect()->route('InventoryRepositories');
    }
    
}
