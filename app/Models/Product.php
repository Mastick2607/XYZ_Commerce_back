<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;


    public function clients()
{
    return $this->belongsToMany(Client::class, 'client_product');
}

public function orderDetails()
{
    return $this->hasMany(Order_detail::class);
}

}
