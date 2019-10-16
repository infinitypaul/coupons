<?php

namespace App\Http\Controllers;

use App\Cart;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function listCart(){
        return Cart::with('product')->orderBy('created_at', 'desc')->get();
    }
    public function deleteAllCart(){
        Cart::truncate();
    }

    public function deleteProductFromCart($productId){
        $item = Cart::where('product_id', $productId)->first();
        if($item){
            $item->decrement('quantity');
            if ($item->quantity === 0) {
                $item->delete();
            }
        }


        return response(null, 200);


    }

    public function addToCart(Request $request){
        $item = Cart::where('product_id', $request->product_id);
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
