@extends('layouts.main')

@section('title', 'Editar cliente')

@section('content')

<div class="imagemFundo no-footer">
    <div class="info">
        <h1 class="tituloAdicionar">Editar Cliente</h1>
        <form action="{{ route('clientes.update', ['id' => $cliente->idcliente]) }}" method="post">
            @csrf
            @method('put')
            <div class="text-center">
                <input type="text" class="inputCadastro" placeholder="Nome" name="nome" value="{{ $cliente->nome }}">
            </div>
            <div class="text-center mt-3">
                <input type="text" class="inputCadastro" placeholder="Endereço" name="endereco" value="{{ $cliente->endereco }}">
            </div>
            <div class="text-center mt-3">
                <input type="text" class="inputCadastro" placeholder="Telefone" name="telefone" value="{{ $cliente->telefone }}">
            </div>
            <div class="text-center mt-3">
                <input type="text" class="inputCadastro" placeholder="Código" name="codigo" value="{{ $cliente->codigo }}">
            </div>
            <div class="text-center">
                <button class="button-87 mt-3" type="submit" role="button">ATUALIZAR</button>
            </div>
        </form>
    </div>
</div>

@endsection
