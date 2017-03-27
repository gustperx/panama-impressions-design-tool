<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('email', 60)->unique();
            $table->string('password');
            $table->enum('type', ['root', 'admin', 'client'])->default('client');
            $table->enum('status', ['active', 'inactive', 'banned'])->default('inactive');
            $table->string('first_name', 50)->nullable();
            $table->string('last_name', 50)->nullable();
            $table->string('dni', 15)->unique()->nullable();
            $table->string('phone_one', 30)->nullable();
            $table->string('phone_two', 30)->nullable();
            $table->string('alternate_email', 60)->nullable();
            $table->string('avatar', 100)->nullable();
            $table->string('registration_token')->nullable();
            $table->rememberToken();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
