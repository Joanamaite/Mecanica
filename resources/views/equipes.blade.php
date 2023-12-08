@extends('layouts.main')

@section('title', 'Equipes')

@section('content')
    <div>
        <a href="/cria/equipe">
            <h1 class="text-center adicionar">Adicionar equipe</h1>
        </a>
    </div>
    @if(session('error'))
<div class="alert alert-danger" id="error-message">
    {{ session('error') }}
</div>
@endif

    <div class="main-container">
        <div class="cards">
        @foreach($equipes as $equipe)
    <div class="card card-1">
        <h2 class="card__title">{{ $equipe->nome }}</h2>
        <p class="card__apply">
            <a class="card__link" href="#">Função: {{ $equipe->funcao }}</a>
        </p>
        <p class="card__apply">
            <strong class="card__link" >Mecânicos:</strong>
            <ul>
                @foreach($equipe->nomesMecanicos() as $nomeMecanico)
                    <li>{{ $nomeMecanico }}</li>
                @endforeach
            </ul>
        </p>
        <div>
        <a href="{{ route('equipe.destroy', ['id' => $equipe->idequipe]) }}" onclick="return confirm('Tem certeza que deseja excluir esta equipe?')">
                    <ion-icon name="trash-outline" style="font-size: 24px; background: none; border: none; cursor: pointer;" class="icone"></ion-icon>
                    </a>

                    <a href="{{ route('equipes.edit', ['id' => $equipe->idequipe]) }}">
                <ion-icon name="pencil-outline" style="font-size: 24px;" class="icone"></ion-icon>
            </a>


        </div>
    </div>
@endforeach
<script>
    document.addEventListener('DOMContentLoaded', function() {
        var errorMessage = document.getElementById('error-message');
        if (errorMessage) {
            setTimeout(function() {
                errorMessage.style.display = 'none';
            }, 3000);
        }
    });
</script>

        </div>
    </div>
@endsection
