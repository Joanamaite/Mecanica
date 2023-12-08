@extends('layouts.main')

@section('title', 'Ordens de Serviço')

@section('content')
    <div>
        <a href="/adiciona/ordem-de-servico">
            <h1 class="text-center adicionar">Adicionar ordem de serviço</h1>
        </a>
    </div>
    <div class="main-container">
        <div class="cards">
            @foreach($ordensDeServico as $ordem)
                <div class="card card-1">
                    <h2 class="card__title">Ordem de Serviço #{{ $ordem->idos }}</h2>
                    <p class="card__apply">
                        <a class="card__link">Cliente: {{ $ordem->cliente->nome ?? 'N/A' }}</a>
                    </p>
                    <p class="card__apply">
                        <a class="card__link">Data de Emissão: {{ $ordem->data_emissao ?? 'N/A' }}</a> 
                    </p>
                    <p class="card__apply">
                        <a class="card__link">Data de Conclusão: {{ $ordem->data_conclusao ?? 'N/A' }}</a> 
                    </p>
                    <p class="card__apply">
                        <a class="card__link">Equipe: {{ $ordem->equipe->nome ?? 'N/A' }}</a> 
                    </p>
                    <p class="card__apply">
                        <a class="card__link">
                            Serviço: {{ optional($ordem->servico)->descricao ?? 'N/A' }}
                        </a> 
                    </p>

                    <p class="card__apply">
                        <a class="card__link">Valor total: R$ {{ number_format(optional($ordem->peca)->sum('valor_unitario') + optional($ordem->servico)->valor_mao_de_obra, 2, ',', '.') ?? 'N/A' }}</a>
                    </p>
                    <div>
                    <a href="{{ route('ordem_de_servico.destroy', ['id' => $ordem->idos]) }}" onclick="return confirm('Tem certeza que deseja excluir este mecanico?')">
                    <ion-icon name="trash-outline" style="font-size: 24px; background: none; border: none; cursor: pointer;" class="icone"></ion-icon>
</a>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
