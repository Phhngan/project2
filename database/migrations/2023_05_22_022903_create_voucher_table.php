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
        Schema::create('Vouchers', function (Blueprint $table) {
            $table->increments('vou_id');
            $table->date('vou_day');
            $table->string('vou_title');
            $table->integer('vou_discount');
            $table->string('vou_image');
            $table->integer('vou_min');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('Vouchers');
    }
};
