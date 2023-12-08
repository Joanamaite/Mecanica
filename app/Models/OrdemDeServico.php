<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class OrdemDeServico extends Model
{
    protected $table = 'ordens_de_servico';
    protected $primaryKey = 'idos';
    protected $fillable = [
        'data_emissao',
        'data_conclusao',
        'valor',
        'idveiculo',
        'idcliente',
        'iditem',
        'idequipe',
    ];

    public function veiculo()
    {
        return $this->belongsTo(Veiculo::class, 'idveiculo');
    }

    public function cliente()
    {
        return $this->belongsTo(Cliente::class, 'idcliente');
    }

    public function servico()
    {
        return $this->belongsTo(Servico::class, 'iditem');
    }

    public function equipe()
    {
        return $this->belongsTo(Equipe::class, 'idequipe');
    }


public function pecas()
{
    return $this->belongsToMany(Peca::class, 'itens_peca', 'idos', 'idpeca')->withPivot('valor_unitario');
}

    
}
