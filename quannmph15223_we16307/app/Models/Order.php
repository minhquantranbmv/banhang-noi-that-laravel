<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    // protected $fillable=[
    //     'user_id',
    //     'fullname',
    //     'ship_address',
    //     'phone',
    //     'order_status_id',
    //     'order_code',
    //     'total_money'
    // ];

    public function order_status(){
        return $this->belongsTo(OrderStatus::class, 'order_status_id', 'id');
    }
}
