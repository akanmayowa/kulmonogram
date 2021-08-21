<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTransactionsTable extends Migration
{
 
    public function up()
    {
           Schema::create('transactions', function (Blueprint $table) {
            $table->id();
            $table->integer('order_id');
            $table->decimal('trantotal',10,3);
            $table->string('payment_method')->default('cash');
            $table->integer('user_id');
            $table->date('transac_date');
            $table->integer('invoice_id');
            $table->timestamps();
        });
    }

  
    public function down()
    {
        Schema::dropIfExists('transactions');
    }
}
