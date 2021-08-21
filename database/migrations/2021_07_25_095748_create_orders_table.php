<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdersTable extends Migration
{

    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
                $table->id();
                $table->text('name')->nullable(0);
                $table->string('address')->nullable(0);
                $table->text('phone')->nullable(0);
                $table->integer('customer_id');
                $table->integer('user_id');
                $table->timestamps();

        });
    }

    public function down()
    {
        Schema::dropIfExists('orders');
    }
}
