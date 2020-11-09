<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class InventoryRawMaterial extends Model
{
    protected $fillable =
    [
        'name' ,
        'outlying'
    ];
}
