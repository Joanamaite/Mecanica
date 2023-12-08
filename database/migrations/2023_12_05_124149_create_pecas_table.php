<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePecasTable extends Migration
{
    public function up()
    {
        Schema::create('pecas', function (Blueprint $table) {
            $table->id('idpeca');
            $table->string('descricao', 255);
            $table->decimal('valor_unitario', 10, 2);
            $table->string('codigo', 255);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('pecas');
    }
}
