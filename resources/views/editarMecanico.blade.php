@extends('layouts.main')

@section('title', 'Editar Mecânico')

@section('content')

<div class="imagemFundo4">
    <div class="info">
        <h1 class="tituloAdicionar">Editar Mecânico</h1>
        <form action="{{ route('mecanicos.update', ['id' => $mecanico->idmecanico]) }}" method="post">
            @csrf
            @method('put')
            <div class="text-center">
                <input type="text" class="inputCadastro" placeholder="Nome" name="nome" value="{{ $mecanico->nome }}">
            </div>
            <div class="text-center mt-3">
                <input type="text" class="inputCadastro" placeholder="Endereço" name="endereco" value="{{ $mecanico->endereco }}">
            </div>
            <div class="text-center mt-3">
                <input type="text" class="inputCadastro" placeholder="Especialidade" name="especialidade" value="{{ $mecanico->especialidade }}">
            </div>
            <div class="text-center mt-3">
                <input type="text" class="inputCadastro" placeholder="Código" name="codigo" value="{{ $mecanico->codigo }}">
            </div>
            <div class="text-center">
                <button class="button-87 mt-3" type="submit" role="button">ATUALIZAR</button>
            </div>
        </form>
    </div>
</div>

@endsection
