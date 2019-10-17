<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FixedValueCoupon extends Model
{
    public function discount($cart){
        if($cart->grossTotal() < $this->value){
            return false;
        }
        return $this->value;
    }
}
