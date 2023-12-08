@extends('layouts.main2')

@section('title', 'Adicionar equipes')

@section('content')

<div class="imagemFundo">
    <div class="info">
        <h1 class="tituloAdicionar">Cadastro de equipes</h1>
<form action="{{ route('equipe.store') }}" method="post">
    @csrf
    <div class="text-center">
        <input type="text" class="inputCadastro" placeholder="Nome" name="nome">
    </div>
    <div class="text-center mt-4">
        <input type="text" class="inputCadastro" placeholder="Função" name="funcao">
    </div>
    <div class="text-center mt-4">
        <select name="mecanicos[]" id="mecanicos" class="inputCadastro" multiple>
            @foreach($mecanicos as $mecanico)
                <option value="{{ $mecanico->idmecanico }}">{{ $mecanico->nome }}</option>
            @endforeach
        </select>
    </div> 
    

    <input type="hidden" name="idequipe" value="{{ $idequipe }}">
    
    <div class="text-center mt-3">
        <button class="button-87 mt-3" type="submit" role="button">CADASTRAR</button>
    </div>
</form>

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/css/select2.min.css">
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js"></script>

<script>
    $(document).ready(function() {
        $('#mecanicos').select2({
            tags: true,
            tokenSeparators: [',', ' '], 
            placeholder: 'Selecione os mecânicos',
        });
    });
</script>

    </div>
</div>

@endsection
