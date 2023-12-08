@extends('layouts.main')

@section('title', 'Clientes')

@section('content')
    <div>
        <a href="/adicionar/clientes">
            <h1 class="text-center adicionar">Adicionar clientes</h1>
        </a>
    </div>
    <div class="main-container">
        <div class="cards">
            @foreach($clientes as $cliente)
                <div class="card card-1">
                    <h2 class="card__title">{{ $cliente->nome }}</h2>
                    <p class="card__apply">
                        <a class="card__link" href="#">Endereço: {{ $cliente->endereco }}</a>
                    </p>
                    <p class="card__apply">
                        <a class="card__link" href="#">Telefone: {{ $cliente->telefone }}</a>
                    </p>
                    <p class="card__apply">
                        <a class="card__link" href="#">Código: {{ $cliente->codigo }}</a>
                    </p>
                    <div>
                    <a href="{{ route('clientes.delete', ['id' => $cliente->idcliente]) }}" onclick="return confirm('Tem certeza que deseja excluir este cliente?')">
                    <ion-icon name="trash-outline" style="font-size: 24px;" class="icone"></ion-icon>
                     </a>
                     <a href="{{ route('clientes.edit', ['id' => $cliente->idcliente]) }}">
                    <ion-icon name="pencil-outline" style="font-size: 24px;" class="icone"></ion-icon>
                    </a>

                    </div>

                </div>
            @endforeach
        </div>
    </div>
@endsection
