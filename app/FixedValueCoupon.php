<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FixedValueCoupon extends Model
{
    /**
     * @param $cart
     *
     * @return bool|mixed
     *
     *  get discount for fixed value coupon
     */
    public function discount($cart){
        if($cart->grossTotal() < $this->value){
            return false;
        }
        return $this->value;
    }
}
