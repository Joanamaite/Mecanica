<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMecanicosTable extends Migration
{
    public function up()
    {
        Schema::create('mecanicos', function (Blueprint $table) {
            $table->id('idmecanico');
            $table->string('nome', 100);
            $table->string('endereco', 255);
            $table->string('especialidade', 255);
            $table->string('codigo', 255);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('mecanicos');
    }
}
