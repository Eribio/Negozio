<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCommentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
       /* Schema::create('comments', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->text('comment');
            $table->unsignedBigInteger('product_id');
            $table->unsignedBigInteger('users_id');
            $table->timestamps();

            $table->foreign('product_id')->references('id')->on('product')->onDelete('cascade');
            $table->foreign('users_id')->references('id')->on('users');
        });*/
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('comments');
    }
}
