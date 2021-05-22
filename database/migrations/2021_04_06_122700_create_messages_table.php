<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMessagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('messages', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->string('last_name')->nullable();
            $table->string('asunto');
            $table->string('email');
            $table->integer('phone')->nullable();
            $table->string('whatsapp')->nullable();
            $table->text('message');
            $table->integer('answered')->default('0');
            $table->date('send_date');
            $table->date('response_date')->nullable();
            $table->integer('user_response')->nullable();

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
        Schema::dropIfExists('messages');
    }
}
