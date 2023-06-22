<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use App\Models\Products;

Route::middleware('auth')->group(function(){
    Route::get('products', function(){
        $products = products::orderBy('Description', 'asc')->get();
        return view('products.index', compact('products'));
    });
    
    Route::get('products/create',function(){
        return view('products.create');
    });
    
    Route::post('products', function(Request $request){
        $newProducts = new products;
        $newProducts->Description = $request->input('description');
        $newProducts->Price = $request->input('price');
        $newProducts->save();
        
        return redirect('/products')->with('info','Producto creado exitosamente');
    });
    
    Route::delete('products/{id}', function($id){
        $product = products::findOrFail($id);
        $product->delete();
    
        return redirect('/products')->with('info','Producto eliminado exitosamente');
    })->name('product.destry');
    
    Route::get('products/{id}/edit',function($id){
        $product = products::findOrFail($id);
        return view('products.edit', compact('product'));
    
    })->name('products.edit');
    
    Route::put('products/{id}', function(Request $request, $id){
        $product = products::findOrFail($id);
        $product->Description = $request->input('description');
        $product->Price = $request->input('price');
        $product->save();
        return redirect('/products')->with('info','Producto modificado exitosamente');
    })->name('products.update');

});

Auth::routes();
