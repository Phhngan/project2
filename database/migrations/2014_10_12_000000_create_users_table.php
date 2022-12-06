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
            $table->id();
            $table->string('use_lastName');
            $table->string('use_firstName')->unique();
            $table->date('use_birth');
            $table->int('use_gender');
            $table->string('email')->unique();
            $table->integer('phone');
            $table->string('pro_name')->nullable();
            $table->boolean('isAdmin', false);
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
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
        Schema::dropIfExists('users');
    }
};
