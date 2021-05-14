<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
// use Illuminate\Support\Facades\Facade;
// use Illuminate\Support\Facades\Cache;

class CreateCursosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if(Schema::hasTable('cursos')) return;
        Schema::create('cursos', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('title')->unique()->required();
            $table->text('description')->nullable();    
           
            $table->string('duration')->nullable();
            $table->string('img')->nullable(); 
            $table->string('cant_resps')->nullable();          
            $table->integer('statud')->default('0')->nullable(); //0 culminado, 1 activo, 2 pendiente
            $table->unsignedBigInteger('user_created');
            $table->unsignedBigInteger('user_updated')->nullable();
            $table->timestamps();

            $table->foreign('user_created')->references('id')->on('users');
            $table->foreign('user_updated')->references('id')->on('users');

            
        });
    }
    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        // Schema::dropIfExists('cursos');
    }
}
