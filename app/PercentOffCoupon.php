<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PercentOffCoupon extends Model
{
    public function discount($cart){

        $amount = $cart->grossTotal() * ($this->percent_off / 100);
        if($cart->grossTotal() < $amount){
            return false;
        }
        return $amount;
    }
}
