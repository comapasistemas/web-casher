<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('usuarios', function (Blueprint $table) {
            $table->id();
            $table->string('password', 32);
            $table->string('secretword', 72);
            $table->boolean('acepto_terminos_condiciones')->default(1);
            $table->boolean('actualizado')->default(1);
            $table->boolean('activado')->default(1);
            $table->timestamps(); // DATETIME = CURRENT_TIMESTAMP
        });
		
		/**
         * OLD TABLE
         * 
         * id - bigint(7)
         * usuario - char(12)
         * password - char(12)
         * nombres - varchar(80)
         * apellidopaterno - varchar(80)
         * apellidomaterno - varchar(80)
         * cuenta - varchar(6)
         * email - char(100)
         */
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('usuarios');
    }
};
