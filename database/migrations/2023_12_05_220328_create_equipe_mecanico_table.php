<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEquipeMecanicoTable extends Migration
{
    public function up()
    {
        Schema::create('equipe_mecanico', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('idequipe');
            $table->unsignedBigInteger('idmecanico');
            $table->foreign('idequipe')->references('idequipe')->on('equipes')->onDelete('cascade');
            $table->foreign('idmecanico')->references('idmecanico')->on('mecanicos')->onDelete('cascade');

            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('equipe_mecanico');
    }
}
