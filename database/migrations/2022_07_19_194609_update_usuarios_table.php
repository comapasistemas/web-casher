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
            // $table->char('cuenta', 6);
            // $table->string('usuario', 16);
            // $table->string('password', 48); // Utiliza encode('text', 'hackcomapa') y decode de MySQL
            $table->string('secretword', 64)->default('..?'); // default(..?|NULL): Para actualizar con password decode y encriptarlo con Hash
            $table->boolean('activado')->default(1)->comment('Usuario esta autorizado o no para acceder a la aplicación');
            $table->string('remember_token', 100)->nullable()->comment('Para confirmacion de alguna petición por la aplicación');
            $table->dateTime('acepto_contrato')->default(now())->comment('Usuario acepto la última actualización del contrato');
            $table->dateTime('actualizo_perfil')->default(now())->comment('Usuario actualizo su información requeridos por la aplicación');
            $table->timestamps(); // DATETIME = CURRENT_TIMESTAMP
            // $table->timestamp('created_at')->default( DB::raw('CURRENT_TIMESTAMP(0)') );
        });
		
		/**
         * TABLE: usuarios
         * 
         * Usuarios para la autenticacion de la aplicacion
         * 
         * id: bigint(7)
         * usuario: char(12)
         * password: char(12)
         * nombres: varchar(80)
         * apellidopaterno: varchar(80)
         * apellidomaterno: varchar(80)
         * cuenta: varchar(6)
         * email: char(100)
         * 
         * INDEXES: id, usuario(primary)
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
