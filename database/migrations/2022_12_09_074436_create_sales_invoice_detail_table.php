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
        Schema::create('SalesInvoiceDetail', function (Blueprint $table) {
            $table->id();
            $table->unsignedInteger('sal_id');
            $table->unsignedInteger('prd_id');
            $table->integer('sal_quantity');
            $table->integer('sal_price');
            $table->timestamps();

            $table->foreign('sal_id')->references('sal_id')->on('SalesInvoice');
            $table->foreign('prd_id')->references('prd_id')->on('Product');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('SalesInvoiceDetail');
    }
};
