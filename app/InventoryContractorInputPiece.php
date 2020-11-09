<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Morilog\Jalali\Jalalian;

class InventoryContractorInputPiece extends Model
{
    protected $fillable =
    [
        'fk_contractorContract' ,
        'date_input_piece' ,
        'weight' ,
        'number' ,
    ];


    public function getdateJalali()
    {
        if (!is_null($this->date_input_piece))
            return Jalalian::fromDateTime($this->date_input_piece)->format('Y/m/d');
        return null;
    }


    public function getdateTimestamp()
    {
        if (!is_null($this->date_input_piece))        
            return Jalalian::fromDateTime($this->date_input_piece)->getTimestamp();
        return null;
    }




    public function ContractorContract()
    {
        return $this->belongsTo(InventoryContractorContract::class , 'fk_contractorContract');
    }

}
