<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsuarioClasesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    // guarda registro de clases de user_aulas 
    public function up()
    {
        Schema::create('usuario_clases', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->bigIncrements('id');
            $table->unsignedBigInteger('usuario_id')->nullable();
            $table->unsignedBigInteger('clase_id')->nullable();   

            $table->foreign('usuario_id')->references('id')->on('user_aulas')
            ->onUpdate('cascade')
            ->onDelete('set null');        
            $table->foreign('clase_id')->references('id')->on('clases')
            ->onUpdate('set null');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('usuario_clases');
    }
}
