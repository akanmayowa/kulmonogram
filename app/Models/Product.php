<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Order_Detail;
use App\Model\Order;
use App\Models\Service;

class Product extends Model
{
    use HasFactory;
    protected $fillable = [     
    'name',
    'description',
    'brand',
    'price', 
    'quantity',
    ];

    public function orderdetail()
    {
        return $this->hasMany('App\Models\Order_Detail');
    }

    public function service()
    {
        return $this->hasMany('App\Models\Service');
    }
}


