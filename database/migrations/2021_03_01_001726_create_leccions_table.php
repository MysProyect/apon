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
            $table->unsignedBigInteger('leccion');
            $table->text('texto')->nullable();
            $table->string('url')->nullable();
            $table->string('urlExt')->nullable();
            $table->integer('visibility')->default('1');
            $table->unsignedBigInteger('user_created')->nullable();
            $table->unsignedBigInteger('user_updated')->nullable();
            $table->timestamps();

            $table->foreign('curso_id')->references('id')->on('cursos'); 
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
        Schema::dropIfExists('leccions');
    }
}
