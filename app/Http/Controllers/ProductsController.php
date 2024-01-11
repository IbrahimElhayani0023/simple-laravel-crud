<?php

namespace App\Http\Controllers;

use App\Models\Products;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProductsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('products.index',['products'=> Products::all() ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('products.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $valdated = $request->validate([
            'title'=>'required',
            'description'=>'required',
            'image'=>'image|required'
        ]);
        $valdated['image'] = $request->file('image')->store('images','public');
        Products::create($valdated);
        return to_route('products.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Products $product)
    {
   
        return view('products.show',compact('product'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Products $product)
    {
        return view('products.edit',compact('product'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Products $product)
    {
        $valdated = $request->validate([
            'title'=>'required',
            'description'=>'required',
            'image'=>'image|nullable'
        ]);
        if($request->hasFile('image')){
            $valdated['image'] = $request->file('image')->store('images','public');
            Storage::disk('public')->delete($product->image);
        }
        
        $product->update($valdated);
        return to_route('products.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Products $product)
    {
        Storage::disk('public')->delete($product->image);
        $product->delete();
        return to_route('products.index');
    }
}
