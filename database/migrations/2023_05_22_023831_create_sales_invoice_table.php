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
        Schema::create('SalesInvoices', function (Blueprint $table) {
            $table->increments('sal_id');
            $table->unsignedInteger('use_id');
            $table->date('sal_date');
            $table->integer('sal_total');
            $table->unsignedInteger('vou_id')->nullable();
            $table->unsignedInteger('ship_id');
            $table->string('sal_province');
            $table->string('sal_district');
            $table->string('sal_town');
            $table->string('sal_detailAddress');
            $table->integer('sal_status_id');
            $table->string('sal_note')->nullable();
            $table->timestamps();

            $table->foreign('use_id')->references('id')->on('Users');
            $table->foreign('vou_id')->references('vou_id')->on('Vouchers');
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
        Schema::dropIfExists('SalesInvoices');
    }
};
