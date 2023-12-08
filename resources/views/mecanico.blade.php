@extends('layouts.main')

@section('title', 'Funcionários')

@section('content')

<div>
    <a href="{{ route('mecanico.form') }}">
        <h1 class="text-center adicionar">Adicionar mecanico</h1>
    </a>
</div>

<div class="main-container">
    <div class="cards">
        @foreach($mecanicos as $mecanico)
            <div class="card card-1">
                <h2 class="card__title">{{ $mecanico->nome }}</h2>
                <p class="card__apply">
                    <a class="card__link" href="#">Endereço: {{ $mecanico->endereco }}</a>
                </p>
                <p class="card__apply">
                    <a class="card__link" href="#">Especialidade: {{ $mecanico->especialidade }}</a>
                </p>
                <p class="card__apply">
                    <a class="card__link" href="#">Código: {{ $mecanico->codigo }}</a>
                </p>
                <div>
                    <a href="{{ route('mecanicos.delete', ['id' => $mecanico->idmecanico]) }}" onclick="return confirm('Tem certeza que deseja excluir este mecanico?')">
                    <ion-icon name="trash-outline" style="font-size: 24px; background: none; border: none; cursor: pointer;" class="icone"></ion-icon>
                    </a>
                    <a href="{{ route('mecanicos.edit', ['id' => $mecanico->idmecanico]) }}">
                <ion-icon name="pencil-outline" style="font-size: 24px;" class="icone"></ion-icon>
            </a>
                </div>
            </div>
        @endforeach
    </div>
</div>

@endsection
