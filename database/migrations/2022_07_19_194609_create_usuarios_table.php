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
            $table->timestamps();
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
