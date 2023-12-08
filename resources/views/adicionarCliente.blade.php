@extends('layouts.main2')

@section('title', 'Adicionar clientes')

@section('content')

<div class="imagemFundo no-footer">
<div class="info">
    <h1 class="tituloAdicionar">Cadastro de clientes</h1>
    <form action="{{ route('cliente.form') }}" method="post">
                @csrf
                <div class="text-center">
                    <input type="text" class="inputCadastro" placeholder="Nome" name="nome">
                </div>
                <div class="text-center mt-3">
                    <input type="text" class="inputCadastro" placeholder="Endereço" name="endereco">
                </div>
                <div class="text-center mt-3">
                    <input type="text" class="inputCadastro" placeholder="Telefone" name="telefone">
                </div>
                <div class="text-center mt-3">
                    <input type="text" class="inputCadastro" placeholder="Código" name="codigo">
                </div>
                <div class="text-center">
                    <button class="button-87 mt-3" type="submit" role="button">CADASTRAR</button>
                </div>
            </form>
</div>
</div>

@endsection