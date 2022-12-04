<?php

namespace App\Http\Controllers\product;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Store;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\Rule;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::with('store')->get();
       // dd($products);
        return view('products.index' , compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $stores = Store::all();
        return view('products.create' , compact('stores'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => ['required' , 'unique:products,name' , 'max:20' , 'min:2'] , 
            'description' => ['nullable'] , 
            'base_price' => ['required' , 'integer'] , 
            'discount_price' => ['required' , 'integer'] , 
            'purchasing_flag' => ['required' , 
              Rule::in(['discount' , 'base'])
              ] , 
             'store_id' => ['required' , 'exists:stores,id'] 
        ]);
        $data = $request->all();
        Product::create($data);
        return redirect()->route('product.index')->with('success' , 'success created');
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $stores = Store::all();
        $product  = Product::findOrFail($id);
        return view('products.edit' , compact('product' , 'stores')); 
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => ['required' , Rule::unique('products')->ignore($id), 
                       'max:20' , 'min:2'
                ] , 
            'description' => ['nullable'] , 
            'base_price' => ['required' , 'numeric'] , 
            'dicount_price' => ['required' , 'mumeric'] , 
            'purchasing_flag' => ['required' , 
              Rule::in(['discount' , 'base'])
              ] , 
        ]);
        
        $product = Product::findOrFail($id);
        $data = $request->all();
        $product->update($data);
        return redirect()->route('product.index')->with('success' , 'sucess updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Product::findOrFail($id)->delete();
        return redirect()->route('product.index')->with('success' , 'sucess deleted');

    }

    public function searchProduct(Request $request)
    {
     $product_input = $request->product_name;
     $product = DB::table('products')->where('name' ,  $product_input)->first();
     
     return view('making_purchases.searchedProduct' , compact('product'));
    }
}
