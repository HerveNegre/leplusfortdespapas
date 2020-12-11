<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->references('id')->on('users')->onUpdate('cascade')->onDelete('set null');
            $table->string('first_name');
            $table->string('last_name');
            $table->string('phone');
            $table->string('email');
            $table->string('delivery_street');
            $table->string('delivery_street2');
            $table->integer('delivery_zip_code');
            $table->string('delivery_city');
            $table->string('delivery_country');
            $table->string('bill_street');
            $table->string('bill_street2');
            $table->integer('bill_zip_code');
            $table->string('bill_city');
            $table->string('bill_country');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('orders');
    }
}
