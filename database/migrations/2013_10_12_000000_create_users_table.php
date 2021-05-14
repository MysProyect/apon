<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if(Schema::hasTable('users')) return;
        Schema::create('users', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->bigIncrements('id');
            $table->integer('cedula')->nullable();
            $table->string('name')->nullable();
            $table->string('last_name')->nullable();            
            $table->string('username',10)->unique(); //->unique('username', 'email');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password'); 
            $table->unsignedBigInteger('profession_id')->nullable();
            $table->unsignedBigInteger('profile_id')->nullable();
            $table->integer('id_user_created')->nullable();
            $table->integer('id_user_updated')->nullable();
            $table->integer('statud')->default('1');
            $table->rememberToken();

            $table->foreign('profession_id')->references('id')->on('professions');           
            $table->foreign('profile_id')->references('id')->on('profiles');
            
           

          

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
        //Schema::dropIfExists('users');
    }
}
