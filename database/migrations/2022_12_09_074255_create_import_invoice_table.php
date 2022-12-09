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
        Schema::create('ImportInvoice', function (Blueprint $table) {
            $table->increments('imp_id');
            $table->unsignedInteger('unit_id');
            $table->unsignedInteger('use_id');
            $table->date('imp_date');
            $table->integer('imp_total');
            $table->timestamps();

            $table->foreign('unit_id')->references('unit_id')->on('SupplyUnit');
            $table->foreign('use_id')->references('use_id')->on('UserInfor');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('ImportInvoice');
    }
};
