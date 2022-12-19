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
        Schema::create('Images', function (Blueprint $table) {
            $table->increments('img_id');
            $table->string('img_url');
            $table->integer('img_role');
            $table->unsignedInteger('prd_id');
            $table->timestamps();

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
        Schema::dropIfExists('Images');
    }
};
