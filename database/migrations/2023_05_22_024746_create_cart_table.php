<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Carts', function (Blueprint $table) {
            $table->increments('car_id');
            $table->unsignedInteger('use_id');
            $table->unsignedInteger('prd_id');
            $table->integer('car_quantity');
            $table->unsignedInteger('ship_id');
            $table->string('sal_detailAddress');
            $table->timestamps();

            $table->foreign('use_id')->references('id')->on('Users');
            $table->foreign('prd_id')->references('prd_id')->on('Products');
            $table->foreign('ship_id')->references('ship_id')->on('Ships');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('Carts');
    }
};
