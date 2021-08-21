<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Stock;

class Supplier extends Model
{
    use HasFactory;
    protected $fillable = [
        'supplier_name',
        'supplier_email',
        'supplier_phone',
        'supplier_id'
    ];


    public function stock()
    {
        return $this->belongsTo('App\Models\Stock');
    }




}

