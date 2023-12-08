<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mecanico extends Model{
    use HasFactory;
    protected $table = 'mecanicos';
    protected $primaryKey = 'idmecanico';

    protected $fillable = ['nome', 'endereco', 'especialidade', 'codigo'];

    public function equipes()
    {
        return $this->belongsToMany(Equipe::class, 'equipe_mecanico', 'idmecanico', 'idequipe');
    }
}
