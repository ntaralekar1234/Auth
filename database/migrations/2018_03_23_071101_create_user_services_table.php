<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUserServicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_services', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->nullable($value = false);
            $table->boolean('business')->default('0');
            $table->boolean('personal')->default('0');
            $table->boolean('education')->default('0');
            $table->boolean('hotels')->default('0');
            $table->boolean('healthcare')->default('0');
            $table->boolean('financial')->default('0');
            $table->boolean('beauty')->default('0');
            $table->boolean('real_estate')->default('0');
            $table->boolean('events')->default('0');
            $table->boolean('services')->default('0');
            $table->boolean('agriculture')->default('0');
            $table->boolean('food')->default('0');
            $table->boolean('auto')->default('0');
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
        Schema::dropIfExists('user_services');
    }
}
