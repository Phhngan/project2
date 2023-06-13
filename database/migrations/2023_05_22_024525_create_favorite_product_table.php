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
        Schema::create('FavoriteProducts', function (Blueprint $table) {
            $table->increments('fav_id');
            $table->unsignedInteger('use_id');
            $table->unsignedInteger('prd_id');
            $table->timestamps();

            $table->foreign('use_id')->references('id')->on('Users');
            $table->foreign('prd_id')->references('prd_id')->on('Products');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('favorite_product');
    }
};
