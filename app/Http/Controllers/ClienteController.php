<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use Illuminate\Http\Request;

class ClienteController extends Controller
{
    public function showForm()
    {
        return view('adicionarCliente');
    }

    public function store(Request $request){
        $request->validate([
            'nome' => 'required',
            'endereco' => 'required',
            'telefone' => 'required',
            'codigo' => 'required',
        ]);

        Cliente::create([
            'nome' => $request->input('nome'),
            'endereco' => $request->input('endereco'),
            'telefone' => $request->input('telefone'),
            'codigo' => $request->input('codigo'),
        ]);


        return redirect()->route('clientes.list')->with('success', 'Cliente cadastrado com sucesso!');
    }

    public function delete($id){
    try {
        $cliente = Cliente::findOrFail($id);
        $cliente->delete();

        return redirect()->route('clientes.list')->with('success', 'Cliente excluído com sucesso');
    } catch (\Exception $e) {
        \Log::error('Erro ao excluir cliente: ' . $e->getMessage());

        return back()->with('error', 'Erro ao excluir cliente. Detalhes: ' . $e->getMessage());
    }
}
public function editForm($id){
    $cliente = Cliente::findOrFail($id);
    return view('editarCliente', ['cliente' => $cliente]);
}

public function update(Request $request, $id){
    $request->validate([
        'nome' => 'required',
        'endereco' => 'required',
        'telefone' => 'required',
        'codigo' => 'required',
    ]);

    $cliente = Cliente::findOrFail($id);
    $cliente->update([
        'nome' => $request->input('nome'),
        'endereco' => $request->input('endereco'),
        'telefone' => $request->input('telefone'),
        'codigo' => $request->input('codigo'),
    ]);

    return redirect()->route('clientes.list')->with('success', 'Cliente atualizado com sucesso!');
}


    public function listClientes()
    {
        $clientes = Cliente::all();
        return view('clientes', ['clientes' => $clientes]);
    }
}
