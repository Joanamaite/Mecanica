<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateItensServicoTable extends Migration
{
    public function up()
    {
        if (!Schema::hasTable('itens_servico')) {
            Schema::create('itens_servico', function (Blueprint $table) {
                $table->id('iditem');
                $table->string('descricao', 255);
                $table->decimal('valor_mao_de_obra', 10, 2);
                $table->timestamps(); 
            });
        }
    }

    public function down()
    {
        Schema::dropIfExists('itens_servico');
    }
}
