<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInspecaomedicoesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('inspecaomedicoes', function (Blueprint $table) {
            $table->id();
            $table->foreignId('company_id')->constrained('companies');
            $table->foreignId('canteiro_id')->constrained('canteiros');
            $table->unsignedBigInteger('medicao_id');
            $table->date('data_inicio')->nullable();
            $table->date('data_termino')->nullable();
            $table->foreignId('ordemservico_id')->constrained('ordemservicos');
            $table->foreignId('inspecaoservico_id')->constrained('inspecaoservicos');
            $table->foreignId('servico_id')->constrained('servicos');
            $table->foreignId('equipe_id')->constrained('equipes');
            $table->foreignId('historicomembro_id')->constrained('historicomembros');
            $table->foreignId('pacote_id')->constrained('pacotes');
            $table->foreignId('pacotevigenciapreco_id')->constrained('pacotevigenciaprecos');
            $table->unsignedBigInteger('localproducao_id');
            $table->foreign('medicao_id')->references('id')->on('medicoes');
            $table->foreign('localproducao_id')->references('id')->on('localproducoes');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('inspecaomedicoes');
    }
}
