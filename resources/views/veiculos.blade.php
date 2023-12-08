@extends('layouts.main')

@section('title', 'Veículos')

@section('content')

<div>
    <a href="/adiciona/veiculos">
        <h1 class="text-center adicionar">Adicionar veículo</h1>
    </a>
</div>
<div>

    <div class="main-container">
        <div class="cards">
        @foreach($veiculos as $veiculo)
    <div class="card card-1">
        <h2 class="card__title">{{ $veiculo->descricao }}</h2>
 
        <p class="card__apply">
            <a class="card__link" href="#">Placa: {{ $veiculo->placa }}</a>
        </p>
        <p class="card__apply">
            <a class="card__link" href="#">Código: {{ $veiculo->codigo }}</a>
        </p>
        <p class="card__apply">
            <a class="card__link" href="#">Cliente: {{ $veiculo->cliente->nome ?? 'N/A' }}</a>
        </p>
        <div>
            <a href="{{ route('veiculos.delete', ['id' => $veiculo->idveiculo]) }}" onclick="return confirm('Tem certeza que deseja excluir este veículo?')">
                <ion-icon name="trash-outline" style="font-size: 24px;" class="icone"></ion-icon>
            </a>
            <a href="{{ route('veiculos.edit', ['id' => $veiculo->idveiculo]) }}">
                <ion-icon name="pencil-outline" style="font-size: 24px;"  class="icone"></ion-icon>
            </a>
        </div>
    </div>
@endforeach
        </div>
    </div>
</div>
@endsection
