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

            $table->integer('measure_id')->unsigned()->nullable();
            $table->foreign('measure_id')->references('id')->on('measures')
                ->onDelete('cascade');

            $table->longText('variation')->nullable();
            $table->integer('quantity')->nullable();
            $table->decimal('sale_price', 10, 2)->unsigned()->nullable();
            
            $table->timestamps();
        });

        Schema::create('methods', function (Blueprint $table) {

            $table->increments('id');
            $table->string('title', 100);
            $table->enum('status', ['publish', 'draft'])->default('publish');
            $table->timestamps();
        });

        Schema::create('payments', function (Blueprint $table) {

            $table->increments('id');
            $table->integer('user_id')->unsigned();
            $table->integer('order_id')->unsigned();
            $table->integer('bank_id')->unsigned();
            $table->integer('method_id')->unsigned();
            $table->enum('status', [1, 2, 3, 4, 5, 6, 7, 8, 9, 10])->default(1);
            $table->decimal('amount', 10, 2);
            $table->string('reference', 100);
            $table->string('file_1');
            $table->string('motive')->nullable();

            $table->foreign('user_id')->references('id')->on('users')
                ->onDelete('cascade');
            $table->foreign('order_id')->references('id')->on('orders')
                ->onDelete('cascade');
            $table->foreign('bank_id')->references('id')->on('banks')
                ->onDelete('cascade');
            $table->foreign('method_id')->references('id')->on('methods')
                ->onDelete('cascade');

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
        Schema::dropIfExists('payments');
        Schema::dropIfExists('methods');
        Schema::dropIfExists('order_details');
        Schema::dropIfExists('orders');
    }
}
