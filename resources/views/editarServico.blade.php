@extends('layouts.main')

@section('title', 'Editar Serviço')

@section('content')

<div class="imagemFundo">
    <div class="info">
        <h1 class="tituloAdicionar">Editar Serviço</h1>
        <form action="{{ route('servicos.update', ['id' => $servico->iditem]) }}" method="post">
            @csrf
            @method('put')
            <div class="text-center">
                <input type="text" class="inputCadastro" placeholder="Descrição" name="descricao" value="{{ $servico->descricao }}">
            </div>
            <div class="text-center mt-3">
                <input type="text" class="inputCadastro" placeholder="Valor Mão de Obra" name="valor_mao_de_obra" value="{{ $servico->valor_mao_de_obra }}">
            </div>
            <div class="text-center">
                <button class="button-87 mt-3" type="submit" role="button">ATUALIZAR</button>
            </div>
        </form>
    </div>
</div>

@endsection
