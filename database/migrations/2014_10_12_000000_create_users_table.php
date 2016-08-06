<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\Hash;

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
            $table->string('name');
            $table->string('email')->unique();
            $table->string('password', 60);
            $table->integer('score')->default(0);
            $table->boolean('isadmin')->default(0);
            $table->string('sid')->unique();
            $table->string('phone');
            $table->string('msg');
            $table->rememberToken();
            $table->timestamps();
        });
        $user = new \App\User();
        $user->name = "admin";
        $user->email = "admin@nlfox.com";
        $ranPsw = str_random(10);
        print "New admin password is ".$ranPsw." \n";
        $user->password = Hash::make($ranPsw);
        $user->score = "0";
        $user->isadmin = 1;
        $user->sid = "201611111";
        $user->phone = "11111111111";
        $user->msg = "admin";
        $user->save();


    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('users');
    }
}
