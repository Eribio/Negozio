<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePaymentTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        /*Schema::create('payment', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('total_price');
            $table->dateTime('payment_data');
            $table->unsignedBigInteger('payment_method_id');
            $table->timestamps();

            $table->foreign('payment_method_id')->references('id')->on('payment_method');
        });*/
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('payment');
    }
}
