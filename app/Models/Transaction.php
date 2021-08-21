<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;


class Transaction extends Model
{
    use HasFactory, Notifiable;
    protected $fillable = [
        'order_id',
        'payment_method',
        'user_id',
        'transac_date',
        'trantotal',
        'invoice_id',
        'user_id'
    ];

    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }

    
    public function order()
    {
        return $this->belongsTo('App\Models\Order',  'id', 'order_id');
    }

}
