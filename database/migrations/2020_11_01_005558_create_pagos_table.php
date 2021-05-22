<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePagosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pagos', function (Blueprint $table) {
			$table->engine = 'InnoDB';
            $table->bigIncrements('id');  
        	$table->unsignedBigInteger('incription_id')->nullable();
            $table->string('meth_pago')->nullable(); 
            $table->string('delt_pago')->nullable();            
            $table->integer('user_created')->nullable();
            $table->integer('user_updated')->nullable();
            $table->timestamps();

            $table->foreign('incription_id')->references('id')->on('incriptions')
            ->onDelete('cascade'); 
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
       // DB::statement('SET FOREIGN_KEY_CHECKS = 0');
       //       Schema::dropIfExists('pagos');
       // DB::statement('SET FOREIGN_KEY_CHECKS = 1');

        Schema::dropIfExists('pagos');
    }
}
