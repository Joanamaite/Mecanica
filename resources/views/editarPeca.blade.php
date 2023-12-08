@extends('layouts.main')

@section('title', 'Editar peça')

@section('content')

<div class="imagemFundo2">
    <div class="info">
        <h1 class="tituloAdicionar">Editar Peça</h1>
        <form action="{{ route('pecas.update', ['id' => $peca->idpeca]) }}" method="post">
            @csrf
            @method('put')
            <div class="text-center">
                <input type="text" class="inputCadastro" placeholder="Descrição" name="descricao" value="{{ $peca->descricao }}">
            </div>
            <div class="text-center mt-3">
                <input type="text" class="inputCadastro" placeholder="Valor Unitário" name="valor_unitario" value="{{ $peca->valor_unitario }}">
            </div>
            <div class="text-center mt-3">
                <input type="text" class="inputCadastro" placeholder="Código" name="codigo" value="{{ $peca->codigo }}">
            </div>
            <div class="text-center">
                <button class="button-87 mt-3" type="submit" role="button">ATUALIZAR</button>
            </div>
        </form>
    </div>
</div>

@endsection
