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
            $table->timestamps(); // DATETIME = CURRENT_TIMESTAMP / updated_at, created_at
        });

        /**
         * OLD TABLE
         * 
         * id_usuario - bigint(7)
         * cuenta - char(6)
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
