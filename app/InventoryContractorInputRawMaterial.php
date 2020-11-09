<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Morilog\Jalali\Jalalian;

class InventoryContractorInputRawMaterial extends Model
{
    protected $fillable = 
    [
        'fk_contractorContract' ,
        'date_input_raw_material' ,
        'weight' ,
        'fk_rawMaterial' ,
    ];



    public function getdateJalali()
    {
        if (!is_null($this->date_input_raw_material))
            return Jalalian::fromDateTime($this->date_input_raw_material)->format('Y/m/d');
        return null;
    }


    public function getdateTimestamp()
    {
        if (!is_null($this->date_input_raw_material))        
            return Jalalian::fromDateTime($this->date_input_raw_material)->getTimestamp();
        return null;
    }




    public function ContractorContract()
    {
        return $this->belongsTo(InventoryContractorContract::class , 'fk_contractorContract');
    }



    public function RawMaterial()
    {
        return $this->belongsTo(InventoryRawMaterial::class , 'fk_rawMaterial');
    }
}
