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
        Schema::create('Products', function (Blueprint $table) {
            $table->increments('prd_id');
            $table->string('prd_code');
            $table->string('prd_name');
            $table->unsignedInteger('prd_type_id');
            $table->integer('prd_weigh');
            $table->string('prd_source')->nullable();
            $table->integer('prd_price');
            $table->integer('prd_discount');
            $table->string('prd_description')->nullable();
            $table->timestamps();

            $table->foreign('prd_type_id')->references('prd_type_id')->on('ProductTypes');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('Products');
    }
};
