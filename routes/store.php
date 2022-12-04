<?php

use App\Http\Controllers\store\StoreController;
use Illuminate\Support\Facades\Route;

Route::group([
    'as' => 'store.' , 
    'prefix' => 'store' ,
    'middleware' => ['auth'] ,
] , function(){
    Route::get('/' , [StoreController::class , 'index'])->name('index');
    Route::get('/create' , [StoreController::class , 'create'])->name('create');
    Route::post('/store' , [StoreController::class , 'store'])->name('store');
    Route::get('/{id}/edit' , [StoreController::class , 'edit'])->name('edit');
    Route::put('update/{id}' , [StoreController::class , 'update'])->name('update');
    Route::delete('/delete/{id}' , [StoreController::class , 'destroy'])->name('destroy');

});