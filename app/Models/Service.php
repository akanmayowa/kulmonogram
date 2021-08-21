<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Product;

class Service extends Model
{
    use HasFactory;
    protected $fillable = [
        'service_name'
    ];

    public function product()
    {
        return $this->belongsTo('App\Models\Product');
    }


}



