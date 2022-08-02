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
        // Posibles cambios para normalizar y optimizar la tabla fact_ant
        Schema::table('facturas_por_pagar', function (Blueprint $table) {
            $table->foreignId('ruta_id', 3); // Es llave foreanea?
            $table->foreignId('folio_id', 4); // Es llave foranea? Deberia ser id del folio y campo numero como propiedad?
            $table->double('recargo'); // porque double y no decimal?
            $table->decimal('ad_total', 14, 2); // porque decimal y no double?, que es ad? Maneja numeros negativos?
            $table->date('periodo_at'); // Es una fecha? es una clave de fecha?
            $table->foreignId('pagare_id', 7); // Es una llave foranea? Tabla de pagares? como se genera?
            $table->integer('rezago_manual'); // porque double y no integer(small, int) o char(5)?
            $table->foreignId('cuenta_id'); // Llave foranea? tabla de cuentas?
            $table->timestamps();
        });

        /**
         * TABLE: fact_ant
         * 
         * Facturas actuales, facturas a pagar por usuario final
         * 
         * RUTA: varchar(3) null    ###
         * FOLIO: varchar(4) null   ####
         * RECARGO: double null     ...#.##
         * AD_TOTAL: decimal(14,2) null  ( +/- ...#.00 )
         * PERIODO: varchar(6) null  ######
         * PAGARE: varchar(7) null  #######
         * REZAGO_MAN: double null  ######
         * CUENTA: varchar(6) null  ######
         * 
         * INDEXES: cuenta
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
