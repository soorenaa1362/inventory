<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class InventoryCustomer extends Model
{
    protected $fillable =
    [
    	'name',
    	'tel' ,
    	'mobile' ,
    ];
}
