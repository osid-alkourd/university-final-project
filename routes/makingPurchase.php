<?php

use App\Http\Controllers\making_purchase\PurchaseController;
use Illuminate\Support\Facades\Route;

Route::group([
     'as' => 'making_purchase.' ,
     'prefix' => 'making_purchase/' ,
] , function(){
    Route::get('stores' , [PurchaseController::class , 'getStores'])->name('stores');
    Route::get('store/{id}/products' , [PurchaseController::class , 'getProductsStore'])->name('store.products');
    Route::post('product/purchase' , [PurchaseController::class , 'productPurchase'])->name('product.purchase');
});