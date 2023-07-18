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
        Schema::create('ImportInvoices', function (Blueprint $table) {
            $table->increments('imp_id');
            $table->unsignedInteger('unit_id');
            $table->unsignedInteger('use_id');
            $table->date('imp_date');
            $table->integer('imp_total');
            $table->string('imp_note')->nullable();
            $table->timestamps();

            $table->foreign('unit_id')->references('unit_id')->on('SupplyUnits');
            $table->foreign('use_id')->references('id')->on('Users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('ImportInvoices');
    }
};
