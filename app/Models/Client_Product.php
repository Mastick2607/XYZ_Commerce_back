<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Client_Product extends Model
{
    use HasFactory;

    protected $table = 'client_products';
    
    protected $fillable=[
        'client_id',
        'product_id',
       ];

   

}
