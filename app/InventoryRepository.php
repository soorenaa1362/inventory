<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class InventoryRepository extends Model
{
    protected $fillable =
    [
        'name' 
    ];


// Relations

    // public function Contract()
    // {
    //     return $this->belongsTo(InventoryContract::class , 'fk_contract');
    // }



    // public function Contractor()
    // {
    //     return $this->hasMany(InventoryContractor::class , 'fk_repository');
    // }
















}
