<?php

namespace App;

use App\Traits\OrderableTrait;
use DB;
use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    use OrderableTrait;

    protected $guarded = ['id'];

    public function product()
    {
        return $this->belongsTo(Product::class);
    }

    /**
     * @param $query
     * @param $id
     *
     * @return mixed
     */
    public function scopeByProductId($query, $id){
        return $query->where('product_id', $id);
    }

    public function totalQuantity(){
        return $this->sum('quantity');
    }

    /**
     * @return mixed
     *
     * Calculate The Total Item in Cart
     */
    public function grossTotal(){
        return $this->query()
            ->select(DB::raw('SUM(carts.quantity * products.price) as product_sum'))
            ->leftjoin('products','carts.product_id','=','products.id')
            ->first()->product_sum;
    }
}
