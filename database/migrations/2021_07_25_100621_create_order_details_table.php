<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrderDetailsTable extends Migration
{
 
    public function up()
    {
        Schema::create('order__details', function (Blueprint $table) {
            $table->id();
            $table->integer('order_id');
            $table->integer('product_id');
            $table->text('product_name');
            $table->integer('quantity');
            $table->integer('unitprice');
            $table->decimal('total', 10, 3);
            $table->integer('invoice_id');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('order_details');
    }
}
