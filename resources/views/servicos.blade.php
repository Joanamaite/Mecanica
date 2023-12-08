@extends('layouts.main')

@section('title', 'home')

@section('content')

<div>
    <a href="/adiciona/servico">
        <h1 class="text-center adicionar">Adicionar serviços</h1>
    </a>
</div>

<div class="main-container">
    <div class="cards">
        @foreach($servicos as $servico)
            <div class="card card-1">
                <h2 class="card__title">Serviço</h2>
                <p class="card__apply">
                    <a class="card__link" href="#">Descrição: {{ $servico->descricao }}</a>
                </p>
                <p class="card__apply">
                    <a class="card__link" href="#">Valor: R$ {{ number_format($servico->valor_mao_de_obra, 2, ',', '.') }}</a>
                </p>
                <div class="d-flex">
                    <a href="{{ route('servicos.delete', ['id' => $servico->iditem]) }}" onclick="return confirm('Tem certeza que deseja excluir este cliente?')">
                    <ion-icon name="trash-outline"  style="font-size: 24px; background: none; border: none; cursor: pointer;" class="icone"></ion-icon>
                    </a>
                    <a href="{{ route('servicos.edit', ['id' => $servico->iditem]) }}">
                <ion-icon name="pencil-outline" style="font-size: 24px;" class="icone"></ion-icon>
            </a>
                </div>
            </div>
        @endforeach
    </div>
</div>

@endsection
