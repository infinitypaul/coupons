<?php

namespace App\Http\Controllers;

use App\Cart;
use App\Http\Requests\addToCartRequest;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function listCart(){
        return Cart::with('product')->latestFirst()->get();
    }
    public function deleteAllCart(){
        Cart::truncate();
    }

    public function deleteProductFromCart($productId){
        $item = Cart::byProductId($productId)->first();
        if($item){
            $item->decrement('quantity');
            if ($item->quantity === 0) {
                $item->delete();
            }
        }

        return response(null, 200);


    }

    public function addToCart(addToCartRequest $request){
        $item = Cart::byProductId($request->product_id);
        if ($item->count()) {
            $item->increment('quantity');
            $item = $item->first();
        } else {
            $item = Cart::create([
                'product_id' => $request->product_id,
                'quantity' => 1,
            ]);
        }

        return response()->json([
            'quantity' => $item->quantity,
            'product' => $item->product
        ]);
    }
}
