
@extends('layouts.main2')

@section('title', 'Adicionar Serviço')

@section('content')

<div class="imagemFundo">
    <div class="info">
        <h1 class="tituloAdicionar">Cadastro de serviço</h1>
        <form action="{{ route('servico.store') }}" method="post">
            @csrf
            <div class="text-center">
                <input type="text" class="inputCadastro" name="descricao" placeholder="Descrição" required>
            </div>
            <div class="text-center mt-4">
                <input type="text" name="valor_mao_de_obra" id="valor" class="inputCadastro" placeholder="R$ 0.00" pattern="[0-9]+([\.][0-9]{1.2})?" required>
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
