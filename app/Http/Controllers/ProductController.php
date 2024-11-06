<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller
{
    public function index(Request $request){
        //fetch all product
        $products =Product::paginate(10);
        if ($request->expectsJson()) {
            return response()->json($products);
        }
    
        return view('products.index', compact('products'));
    
    }

    //fetch single product
    public function show( Request $request ,$id){
        $product =Product::findOrFail($id);
        if ($request->expectsJson()) {
        return response()->json($product);
        }
        return view('products.show', compact('product'));

    }

    //search product by name and description
    public function search(Request $request){
        $query =$request->input('query');
        $products =Product::where('name','like',"%{$query}%")
        ->orWhere('description','like',"%{$query}%")
        ->paginate(10);
        return response()->json($products);
    }
}
