<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Peca extends Model
{
    use HasFactory;

    protected $table = 'pecas';
    protected $primaryKey = 'idpeca';

    protected $fillable = ['descricao', 'valor_unitario', 'codigo'];

    public function deletePeca(){
        $this->delete();
    }
}

