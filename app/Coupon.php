<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Coupon extends Model
{
    public function coupon(){
        return $this->morphTo();
    }

    public static function findByCode($code){
        return self::where('code', $code)->first();
    }

    public function discount($order){
        return $this->coupon->discount($order);
    }
}
