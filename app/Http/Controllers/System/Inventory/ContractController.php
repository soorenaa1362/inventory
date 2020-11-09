<?php

namespace App\Http\Controllers\System\Inventory;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Carbon\Carbon;
use Morilog\Jalali\Jalalian;
use App\InventoryContract;
use App\InventoryCustomer; 
use App\InventoryPiece;


class ContractController extends Controller
{
// Create Function    
    public function create()
    {
        $contracts = InventoryContract::all();
        $customers = InventoryCustomer::all();
        $pieces = InventoryPiece::all();
        return view('system.inventory.contract.contracts' , compact(
            [
                'contracts' , 'customers' , 'pieces'
            ]
        ));
    }


// Store Function    
    public function store(Request $request)
    {        
        $myDate = Carbon::createFromTimestamp($request->date)->format('Y/m/d');

        if(is_null($request->id)){
            $contractCount = InventoryContract::where('date',$myDate)->count();
        }else{
            $contractCount = InventoryContract::where('date',$myDate)
            ->where('id' , "!=" , $request->id)->count();
        }

        $myDateJalali = Jalalian::fromDateTime($myDate)->format('Y/m/d');
        $contract_number = $myDateJalali."-".($contractCount+1);

        if(is_null($request->id)){
            $messages = 
            [
                'date.required' => 'تاریخ عقد قرارداد را وارد کنید .' ,
                'fixed_price.required' => 'قیمت تمام شده را وارد کنید .' ,
                'fixed_price.numeric' => 'قیمت تمام شده باید به صورت عددی وارد شود .' ,
                'sales_price.required' => 'قیمت فروش را وارد کنید .' ,
                'sales_price.numeric' => 'قیمت فروش باید به صورت عددی وارد شود .' ,
                'circulation.required' => 'تیراژ را وارد کنید .' ,
                'circulation.numeric' => 'تیراژ باید به صورت عددی وارد شود .' ,
                'total_amount.required' => 'مبلغ کل قرارداد را وارد کنید .' ,
                'total_amount.numeric' => 'مبلغ کل قرارداد باید به صورت عددی وارد شود .' ,                
                'prepayment.required' => 'مبلغ پیش پرداخت را وارد کنید .' ,
                'prepayment.numeric' => 'مبلغ پیش پرداخت باید به صورت عددی وارد شود .' ,
            ];

            $validateData = $request->validate(
                [
                    'date' => 'required' ,
                    'fk_piece' => 'required' ,                    
                    'fixed_price' => 'required|numeric',
                    'sales_price' => 'required|numeric' ,
                    'circulation' => 'required|numeric' ,                   
                    'total_amount' => 'required|numeric', 
                    'prepayment' => 'required|numeric' ,                  
                ] , $messages
            );

            $contract = 
                [
                    'contract_number' => $contract_number ,
                    'fk_customer' => $request->fk_customer ,
                    'date' => $myDate ,
                    'fk_piece' => $request->fk_piece ,
                    'fixed_price' => $request->fixed_price ,
                    'sales_price' => $request->sales_price ,
                    'circulation' => $request->circulation ,
                    'total_amount' => $request->total_amount ,
                    'prepayment' => $request->prepayment ,                                      
                ];
            InventoryContract::create($contract);
        }else{
            $item = InventoryContract::find($request->id);
            $item->contract_number = $contract_number;
            $item->fk_customer = $request->fk_customer;
            $item->date = $myDate;
            $item->total_amount = $request->total_amount;
            $item->prepayment = $request->prepayment;
            $item->fk_piece = $request->fk_piece;
            $item->circulation = $request->circulation;
            $item->fixed_price = $request->fixed_price;
            $item->sales_price = $request->sales_price;

            $item->save();
        }
        $msg = "ذخیره ی قرارداد جدید با موفقیت انجام شد .";
        return redirect(route('InventoryContracts'))->with('success' , $msg);
    }

    
// Edit Function    
    public function edit($contract_id)
    {
        $customers = InventoryCustomer::all();
        $pieces = InventoryPiece::all();
        $contracts = InventoryContract::all();
        $contract = InventoryContract::find($contract_id);
        return view('system.inventory.contract.contracts' , compact(
            [
                'contracts' , 'customers' , 'pieces' , 'contract'
            ]
        ));
    }

    
// Destroy Function       
    public function destroy($contract_id)
    {
        $contract = InventoryContract::destroy($contract_id);
        return redirect()->route('InventoryContracts');
    }

}
