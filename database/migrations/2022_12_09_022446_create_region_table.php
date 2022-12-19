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
        Schema::create('Regions', function (Blueprint $table) {
            $table->increments('reg_id');
            $table->string('reg_name');
            $table->integer('reg_ship');
            $table->integer('reg_ship_extra');
            $table->integer('reg_ship_time');
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
        Schema::dropIfExists('Regions');
    }
};
