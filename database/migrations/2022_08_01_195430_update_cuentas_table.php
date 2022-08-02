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
        Schema::table('cuentas', function (Blueprint $table) {
            // $table->id();
            $table->char('id', 6); // Donde se genera número de cuenta? es la tabla primaria, relativa o pivote de cuentas
            $table->foreignId('usuario_id')->constrained()->cascadeOnDelete();
            // $table->timestamps(); // DATETIME = CURRENT_TIMESTAMP / updated_at, created_at
        });

        /**
         * TABLE: cuentas
         * 
         * Relacion de cuenta con el usuario registrado
         * 
         * id_usuario: bigint(7)
         * cuenta: char(6)
         * 
         * INDEXES: id_usuario, cuenta(primaria)
         */
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
};
