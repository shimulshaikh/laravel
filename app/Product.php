<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $table = "products";
    
    protected $fillable = [
                            "productName",
                            "productDesc",
                            "price",
                            "categoryId",
                            "slug",
                            "status"
                           ];


    public function productCatagory()
    {
        return $this->belongsTo(ProductCatagory::class,'categoryId');
    }

    public function productImages()
    {
        return $this->hasMany(ProductImage::class,'productId');
    }


}


