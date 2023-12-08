<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Veiculo extends Model
{
    use HasFactory;

    protected $table = 'veiculos';
    protected $primaryKey = 'idveiculo';

    protected $fillable = ['placa', 'descricao', 'codigo', 'idcliente'];

    public function cliente()
    {
        return $this->belongsTo(Cliente::class, 'idcliente');
    }

    public function deleteVeiculo(){
        $this->delete();
    }
}
