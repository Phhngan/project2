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
            $table->unsignedInteger('pro_id');
            $table->string('sal_district');
            $table->string('sal_town');
            $table->string('sal_detailAddress');
            $table->unsignedInteger('sal_status_id');
            $table->string('sal_note')->nullable();
            $table->timestamps();

            $table->foreign('use_id')->references('id')->on('Users');
            $table->foreign('sal_status_id')->references('sal_status_id')->on('SalesInvoiceStatuss');
            $table->foreign('pro_id')->references('pro_id')->on('Provinces');
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
