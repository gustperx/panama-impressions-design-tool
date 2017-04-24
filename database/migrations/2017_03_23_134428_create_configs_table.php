<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateConfigsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('configs', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('logo');
            $table->string('logo_header');
            $table->string('background');
            $table->string('favicon');
            $table->string('home');
            $table->string('email', 100)->unique();
            $table->string('phone_one')->nullable();
            $table->string('phone_two')->nullable();
            $table->timestamps();
        });

        Schema::create('generals', function (Blueprint $table) {
            $table->increments('id');
            $table->string('coin', 50);
            $table->string('unit_measurement', 50);
            $table->timestamps();
        });

        Schema::create('banks', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name', 100);
            $table->string('code', 100);
            $table->enum('account', [1, 2, 3, 4, 5])->default(1);
            $table->timestamps();
        });

        Schema::create('faqs', function (Blueprint $table) {
            $table->increments('id');
            $table->string('question');
            $table->longText('answer');
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
        Schema::dropIfExists('faqs');
        Schema::dropIfExists('banks');
        Schema::dropIfExists('generals');
        Schema::dropIfExists('configs');
    }
}
