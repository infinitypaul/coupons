<?php

namespace App\Http\Controllers;

use App\Http\Resources\ProductResource;
use App\Product;
use Illuminate\Http\Request;

class ProductsController extends Controller
{
    public function listAllProduct(){
        return ProductResource::collection(Product::all());
    }
}
