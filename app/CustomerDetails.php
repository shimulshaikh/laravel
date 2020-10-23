<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CustomerDetails extends Model
{

    protected $table = "customer_details";

    protected $fillable = [
    						"firstName",
    						"lastName",
    						"companyName",
    						"phone",
    						"email",
    						"country",
    						"address1",
    						"address2",
    						"town",
    						"district",
    						"postCode",
    						"otherNotes"
    					  ];


    public function payments()
    {
        return $this->hasMany(Payment::class);
    }                      
    					  
}
