@extends('layouts.main2')

@section('title', 'Adicionar veículo')

@section('content')

<div class="imagemFundo3">
    <div class="info2">
        <h1 class="tituloAdicionar">Cadastro de veículos</h1>
        <form action="{{ route('veiculo.store') }}" method="post">
            @csrf

            <div class="text-center mt-3">
                <select class="inputCadastro" name="idcliente" required>
                    <option value="idcliente" selected disabled>Selecione um cliente</option>
                    @foreach($clientes as $cliente)
                        <option value="{{ $cliente->idcliente }}">{{ $cliente->nome }}</option>
                    @endforeach
                </select>
            </div>

            <div class="text-center mt-3">
                <input type="text" class="inputCadastro" name="nome" placeholder="Nome" required>
            </div>
            <div class="text-center mt-3">
                <input type="text" class="inputCadastro" name="descricao" placeholder="Descrição" required>
            </div>
            <div class="text-center mt-3">
                <input type="text" class="inputCadastro" name="placa" placeholder="Placa" required>
            </div>
            <div class="text-center mt-3">
                <input type="text" class="inputCadastro" name="codigo" placeholder="Código" required>
            </div>

            <div class="text-center">
                <button type="submit" class="button-87 mt-3" role="button">CADASTRAR</button>
            </div>
        </form>
    </div>
</div>

@endsection
