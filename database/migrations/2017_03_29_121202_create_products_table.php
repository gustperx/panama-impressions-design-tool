<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->increments('id');

            $table->string('title')->unique();
            $table->string('slug')->unique();
            $table->string('description')->nullable();
            $table->string('preview')->nullable();
            $table->string('thumbnail')->nullable();
            $table->decimal('unit_price', 10, 2)->nullable();
            $table->enum('status', ['publish', 'draft'])->default('publish');
            $table->integer('category_id')->unsigned();
            $table->foreign('category_id')->references('id')->on('categories')->onDelete('cascade');

            $table->timestamps();
        });

        Schema::create('measures', function (Blueprint $table) {
            $table->increments('id');

            $table->string('title', 100)->unique();
            $table->enum('orientation', ['horizontal', 'vertical'])->default('horizontal');
            $table->string('high', 10);
            $table->string('width', 10);

            $table->timestamps();
        });

        Schema::create('measure_product', function (Blueprint $table) {
            $table->increments('id');
            $table->decimal('sale_price', 10, 2)->unsigned()->nullable();
            $table->integer('quantity')->unsigned()->nullable();

            $table->integer('measure_id')->unsigned();
            $table->integer('product_id')->unsigned();
            $table->foreign('measure_id')->references('id')->on('measures')
                ->onDelete('cascade');
            $table->foreign('product_id')->references('id')->on('products')
                ->onDelete('cascade');

            $table->timestamps();
        });

        Schema::create('product_models', function (Blueprint $table) {
            $table->increments('id');

            $table->string('title', 100);
            $table->string('thumbnail')->nullable();
            $table->enum('view', ['front', 'back', 'other'])->default('front');
            $table->enum('status', ['publish', 'draft'])->default('draft');
            $table->integer('product_id')->unsigned();
            $table->foreign('product_id')->references('id')->on('products')
                ->onDelete('cascade');

            $table->timestamps();
        });

        Schema::create('product_layers', function (Blueprint $table) {
            $table->increments('id');

            $table->string('title', 100);
            $table->enum('type', ['text', 'image'])->default('image');
            $table->string('source');
            $table->longText('parameters');
            $table->integer('product_model_id')->unsigned();
            $table->foreign('product_model_id')->references('id')->on('product_models')
                ->onDelete('cascade');

            $table->timestamps();
        });

        Schema::create('product_designs', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title', 100);
            $table->string('source')->nullable();
            $table->longText('parameters');
            $table->integer('category_id')->unsigned();
            $table->foreign('category_id')->references('id')->on('categories')->onDelete('cascade');
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
        Schema::dropIfExists('product_designs');
        Schema::dropIfExists('product_layers');
        Schema::dropIfExists('product_models');
        Schema::dropIfExists('measure_product');
        Schema::dropIfExists('measures');
        Schema::dropIfExists('products');
    }
}
