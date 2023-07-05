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
        Schema::create('Users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('use_lastName');
            $table->string('name');
            $table->integer('use_gender');
            $table->string('email')->unique();
            $table->string('use_phone');
            $table->string('use_province');
            $table->string('use_district');
            $table->string('use_town');
            $table->string('use_detailAddress');
            $table->string('password');
            $table->integer('pos_id');
            $table->integer('use_gold');

            $table->timestamp('email_verified_at')->nullable();
            $table->rememberToken();
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
        Schema::dropIfExists('Users');
    }
};
