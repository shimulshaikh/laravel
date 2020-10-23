<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    
	protected $table = "payments";

    protected $fillable = [
    						"total",
    						"paymentType",
    						"status",
    						"customerId"
    					  ];



    public function customerDetalis()
    {
        return $this->belongsTo(CustomerDetails::class,'customerId');
    }					  

}
