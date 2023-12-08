<!-- resources/views/adicionaPeca.blade.php -->

@extends('layouts.main2')

@section('title', 'Adicionar Peças')

@section('content')
    <div class="imagemFundo2">
        <div class="info">
            <h1 class="tituloAdicionar">Cadastro de Peças</h1>
            <form action="{{ route('peca.store') }}" method="post">
                @csrf
                <div class="text-center mt-4">
                    <input type="text" class="inputCadastro" name="descricao" placeholder="Descrição" required>
                </div>
                <div class="text-center mt-4">
                    <input type="text" class="inputCadastro" name="valor_unitario" placeholder="R$ 0.00" pattern="[0-9]+([\.][0-9]{1,2})?" required>
                </div>
                <div class="text-center mt-4">
                    <input type="text" class="inputCadastro" name="codigo" placeholder="Código" required>
                </div>
                <div class="text-center mt-3">
                    <button type="submit" class="button-87 mt-3">CADASTRAR</button>
                </div>
            </form>
        </div>
    </div>
@endsection
