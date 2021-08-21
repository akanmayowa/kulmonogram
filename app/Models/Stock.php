<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Supplier;

class Stock extends Model
{
    use HasFactory;
    protected $fillable = [
        'stock_name',
        'stock_id',
        'stock_quantity',
        'stock_price',
        'supplier_name',
        'user_id'
    ];


    public function supply()
    {
        return $this->hasMany('App\Models\Supplier');
    }

}
