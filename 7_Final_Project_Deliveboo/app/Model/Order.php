<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = [
        "name_customer",
        "address_customer",
        "phone_number_customer",
        "total_price",
        "data"
    ];
    public function user()
    {
        return $this->belongsTo("App\User");
    }

    public function dishes()
    {
        return $this->belongsToMany("App\Model\Dish")->withPivot("quantity");
    }
}
