<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Morilog\Jalali\Jalalian;

class InventoryContractorSeparationOutput extends Model
{
    protected $fillable =
        [
            'fk_contractorOutputPiece' ,
            'date_of_separation' ,
            'healthy_weight' ,
            'healthy_number' ,
            'unhealthy_weight' ,
            'unhealthy_number' ,
        ];




    public function getdateJalali()
    {
        if (!is_null($this->date_of_separation))
            return Jalalian::fromDateTime($this->date_of_separation)->format('Y/m/d');
        return null;
    }


    public function getdateTimestamp()
    {
        if (!is_null($this->date_of_separation))        
            return Jalalian::fromDateTime($this->date_of_separation)->getTimestamp();
        return null;
    }
        

    public function ContractorOutputPiece()
    {
        return $this->belongsTo(InventoryContractorOutputPiece::class , 'fk_contractorOutputPiece');
    }

}
