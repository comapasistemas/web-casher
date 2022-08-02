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
        Schema::table('rutas', function (Blueprint $table) {
            // $table->id();
            $table->smallInteger('clave_ruta'); // Requiere una tabla de rutas para relacionar en otra tabla con claves_vencimiento? ruta_id primaria o unica?
            $table->tinyInteger('clave_vencimiento');
            // $table->timestamps();
        });

        /**
         * TABLE: rutas
         * Asigna clave de vencimiento para cada clave de ruta y llevar un orden ruta y dia 
         * 
         * CVE_RUTA: varchar(3)
         * CVE_VENC: varchar(1) null "Clave del dia de vencimiento para su facturación"
         * 
         * INDEXES: CVE_RUTA(primary, unique), CVE_VENC
         */


        /**
         * Clave = Dia del mes
         * 1 = 5
         * 2 = 10
         * 3 = 15
         * 4 = 20
         * 5 = 25
         * 6 = 30
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
