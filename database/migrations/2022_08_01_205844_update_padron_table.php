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
        Schema::table('padron', function (Blueprint $table) {
            // $table->id();
            // $table->char('ruta', 3); // Es un id de rutas? es una clave logica de ruta? es un key foreign?
            // $table->char('folio', 4); // Es un id de folios? Donde se genera los folios? longitud de campo?
            // $table->string('nombres', 64);
            // $table->string('domicilio', 64);
            // $table->char('contrato', 6);
            // $table->char('cuenta', 6);
            // $table->char('tipo', 2); // Cuales son los tipos de usuario? los tipos estan con clave numerico?
            // $table->string('medidor', 12); // Es el numero de serie del medidor? Donde se obtiene el medidor?
            // $table->smallInteger('minimo'); // Contexto de minimo? Es integer o es una cadena variable?
            // $table->boolean('serv_dren'); // que es serv_dren? contexto de este campo? es booleano o tipo de dato?
            // $table->timestamps();
        });

        /**
         * TABLE: padron
         * 
         * Registro de residentes(usuarios) que tienen contrato con la empresa
         * 
         * RUTA: varchar(3) null
         * FOLIO: varchar(4) null
         * NOMBRE: varchar(50) null
         * DOMICILIO: varchar(40) null
         * CONTRATO: varchar(6) null
         * CUENTA: varchar(6) null 
         * tipo_usu: varchar(2) null
         * medidor: varchar(12) null
         * minimo: int(4) null
         * serv_dren: varchar(1) null
         * 
         * INDEXES: RUTA(localizacion), FOLIO(localizacion), CUENTA
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
