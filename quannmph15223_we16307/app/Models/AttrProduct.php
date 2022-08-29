<?php

namespace App\Models;

use App\Models\Attributes;
use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AttrProduct extends Model
{
    use HasFactory;
    protected $table='attr_products';
    protected $fillable=[
        'attr_id',
        'product_id'
    ];

    public function attribute(){
        return $this->hasOne(Attributes::class,'id','attr_id');
    }

    public function product(){
        return $this->belongsTo(Product::class,'product_id','id');
    }
}
