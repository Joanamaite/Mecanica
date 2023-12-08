
<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ClienteController;
use App\Http\Controllers\PecaController;
use App\Http\Controllers\VeiculosController;
use App\Http\Controllers\ServicoController; 
use App\Http\Controllers\MecanicoController; 
use App\Http\Controllers\EquipeController;
use App\Http\Controllers\OrdemDeServicoController;

Route::get('/', function () {
    return view('login');
});

Route::get('/home', function () {
    return view('home');
});

Route::get('/clientes', function () {
    return view('clientes');
});

Route::get('/adicionar/clientes', function () {
    return view('adicionarCliente');
});

Route::get('/pecas', function () {
    return view('pecas');
});

Route::get('/adicionar/pecas', function () {
    return view('adicionaPeca');
});

Route::get('/veiculos', function () {
    return view('veiculos');
});

Route::get('/adiciona/veiculos', function () {
    return view('adicionaVeiculo');
});

Route::get('/servicos', function () {
    return view('servicos');
});

Route::get('/adiciona/servico', function () {
    return view('adicionaServico');
});

Route::get('/mecanicos', function () {
    return view('mecanico');
});

Route::get('/adiciona/mecanico', function () {
    return view('adicionarMecanico');
});

Route::get('/equipes', function () {
    return view('equipes');
});

Route::get('/cria/equipe', function () {
    return view('adicionaEquipe');
});

Route::get('/ordem-de-servico', function () {
    return view('ordemServico');
});

Route::get('/adiciona/ordem-de-servico', function () {
    return view('adicionaOs');
});


Route::get('/editar/cliente/{id}', function () {
    return view('editarCliente');
});

Route::get('/editar/peca/{id}', function () {
    return view('editarPeca');
});

Route::get('/editar/veiculo/{id}', function () {
    return view('editarVeiculo');
});

Route::get('/editar/servico/{id}', function () {
    return view('editarServico');
});

Route::get('/editar/mecanico/{id}', function () {
    return view('editarMecanico');
});

Route::get('/editar/equipe/{id}', function () {
    return view('editarEquipe');
});

Route::get('/login', [LoginController::class, 'showLoginForm'])->name('admin.login');
Route::post('/login', [LoginController::class, 'login']);
Route::post('/admin/logout', [LoginController::class, 'logout']);

// Rotas para clientes
Route::get('/clientes', [ClienteController::class, 'listClientes'])->name('clientes.list');
Route::get('/adicionar/clientes', [ClienteController::class, 'showForm'])->name('cliente.form');
Route::post('/adicionar/clientes', [ClienteController::class, 'store']);
Route::get('/clientes/{id}/delete', [ClienteController::class, 'delete'])->name('clientes.delete');
Route::get('/editar/cliente/{id}', [ClienteController::class, 'editForm'])->name('clientes.edit');
Route::put('/editar/cliente/{id}', [ClienteController::class, 'update'])->name('clientes.update');

// Rotas para peças
Route::get('/pecas', [PecaController::class, 'listPecas'])->name('pecas.list');
Route::get('/adicionar/pecas', [PecaController::class, 'showForm'])->name('peca.form');
Route::post('/adicionar/pecas', [PecaController::class, 'store'])->name('peca.store');
Route::get('/pecas/delete/{id}', [PecaController::class, 'delete'])->name('pecas.delete');
Route::get('/editar/peca/{id}', [PecaController::class, 'editForm'])->name('pecas.edit');
Route::put('/editar/peca/{id}', [PecaController::class, 'update'])->name('pecas.update');


// Rotas para veículos
Route::get('/veiculos', [VeiculosController::class, 'listVeiculos'])->name('veiculos.list');
Route::get('/adiciona/veiculos', [VeiculosController::class, 'showForm'])->name('veiculo.form');
Route::post('/adiciona/veiculos', [VeiculosController::class, 'store'])->name('veiculo.store');
Route::get('/veiculos/{id}/delete', [VeiculosController::class, 'delete'])->name('veiculos.delete');
Route::get('/editar/veiculo/{id}', [VeiculosController::class, 'editForm'])->name('veiculos.edit');
Route::put('/editar/veiculo/{id}', [VeiculosController::class, 'update'])->name('veiculos.update');


// Rotas para serviços
Route::get('/servicos', [ServicoController::class, 'listServicos'])->name('servicos.list');
Route::get('/adiciona/servico', [ServicoController::class, 'showForm'])->name('servico.form');
Route::post('/adiciona/servico', [ServicoController::class, 'store'])->name('servico.store');
Route::get('/servicos/{id}/delete', [ServicoController::class, 'delete'])->name('servicos.delete');
Route::get('/editar/servico/{id}', [ServicoController::class, 'editForm'])->name('servicos.edit');
Route::put('/editar/servico/{id}', [ServicoController::class, 'update'])->name('servicos.update');


// Rotas para mecânicos
Route::get('/mecanicos', [MecanicoController::class, 'listMecanicos'])->name('mecanico.list');
Route::get('/adiciona/mecanico', [MecanicoController::class, 'showForm'])->name('mecanico.form');
Route::post('/adiciona/mecanico', [MecanicoController::class, 'store'])->name('mecanico.store');
Route::get('/mecanicos/{id}/delete', [MecanicoController::class, 'delete'])->name('mecanicos.delete');
Route::get('/editar/mecanico/{id}', [MecanicoController::class, 'editForm'])->name('mecanicos.edit');
Route::put('/editar/mecanico/{id}', [MecanicoController::class, 'update'])->name('mecanicos.update');


// Rotas para equipes
Route::get('/equipes', [EquipeController::class, 'listEquipes'])->name('equipes.list');
Route::get('/cria/equipe', [EquipeController::class, 'create'])->name('equipe.form');
Route::post('/cria/equipe', [EquipeController::class, 'store'])->name('equipe.store');
Route::get('/equipes/{id}/delete', [EquipeController::class, 'destroy'])->name('equipe.destroy');
Route::get('/editar/equipe/{id}', [EquipeController::class, 'edit'])->name('equipes.edit');
Route::put('/editar/equipe/{id}', [EquipeController::class, 'update'])->name('equipes.update');

// Rotas para ordem de serviço
Route::get('/adiciona/ordem-de-servico', [OrdemDeServicoController::class, 'create'])->name('ordem_de_servico.create');
Route::post('/adiciona/ordem-de-servico', [OrdemDeServicoController::class, 'store'])->name('ordem_de_servico.store');
Route::get('/ordem-de-servico', [OrdemDeServicoController::class, 'listOrdensDeServico'])->name('ordens_de_servico.list');
Route::get('/ordens-de-servico', [OrdemDeServicoController::class, 'listOrdensDeServico'])->name('ordens_de_servico.list');
Route::get('/ordem-de-servico/{id}',[OrdemDeServicoController::class, 'destroy'])->name('ordem_de_servico.destroy');