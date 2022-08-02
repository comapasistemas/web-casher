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
            $table->smallInteger('CVE_RUTA'); // Clave ruta
            $table->tinyInteger('CVE_VENC'); // Clave vencimiento
            // $table->timestamps();
        });

        /**
         * CVE_VENC = Dia de vencimiento para su facturación
         * 
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
