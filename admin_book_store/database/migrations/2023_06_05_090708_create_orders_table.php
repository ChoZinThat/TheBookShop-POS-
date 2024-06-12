<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id('order_id');
            $table->integer('book_id');
            $table->string('qty');
            $table->string('order_code');
            $table->string('total_price');
            $table->integer('delivery_id');
            $table->timestamps();
        });


    }



    public function down()
    {

    }
};
