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
        Schema::table('usuarios', function (Blueprint $table) {
            // $table->id();
            // $table->string('nombres', 80);
            // $table->string('apellido_paterno', 80);
            // $table->string('apellido_materno', 80);
            // $table->string('correo_electronico', 88);
            // $table->char('cuenta', 6); // Requiere normalizacion con tabla de cuentas
            // $table->string('usuario', 16);
            // $table->string('password', 48);
            $table->string('secretword', 64)->default('..?'); // (..?|NULL): Para actualizar desde password encoded
            $table->boolean('activado')->default(1);
            $table->string('remember_token', 100)->nullable();
            $table->dateTime('acepto_contrato')->default(now());
            $table->dateTime('actualizo_perfil')->default(now());
            $table->timestamps(); // DATETIME = CURRENT_TIMESTAMP
            // $table->timestamp('created_at')->default(DB::raw('CURRENT_TIMESTAMP(0)'));
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
        // Schema::dropIfExists('usuarios');
    }
};
