<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserAulasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    //BD para el registro de usuarios
    public function up()
    {
        Schema::create('user_aulas', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->bigIncrements('id');
            $table->unsignedBigInteger('part_id')->nullable();
            $table->unsignedBigInteger('curso_id')->nullable();
            $table->string('usuario');
            $table->string('email');
            $table->string('password');
             $table->timestamps();

             
            $table->foreign('curso_id')->references('id')->on('cursos')
            ->onUpdate('cascade')->onDelete('cascade');
            
            // $table->foreign('curso_id')->references('id')->on('cursos')
            // ->onUpdate('cascade')->onDelete('set null');
            
            $table->foreign('part_id')->references('id')->on('participants')
            ->onUpdate('cascade')->onDelete('cascade');

           
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('user_aulas');
    }
}
