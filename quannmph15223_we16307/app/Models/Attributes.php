<?php

namespace App\Models;
use App\Models\AttrProduct;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Attributes extends Model
{
    use HasFactory;
    protected $fillable=[
        'name',
        'color',
        'parent_id'
    ];      

    protected $attributes=[
        'color' => '',
        'parent_id' => 0
    ];

}
