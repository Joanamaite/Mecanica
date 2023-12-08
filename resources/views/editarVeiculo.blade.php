@extends('layouts.main')

@section('title', 'Editar veículo')

@section('content')

<div class="imagemFundo3">
    <div class="info">
        <h1 class="tituloAdicionar">Editar Veículo</h1>
        <form action="{{ route('veiculos.update', ['id' => $veiculo->idveiculo]) }}" method="post">
            @csrf
            @method('put')
            <div class="text-center">
                <input type="text" class="inputCadastro" placeholder="Descrição" name="descricao" value="{{ $veiculo->descricao }}">
            </div>
            <div class="text-center mt-3">
                <input type="text" class="inputCadastro" placeholder="Placa" name="placa" value="{{ $veiculo->placa }}">
            </div>
            <div class="text-center mt-3">
                <input type="text" class="inputCadastro" placeholder="Código" name="codigo" value="{{ $veiculo->codigo }}">
            </div>
            <!-- Add a dropdown for selecting the client... -->
            <div class="text-center mt-3">
                <select name="idcliente" class="inputCadastro">
                    @foreach($clientes as $cliente)
                        <option value="{{ $cliente->idcliente }}" {{ $veiculo->idcliente == $cliente->idcliente ? 'selected' : '' }}>{{ $cliente->nome }}</option>
                    @endforeach
                </select>
            </div>
            <div class="text-center">
                <button class="button-87 mt-3" type="submit" role="button">ATUALIZAR</button>
            </div>
        </form>
    </div>
</div>

@endsection
