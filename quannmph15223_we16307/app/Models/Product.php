<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\ImageProduct;
use App\Models\AttrProduct;
use App\Models\Category;
class Product extends Model
{
    use HasFactory;
    protected $fillable =[
        'pro_name',
        'pro_price',
        'pro_amount',
        'pro_sale',
        'pro_view',
        'pro_description',
        'category_id',
        'into_price'
    ];

    protected $attributes =[
        'into_price'=>1,
        'pro_view' => 1
    ];
    

    public function imgpro(){
        return $this->hasOne(ImageProduct::class, 'product_id', 'id');
    }


    public function attr_pro(){
        return $this->hasMany(AttrProduct::class, 'product_id', 'id');
    }

    public function category(){
        return $this->belongsTo(Category::class, 'category_id', 'id');
    }

    
}
