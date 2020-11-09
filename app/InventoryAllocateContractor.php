<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class InventoryAllocateContractor extends Model
{
    
    protected $fillable =
    [
        'fk_contract' ,
        'fk_stage' ,
        'fk_repository' ,
        'fk_contractor'
    ];



    public function Contract()
    {
        return $this->belongsTo(InventoryContract::class , 'fk_contract');
    }


    public function Stage()
    {
        return $this->belongsTo(InventoryProductionStage::class , 'fk_stage');
    }


    public function Repository()
    {
        return $this->belongsTo(InventoryRepository::class , 'fk_repository');
    }


    public function Contractor()
    {
        return $this->belongsTo(InventoryContractor::class , 'fk_contractor');
    }

}
