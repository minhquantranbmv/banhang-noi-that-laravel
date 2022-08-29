<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Product;
use App\Models\Order;

class OrderProduct extends Model
{
    use HasFactory;
    protected $table="order_product";

    protected $attributes=[
        'orderdetails_id' =>1,
    ];

    public function product(){
        return $this->belongsTo(Product::class,'product_id','id');
    }
    
    public function order(){
        return $this->belongsTo(Order::class,'order_id','id');
    }
}
