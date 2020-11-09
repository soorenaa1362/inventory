<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Morilog\Jalali\Jalalian;


class InventoryContract extends Model
{
    protected $fillable =
    [
        'contract_number' ,
        'fk_customer' ,
        'date' ,
        'total_amount' ,
        'prepayment' ,
        'fk_piece' ,
        'circulation' ,
        'fixed_price' ,
        'sales_price' ,
        'status'
    ];


// Functions 

    public function getStatus()
    {
        $contract['current']= 'جاری';
        $contract['cleared']= 'پایان یافته';
        return $contract[$this->status];
    }


    public function getdateJalali()
    {
        if (!is_null($this->date))
            return Jalalian::fromDateTime($this->date)->format('Y/m/d');
        return null;
    }


    public function getdateTimestamp()
    {
        if (!is_null($this->date))
        // dd($this->date);
            return Jalalian::fromDateTime($this->date)->getTimestamp();
        return null;
    }


// Relations

    public function Customer()
    {
        return $this->belongsTo(InventoryCustomer::class , 'fk_customer');
    }


    public function Piece()
    {
        return $this->belongsTo(InventoryPiece::class , 'fk_piece');
    }


    public function ProductionStage()
    {
        return $this->hasMany(InventoryProductionStage::class , 'fk_contract');
    }



    
    



}
