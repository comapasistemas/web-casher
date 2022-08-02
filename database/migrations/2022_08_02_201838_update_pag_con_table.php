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
        Schema::table('pago_convenios', function (Blueprint $table) {
            $table->integer('numero_convenio');
            $table->decimal('pago_actual', 14, 2, true);
        });

        /**
         * TABLE: pag_con
         * Pagos de convenio por realizar
         * 
         * convenio: char(6) null
         * pago_act: decimal(14, 2) null
         * 
         * INDEXES: convenio
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
