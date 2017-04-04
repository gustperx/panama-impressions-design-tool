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
            $table->enum('status', ['publish', 'draft'])->default('draft');
            $table->integer('category_id')->unsigned()->nullable();
            $table->foreign('category_id')->references('id')->on('categories')->onDelete('set null');

            $table->timestamps();
        });

        Schema::create('product_views', function (Blueprint $table) {
            $table->increments('id');

            $table->string('title', 100);
            $table->string('thumbnail')->nullable();
            $table->enum('view', ['front', 'back'])->default('front');
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
            $table->integer('product_view_id')->unsigned();
            $table->foreign('product_view_id')->references('id')->on('product_views')
                ->onDelete('cascade');

            $table->timestamps();
        });

        Schema::create('product_variations', function (Blueprint $table) {
            $table->increments('id');
            $table->longText('views');
            $table->enum('status', ['publish', 'draft'])->default('draft');
            $table->integer('product_view_id')->unsigned();
            $table->foreign('product_view_id')->references('id')->on('product_views')
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
        Schema::dropIfExists('product_variations');
        Schema::dropIfExists('product_layers');
        Schema::dropIfExists('product_views');
        Schema::dropIfExists('products');
    }
}
