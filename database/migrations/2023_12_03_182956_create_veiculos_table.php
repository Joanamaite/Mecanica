<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVeiculosTable extends Migration
{
    public function up()
    {
        if (!Schema::hasTable('veiculos')) {
            Schema::create('veiculos', function (Blueprint $table) {
                $table->id('idveiculo');
                $table->string('placa', 10);
                $table->string('descricao', 255);
                $table->string('codigo', 255);
                $table->unsignedBigInteger('idcliente')->nullable();
                $table->foreign('idcliente')->references('idcliente')->on('clientes')->onDelete('set null');
                $table->timestamps();
            });
        }
    }

    public function down()
    {
        Schema::dropIfExists('veiculos');
    }
}
