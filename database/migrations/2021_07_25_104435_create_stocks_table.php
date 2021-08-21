<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStocksTable extends Migration
{
 
    public function up()
    {
        Schema::create('stocks', function (Blueprint $table) {
            $table->id();
            $table->string('stock_name');
            $table->decimal('stock_price', 10,2);
            $table->integer('stock_quantity');
            $table->integer('stock_id');
            $table->string('supplier_name');
            $table->integer('user_id');
            $table->timestamps();
        });
    }
   public function down()
    {
        Schema::dropIfExists('stocks');
    }
}
