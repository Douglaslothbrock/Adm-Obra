<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ChangePacotevigenciaprecoservicos1Table extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('pacotevigenciaprecoservicos', function (Blueprint $table) {
            $table->decimal('preco_unitario', 10,4)->change();
            $table->decimal('preco_total_servico', 10,4)->change();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('pacotevigenciaprecoservicos', function (Blueprint $table) {
            //
        });
    }
}
