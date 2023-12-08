@extends('layouts.main2')

@section('title', 'Adicionar Ordem de Serviço')

@section('content')

<div class="d-flex justify-content-center align-items-center vh-100 imagemFundo">
    <div class="info1 text-center ">
        <h1 class="tituloAdicionar1">Cadastro de ordens de serviço</h1>
        <form action="{{ route('ordem_de_servico.store') }}" method="post">
            @csrf
            <div class="row ms-2">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="data_emissao">Data de Emissão:</label>
                        <input type="date" class="form-control" name="data_emissao" required value="{{ now()->toDateString() }}">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="data_conclusao">Data de Conclusão:</label>
                        <input type="date" class="form-control" name="data_conclusao" value="{{ old('data_conclusao') }}">
                    </div>
                </div>
            </div>
            <div class="row ms-2">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="valor">Valor:</label>
                        <input type="text" class="form-control" name="valor" placeholder="Valor" required>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="idpeca">Peça:</label>
                        <select name="idpeca[]" id="idpeca" class="form-control" multiple>
                            @foreach($pecas as $peca)
                                <option value="{{ $peca->idpeca }}">{{ $peca->descricao }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
            </div>
            <div class="row ms-2">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="idveiculo">Veículo:</label>
                        <select name="idveiculo" class="form-control">
                            @foreach($veiculos as $veiculo)
                                <option value="{{ $veiculo->idveiculo }}">{{ $veiculo->placa }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="idcliente">Cliente:</label>
                        <select name="idcliente" class="form-control">
                            @foreach($clientes as $cliente)
                                <option value="{{ $cliente->idcliente }}">{{ $cliente->nome }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
            </div>
            <div class="row ms-2">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="iditem">Serviço:</label>
                        <select name="iditem" id="iditem" class="form-control">
                            @foreach($servicos as $servico)
                                <option value="{{ $servico->iditem }}">{{ $servico->descricao }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="idequipe">Equipe:</label>
                        <select name="idequipe" class="form-group">
                            @foreach($equipes as $equipe)
                                <option value="{{ $equipe->idequipe }}">{{ $equipe->nome }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
            </div>


            <div class="text-center mt-5">
                <button class="button-87" type="submit" role="button">CADASTRAR</button>
            </div>
        </form>

        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/css/select2.min.css">
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js"></script>

        <script>
            $(document).ready(function() {
                $('select').select2({
                    tags: true,
                    tokenSeparators: [',', ' '], 
                    placeholder: 'Selecione',
                });
            });
        </script>
    </div>
</div>

@endsection
