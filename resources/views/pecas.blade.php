@extends('layouts.main')

@section('title', 'Peças')

@section('content')

<div>
    <a href="/adicionar/pecas">
        <h1 class="text-center adicionar">Adicionar peça</h1>
    </a>
</div>

<div class="main-container">
    <div class="cards">
        @foreach($pecas as $peca)
            <div class="card card-1">
                <h2 class="card__title">{{ $peca->descricao }}</h2>
                <p class="card__apply">
                    <a class="card__link" href="#">Valor: R${{ number_format($peca->valor_unitario, 2, ',', '.') }}</a>
                </p>
                <p class="card__apply">
                    <a class="card__link" href="#">Código: {{ $peca->codigo }}</a>
                </p>
                <div>
                    <!-- Formulário para excluir a peça -->
                    <a href="{{ route('pecas.delete', ['id' => $peca->idpeca]) }}" onclick="return confirm('Tem certeza que deseja excluir esta peça?')">
                            <ion-icon name="trash-outline" style="font-size: 24px; background: none; border: none; cursor: pointer;" class="icone"></ion-icon>
                    </a>
                    <a href="{{ route('pecas.edit', ['id' => $peca->idpeca]) }}">
                <ion-icon name="pencil-outline" style="font-size: 24px;" class="icone"></ion-icon>
            </a>
                </div>
            </div>
        @endforeach
    </div>
</div>

@endsection
