<?php

namespace App;

use DB;
use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    protected $guarded = ['id'];

    public function product()
    {
        return $this->belongsTo(Product::class);
    }

    public function totalQuantity(){
        return $this->sum('quantity');
    }

    public function grossTotal(){
        return $this->query()
            ->select(DB::raw('SUM(carts.quantity * products.price) as product_sum'))
            ->leftjoin('products','carts.product_id','=','products.id')
            ->first()->product_sum;
    }
}
