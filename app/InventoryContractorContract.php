<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Morilog\Jalali\Jalalian;

class InventoryContractorContract extends Model
{
    protected $fillable =
    [
        'fk_allocateContractor' ,
        'start_date' ,
        'unit_fee' ,
        'raw_material' ,
    ];



    public function getdateJalali()
    {
        if (!is_null($this->start_date))
            return Jalalian::fromDateTime($this->start_date)->format('Y/m/d');
        return null;
    }


    public function getdateTimestamp()
    {
        if (!is_null($this->start_date))
            return Jalalian::fromDateTime($this->start_date)->getTimestamp();
        return null;
    }





    public function AllocateContractor()
    {
        return $this->belongsTo(InventoryAllocateContractor::class , 'fk_allocateContractor');
    }
}
