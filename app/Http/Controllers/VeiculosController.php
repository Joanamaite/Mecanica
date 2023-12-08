<?php

namespace App\Http\Controllers;

use App\Models\Veiculo;
use App\Models\Cliente;
use Illuminate\Http\Request;

class VeiculosController extends Controller
{
    public function showForm()
    {
        $clientes = Cliente::all();
        return view('adicionaVeiculo', ['clientes' => $clientes]);
    }

    public function store(Request $request){
        $validatedData = $request->validate([
            'idcliente' => 'required|exists:clientes,idcliente', 
            'placa' => 'required',
            'descricao' => 'required',
            'codigo' => 'required',
        ]);
    
        try {
            Veiculo::create($validatedData);
    
            return redirect()->route('veiculos.list')->with('success', 'Veículo cadastrado com sucesso!');
        } catch (\Exception $e) {
            // Log do erro
            \Log::error('Erro ao cadastrar veículo: ' . $e->getMessage());
    
            return redirect()->route('veiculo.form')->with('error', 'Erro ao cadastrar veículo. Por favor, tente novamente.');
        }
    }
    

    public function delete($id){
        try {
            $veiculo = Veiculo::findOrFail($id);
            $veiculo->deleteVeiculo();

            return redirect()->route('veiculos.list')->with('success', 'Veículo excluído com sucesso');
        } catch (\Exception $e) {
            \Log::error('Erro ao excluir veículo: ' . $e->getMessage());

            return back()->with('error', 'Erro ao excluir veículo. Detalhes: ' . $e->getMessage());
        }
    }
    public function cliente()
    {
        return $this->belongsTo(Cliente::class, 'idcliente');
    }
    public function editForm($id)
    {
        $veiculo = Veiculo::findOrFail($id);
        $clientes = Cliente::all();
        return view('editarVeiculo', ['veiculo' => $veiculo, 'clientes' => $clientes]);
    }
    
    public function update(Request $request, $id)
    {
        $request->validate([
            'idcliente' => 'required|exists:clientes,idcliente', 
            'descricao' => 'required',
            'placa' => 'required',
            'codigo' => 'required',
        ]);
    
        $veiculo = Veiculo::findOrFail($id);
        $veiculo->update([
            'idcliente' => $request->input('idcliente'),
            'descricao' => $request->input('descricao'),
            'placa' => $request->input('placa'),
            'codigo' => $request->input('codigo'),
        ]);
    
        return redirect()->route('veiculos.list')->with('success', 'Veículo atualizado com sucesso!');
    }
    
    public function listVeiculos()
    {
        $veiculos = Veiculo::with('cliente')->get();
        return view('veiculos', ['veiculos' => $veiculos]);
    }
}
