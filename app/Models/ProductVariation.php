<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductVariation extends Model
{
    use HasFactory;
    
    public function variationkey() {
        return $this->hasMany('App\Models\VariationKey','variation_id','id');
    } 
    
    public function products(){
         return $this->hasMany('App\Models\Product','id','product_id');
    }
    
    public function nutritions(){
         return $this->hasMany('App\Models\NutritionExplorer','variation_id', 'id');
    }
    
    public function productShipping(){
        return $this->hasMany('App\Models\ProductShipping','product_id','product_id');
    }
}
