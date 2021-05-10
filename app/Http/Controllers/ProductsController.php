<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class ProductsController extends Controller
{
    function addProducts(Request $req){
        $products = new Product;
        $products->name = $req->input('name');
        $products->price = $req->input('price');
        $products->description = $req->input('description');
        $products->file_path = $req->file('file_path')->store('products');
        $products->save();
        return $products;
    }
    function list(){
        $products = Product::all();
        return $products;
    }
}
