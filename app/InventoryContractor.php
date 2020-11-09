<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class InventoryContractor extends Model
{
    protected $fillable =
    [
        'fk_contract' ,
        'fk_repository' ,
        'name' , 
        'tel' ,
        'mobile'
    ];



    public function Contract()
    {
        return $this->belongsTo(InventoryContract::class , 'fk_contract');
    }


    public function Repository()
    {
        return $this->belongsTo(InventoryRepository::class , 'fk_repository');
    }


    
}
