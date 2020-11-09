<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class InventoryContractorInputType extends Model
{
    
    const inputType =
        [
            1   => [   'id'    =>  1     ,   'title'   =>  'مواد خام'  ],
            2   => [   'id'    =>  2     ,   'title'   =>  'قطعه تولید شده'      ],
        ];


    public function getPieceTitle()
    {
        $status = self::pieceType;
        return $status[$this->piece]['title'];
    }







}
