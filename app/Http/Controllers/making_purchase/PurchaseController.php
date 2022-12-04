<?php

namespace App\Http\Controllers\making_purchase;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Purchase;
use Illuminate\Http\Request;
use App\Models\Store;
class PurchaseController extends Controller
{
    //

    public function getStores(){
        $stores = Store::all();
        return view('making_purchases.stores' , compact('stores'));
    }

    public function getProductsStore($id){
     $products = Product::where('store_id' , '=' , $id)->get();
     return view('making_purchases.productsPurchase' , compact('products'));
    }

    public function productPurchase(Request $request){
        $data = $request->all();
        Purchase::create($data);
        return redirect()->back()->with('success' , 'sucess purchase product');

    }
}
