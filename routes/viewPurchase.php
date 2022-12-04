<?php 
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\view_pruchases\ViewPurchasesController;
Route::group([
    'as' => 'purchases.' ,
    'prefix' => 'purchases/' ,
    'middleware' => ['auth'] ,
] , function(){
    Route::get('/' , [ViewPurchasesController::class , 'purchases'])->name('purchases');
    Route::get('/statistics' , [ViewPurchasesController::class , 'statistics'])->name('statistics');

});