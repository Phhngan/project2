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
        Schema::create('SalesInvoice', function (Blueprint $table) {
            $table->increments('sal_id');
            $table->unsignedInteger('use_id');
            $table->date('sal_date');
            $table->integer('sal_total');
            $table->unsignedInteger('pro_id');
            $table->string('sal_district');
            $table->string('sal_town');
            $table->string('sal_detailAddress');
            $table->unsignedInteger('sal_status_id');
            $table->string('sal_note')->nullable();
            $table->timestamps();

            $table->foreign('use_id')->references('use_id')->on('UserInfor');
            $table->foreign('sal_status_id')->references('sal_status_id')->on('SalesInvoiceStatus');
            $table->foreign('pro_id')->references('pro_id')->on('Province');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('SalesInvoice');
    }
};
