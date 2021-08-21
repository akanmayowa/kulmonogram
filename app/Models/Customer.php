<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'address',
        'phone',
        'dob',
        'user_id'
       ];

       
public function order()
{

    return $this->belongsTo('App\Models\Order');
}
}


