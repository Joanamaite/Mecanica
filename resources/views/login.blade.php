@extends('layouts.guest')

@section('title', 'Login')

@section('content')
    <div class="d-flex justify-content-center align-items-center">
        <div class="col-sm-6 col-md-6 text-center">
            <img class="logo" src="/img/logo.png" alt="logo da mecânica">
            <h2 class="mt-5 acessar">Acesse sua conta</h2>

            <form method="POST" action="{{ route('admin.login') }}">
    @csrf

    <input class="mt-5 inputNome" placeholder="Email" type="text" name="email">
    <input class="mt-5 inputNome" placeholder="Senha" type="password" name="password">

    <button class="button-87 mt-5" type="submit" role="button">ENVIAR</button>
</form>




            <div class="mt-5 ms-4 w-100 link">
                <a href="/">Voltar a tela de home?</a>
            </div>
        </div>

        <div class="col-sm-6 col-md-6">
            <img class="float-end imagemLogin" src="/img/imagemLogin.jpg" alt="imagem de login">
        </div>
    </div>
@endsection
