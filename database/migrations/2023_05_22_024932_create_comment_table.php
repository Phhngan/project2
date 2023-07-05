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
        Schema::create('Comments', function (Blueprint $table) {
            $table->increments('com_id');
            $table->unsignedInteger('use_id');
            $table->unsignedInteger('prd_id');
            $table->integer('com_rate');
            $table->unsignedInteger('sal_id');
            $table->string('com_detail');
            $table->date('com_date');
            $table->timestamps();

            $table->foreign('use_id')->references('id')->on('Users');
            $table->foreign('prd_id')->references('prd_id')->on('Products');
            $table->foreign('sal_id')->references('sal_id')->on('SalesInvoices');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('Comments');
    }
};
