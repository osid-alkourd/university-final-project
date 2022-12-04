<?php

namespace App\Http\Controllers\view_pruchases;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Purchase;
use Illuminate\Http\Request;

class ViewPurchasesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function purchases()
    {
        $purchases = Purchase::with('product')->get();
       // dd($purchases);
        return view('purchases.purchases' , compact('purchases'));
    }

    public function statistics(){
        $total_product_purchases = Product::withTrashed()->withSum('purchases' , 'price')->get();
        //dd($total_product_purchases);
        return view('purchases.statistics' , compact('total_product_purchases'));

    }



    
}
