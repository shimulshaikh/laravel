<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProductCatagory extends Model
{
    protected $table = "product_catagories";
    protected $fillable = ["brandName","slug","status"];


    // One to Many relationship
    public function products()
    {
        return $this->hasMany(Product::class);
    }


}
