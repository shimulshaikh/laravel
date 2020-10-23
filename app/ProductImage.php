<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProductImage extends Model
{
    protected $table = "product_images";
    protected $fillable = [
    						"imgTitle",
    						"productImage",
    						"productId",
    						"slug",
    						"status"
    					  ];


    public function products()
    {
        return $this->belongsTo(Product::class,'productId');
    }

}
