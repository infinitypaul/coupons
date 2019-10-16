<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PercentOffCoupon extends Model
{
    public function discount($cart){
        return $cart->grossTotal() * ($this->percent_off / 100);
    }
}
