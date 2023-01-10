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
            $table->unsignedInteger('pro_id');
            $table->string('sal_district');
            $table->string('sal_town');
            $table->string('sal_detailAddress');
            $table->timestamps();

            $table->foreign('use_id')->references('id')->on('Users');
            $table->foreign('prd_id')->references('prd_id')->on('Products');
            $table->foreign('pro_id')->references('pro_id')->on('Provinces');
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
