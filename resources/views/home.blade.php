@extends('layouts.main')

@section('title', 'home')

@section('content')

<img class="banner" src="/img/Group 14.png" alt="banner do site">

<div>
	<a href="/servicos">
    <h1 class="titulo mt-5 ms-5 mb-3">Serviços</h1>
</a>
</div>
<div class="wrapper">
  <div class="cols">
			<div class="col-sm-4 mb-4" ontouchstart="this.classList.toggle('hover');">
				<div class="container">
					<div class="front" style="background-image: url('img/group 15.png')">
							<a href="/clientes">
							<div class="inner">
								<p>Clientes</p>
						</div>
					</a>
					</div>
				</div>
			</div>
			<div class="col-sm-4 mb-4" ontouchstart="this.classList.toggle('hover');">
				<div class="container">
					<div class="front" style="background-image: url('img/pneu.png')">
							<a href="/pecas">
							<div class="inner">
								<p>Peças</p>
						</div>
					</a>
					</div>
				</div>
			</div>
			<div class="col-sm-4 mb-4" ontouchstart="this.classList.toggle('hover');">
				<div class="container">
					<div class="front" style="background-image: url('img/motor.webp')">
							<a href="/veiculos">
							<div class="inner">
								<p>Veículos</p>
						</div>
					</a>
					</div>
				</div>
			</div>
			<div class="col-sm-4 mb-4" ontouchstart="this.classList.toggle('hover');">
				<div class="container">
					<div class="front" style="background-image: url('img/Rectangle 8.png')">
							<a href="/servicos">
							<div class="inner">
								<p>Serviços</p>
						</div>
					</a>
					</div>
				</div>
			</div>
			<div class="col-sm-4 mb-4" ontouchstart="this.classList.toggle('hover');">
				<div class="container">
					<div class="front" style="background-image: url('img/Rectangle 9.png')">
							<a href="/mecanicos">
							<div class="inner">
								<p>Mecanicos</p>
						</div>
					</a>
					</div>
				</div>
			</div>
			<div class="col-sm-4 mb-4" ontouchstart="this.classList.toggle('hover');">
				<div class="container">
					<div class="front" style="background-image: url('img/Rectangle 10.png')">
							<a href="/equipes">
							<div class="inner">
								<p>Equipes</p>
						</div>
					</a>
					</div>
				</div>
			</div>
			<div class="col-sm-4 mb-4" ontouchstart="this.classList.toggle('hover');">
				<div class="container">
					<div class="front" style="background-image: url('img/Rectangle 11.png')">
							<a href="/ordem-de-servico">
							<div class="inner">
								<p>Ordem de serviço</p>
						</div>
					</a>
					</div>
				</div>
			</div>
		</div>
 </div>
@endsection