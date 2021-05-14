<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsuarioLeccionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    //guarda regist de lecciones vista x usuario db user_aulas
    public function up()
    {
        Schema::create('usuario_leccions', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->bigIncrements('id');
            $table->unsignedBigInteger('leccion_id')->nullable();
            $table->unsignedBigInteger('usuario_id')->nullable();
            $table->timestamps();

            $table->foreign('leccion_id')->references('id')->on('leccions')
             ->onDelete('set null');
            $table->foreign('usuario_id')->references('id')->on('user_aulas')
            ->onDelete('set null');       
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('usuario_leccions');
    }
}
