<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FixedValueCoupon extends Model
{
    public function discount($price){
        return $this->value;
    }
}
