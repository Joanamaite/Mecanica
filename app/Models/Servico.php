<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Servico extends Model
{
    use HasFactory;
    
    protected $table = 'itens_servico';
    protected $primaryKey = 'iditem';
    public $timestamps = false;
    protected $fillable = ['descricao', 'valor_mao_de_obra'];
}
