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
            $table->char('ruta', 3);
            $table->char('folio', 4);
            $table->double('recargo'); // porque double y no decimal?
            $table->decimal('ad_total', 14, 2, true); // porque decimal y no double?, que es ad?
            $table->char('periodo', 6);
            $table->char('pagare', 7);
            $table->char('rezago_manual', 7); // porque double y no integer(small, int) o char(5)?
            $table->char('cuenta', 6);
            // $table->timestamps();
        });

        /**
         * TABLE: fact_ant
         * DESCRIPTION: Facturas actuales, facturas a pagar por usuario final
         * 
         * RUTA: varchar(3)
         * FOLIO: varchar(4)
         * RECARGO: double
         * AD_TOTAL: decimal(14,2)
         * PERIODO: varchar(6)
         * PAGARE: varchar(7)
         * REZAGO_MAN: double
         * CUENTA: varchar(6)
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
