<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Models\Product;
use Illuminate\Database\Eloquent\Model;

class OrderDetail extends Model
{
    use HasFactory;

    protected $table='orderdetails';

    protected $fillable=[
        'product_id',
        'user_id',
        'money',
        'quantity',
        'status',
        'attribute'
    ];

    public function product(){
        return $this->belongsTo(Product::class, 'product_id', 'id');
    }
    public function user(){
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
    // public function order(){
    //     return $this->belongsTo(Order::class, 'order_id', 'id');
    // }
    
}
