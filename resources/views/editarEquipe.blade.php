@extends('layouts.main')

@section('title', 'Editar Equipe')

@section('content')

<div class="imagemFundo">
    <div class="info">
        <h1 class="tituloAdicionar">Editar Equipe</h1>
        <form action="{{ route('equipes.update', ['id' => $equipe->idequipe]) }}" method="post">
    @csrf
    @method('put')
    
    <div class="text-center">

        <input type="text" class="inputCadastro" placeholder="Nome" name="nome" value="{{ $equipe->nome }}">
    </div>
    
    <div class="text-center mt-3">
        <input type="text" class="inputCadastro" placeholder="Função" name="funcao" value="{{ $equipe->funcao }}">
    </div>


    
    <div class="text-center">
        <button class="button-87 mt-3" type="submit" role="button">ATUALIZAR</button>
    </div>
</form>

    </div>
</div>

@endsection
