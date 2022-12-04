<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use HasFactory ,  SoftDeletes;
    protected $fillable = ['name' , 'description' , 'base_price' , 
                           'discount_price' , 'store_id' , 
                           'purchasing_flag'
                      ];


   public function store(){
      return $this->belongsTo(Store::class , 'store_id' , 'id');
   }       
   
   public function purchases(){
      return $this->hasMany(Purchase::class , 'product_id' , 'id');
   }
}
