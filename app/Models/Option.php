<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Option extends Model
{
    use HasFactory;
    
    
    public function VariationKeys() {
        return $this->hasMany('App\Models\VariationKey','product_id','product_id');
    }
    
}