<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLeccionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if(Schema::hasTable('leccions')) return;
        Schema::create('leccions', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->bigIncrements('id');
            $table->unsignedBigInteger('curso_id')->nullable();
            $table->unsignedBigInteger('clase_id')->nullable();
            $table->unsignedBigInteger('leccion');
            $table->text('texto')->nullable();
            $table->string('url')->nullable();
            $table->string('urlExt')->nullable();
            $table->integer('visibility')->default('1');
            $table->integer('user_created');
            $table->integer('user_updated')->nullable();
            $table->timestamps();

            $table->foreign('curso_id')->references('id')->on('cursos'); 
            $table->foreign('clase_id')->references('id')->on('clases');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('leccions');
    }
}
