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
            $table->string('fname')->nullable($value = false);
            $table->string('lname')->nullable($value = false);
            $table->bigInteger('mobile')->unique();
            $table->string('email')->unique();
            $table->text('address')->nullable();
            $table->string('tal')->nullable();
            $table->string('dist')->nullable();
            $table->string('password');
            $table->string('email_token')->nullable();
            $table->boolean('active')->default('0');
            $table->boolean('service_provider')->default('0');
            $table->boolean('or')->default('0');
            $table->boolean('admin')->default('0');
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
}
