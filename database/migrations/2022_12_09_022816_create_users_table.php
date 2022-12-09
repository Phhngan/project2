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
        Schema::create('UserInfor', function (Blueprint $table) {
            $table->increments('use_id');
            $table->string('use_lastName');
            $table->string('use_firstName');
            $table->date('use_birth')->nullable();
            $table->integer('use_gender');
            $table->string('use_email')->unique();
            $table->string('use_phone');
            $table->unsignedInteger('pro_id')->nullable();
            $table->string('use_district')->nullable();
            $table->string('use_town')->nullable();
            $table->string('use_detailAddress')->nullable();
            $table->string('use_password');
            $table->unsignedInteger('pos_id');
            
            $table->timestamp('email_verified_at')->nullable();
            $table->rememberToken();
            $table->timestamps();

            $table->foreign('pro_id')->references('pro_id')->on('Province');
            $table->foreign('pos_id')->references('pos_id')->on('PositionType');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('UserInfor');
    }
};
