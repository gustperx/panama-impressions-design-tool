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

            $table->enum('status', [1, 2, 3, 4, 5, 6, 7, 8, 9, 10])->default(1);
            $table->integer('user_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');

            $table->timestamps();
        });

        Schema::create('order_details', function (Blueprint $table) {
            $table->increments('id');

            $table->integer('order_id')->unsigned();
            $table->foreign('order_id')->references('id')->on('orders')->onDelete('cascade');

            $table->integer('product_model_id')->unsigned();
            $table->foreign('product_model_id')->references('id')->on('product_models')
                ->onDelete('cascade');

            $table->longText('variation');
            $table->integer('quantity');

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
        Schema::dropIfExists('order_details');
        Schema::dropIfExists('orders');
    }
}
