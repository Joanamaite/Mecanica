<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateItensPecaTable extends Migration
{
    public function up()
    {
        if (!Schema::hasTable('itens_peca')) {
            Schema::create('itens_peca', function (Blueprint $table) {
                $table->id('iditens_peca');
                $table->foreignId('idos')->constrained('ordens_de_servico');
                $table->foreignId('idpeca')->constrained('pecas');
                $table->timestamps();
            });
        }
    }

    
    public function down()
    {
        Schema::dropIfExists('itens_peca');
    }
}
