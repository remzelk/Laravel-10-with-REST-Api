<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller
{
    public function index(){
        $products = Product::all();
        return view('home.index', ['product' => $products]);
    }

    public function create(){
        return view('home.create');
    }

    public function store(Request $request){
        $data = $request->validate([
            'productname' => 'required',
            'category' => 'required',
            'price' => 'required|decimal:0,2'
        ]);
        $product = Product::create($data);
        return redirect(route('product.index'));
    }

    public function edit(Product $product){
        return view('home.edit', ['product' => $product]);
    }

    public function update(Product $product, Request $request){
        $data = $request->validate([
            'productname' => 'required',
            'category' => 'required',
            'price' => 'required|decimal:0,2'
        ]);
        $product->update($data);
        return redirect(route('product.index'));
    }

    public function delete(Product $product){
        $product->delete();
        return redirect(route('product.index'));
    }
}
