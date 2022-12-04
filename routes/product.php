<?php

use App\Http\Controllers\product\ProductController;
use Illuminate\Support\Facades\Route;

Route::group([
    'as' => 'product.' , 
    'prefix' => 'product' ,
    'middleware' => ['auth'] ,
] , function(){
    Route::get('/' , [ProductController::class , 'index'])->name('index');
    Route::get('/create' , [ProductController::class , 'create'])->name('create');
    Route::post('/store' , [ProductController::class , 'store'])->name('store');
    Route::get('/{id}/edit' , [ProductController::class , 'edit'])->name('edit');
    Route::put('update/{id}' , [ProductController::class , 'update'])->name('update');
    Route::delete('/delete/{id}' , [ProductController::class , 'destroy'])->name('destroy');

});

Route::get('products/search' , [ProductController::class , 'searchProduct'])->name('products.search');