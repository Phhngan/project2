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
        Schema::create('SupplyUnits', function (Blueprint $table) {
            $table->increments('unit_id');
            $table->string('unit_code');
            $table->string('unit_name');
            $table->string('unit_email')->unique();
            $table->string('unit_phone');
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
        Schema::dropIfExists('SupplyUnits');
    }
};
