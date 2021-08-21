<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSuppliersTable extends Migration
{
   
    public function up()
    {
        Schema::create('suppliers', function (Blueprint $table) {
            $table->id();
            $table->integer('supplier_id');
            $table->string('supplier_name');
            $table->string('supplier_email');
            $table->integer('supplier_phone');
            $table->timestamps();
        });
    }

 
    public function down()
    {
        Schema::dropIfExists('suppliers');
    }
}
