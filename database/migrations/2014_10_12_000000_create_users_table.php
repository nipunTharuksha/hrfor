<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nameinfull');
            $table->integer('companyid');
            $table->string('companyemail')->unique();
            $table->date('datejoinedtocompany');
            $table->string('designation');
            $table->string('mainplant');
            $table->string('subplant');
            $table->string('email')->unique();
            $table->integer('mobilenumber')->unique();
            $table->string('address');
            $table->date('birthdate');
            $table->string('idnumber');
            $table->string('gender');
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
}
