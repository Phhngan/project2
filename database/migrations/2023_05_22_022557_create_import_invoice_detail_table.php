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
        Schema::create('ImportInvoiceDetails', function (Blueprint $table) {
            $table->id();
            $table->unsignedInteger('imp_id');
            $table->unsignedInteger('prd_id');
            $table->integer('imp_quantity');
            $table->integer('imp_price');
            $table->date('imp_expiryDate');
            $table->integer('prd_status_id');
            $table->integer('imp_quantity_left');
            $table->timestamps();

            $table->foreign('imp_id')->references('imp_id')->on('ImportInvoices');
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
        Schema::dropIfExists('ImportInvoiceDetails');
    }
};
