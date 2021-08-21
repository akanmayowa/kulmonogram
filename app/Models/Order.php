<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Product;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Order extends Model
{
    use HasFactory ;
    protected $fillable = [
     'name',
     'address',
     'phone',
     'customer_id',
    ];

    public function customer()
    {
        return $this->hasOne('App\Models\Customer','id','customer_id');
    }


    public function orderdetail()
    {
        return $this->HasMany('App\Models\Order_Detail');
    }


    public function transaction()
    {
        return $this->hasMany('App\Models\Transaction', 'order_id', 'id');
    }

}


