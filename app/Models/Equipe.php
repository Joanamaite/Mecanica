<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Equipe extends Model
{
    protected $table = 'equipes';
    protected $primaryKey = 'idequipe';
    protected $fillable = ['nome', 'funcao'];

    public function mecanicos()
    {
        return $this->belongsToMany(Mecanico::class, 'equipe_mecanico', 'idequipe', 'idmecanico');
    }

    public function nomesMecanicos(){
        return $this->mecanicos->pluck('nome')->toArray();
    }

    public function removeMecanicosRelacionados()
{
    // Remove os relacionamentos com mecânicos na tabela intermediária
    $this->mecanicos()->detach();

    // Deleta a equipe
    $this->delete();
}


    // Renomeie o método delete para deleteEquipe
    public function deleteEquipe()
    {
        $this->delete();
    }

}
