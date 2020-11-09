<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class InventoryProductionStage extends Model
{
    protected $fillable =
    [
        'fk_contract' ,
        'fk_repository'
    ];




    public function Contract()
    {
        return $this->belongsTo(InventoryContract::class , 'fk_contract');
    }


    public function Repository()
    {
        return $this->belongsTo(InventoryRepository::class , 'fk_repository');
    }


    public function Contractor()
    {
        return $this->hasMany(InventoryRepository::class , 'fk_stage');
    }





}
