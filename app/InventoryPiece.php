<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class InventoryPiece extends Model
{
    protected $fillable =
        [
            'name' ,
            'material' ,
            'weight' ,            
        ];
}
