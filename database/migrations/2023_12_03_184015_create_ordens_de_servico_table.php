<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdensDeServicoTable extends Migration
{
    public function up()
    {
        if (!Schema::hasTable('ordens_de_servico')) {
            Schema::create('ordens_de_servico', function (Blueprint $table) {
                $table->id('idos');
                $table->date('data_emissao');
                $table->date('data_conclusao')->nullable();
                $table->string('valor', 255);
                $table->foreignId('idveiculo')->constrained('veiculos');
                $table->foreignId('idcliente')->constrained('clientes');
                $table->foreignId('iditem')->constrained('itens_servico');
                $table->foreignId('idequipe')->constrained('equipes');
                $table->timestamps();
            });
        }
    }

    public function down()
    {
        Schema::dropIfExists('ordens_de_servico');
    }
}
