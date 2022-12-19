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
        Schema::create('Provinces', function (Blueprint $table) {
            $table->increments('pro_id');
            $table->string('pro_name');
            $table->unsignedInteger('reg_id');
            $table->timestamps();

            $table->foreign('reg_id')->references('reg_id')->on('Regions');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('Provinces');
    }
};
