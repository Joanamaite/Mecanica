<?php

namespace App\Http\Controllers;

use App\Models\OrdemDeServico;
use App\Models\Veiculo;
use App\Models\Cliente;
use App\Models\Servico;
use App\Models\Equipe;
use App\Models\Peca;
use Illuminate\Http\Request;

class OrdemDeServicoController extends Controller
{
    public function create()
    {
        $veiculos = Veiculo::all();
        $clientes = Cliente::all();
        $servicos = Servico::all();
        $equipes = Equipe::all();
        $pecas = Peca::all();

        return view('adicionaOs', compact('veiculos', 'clientes', 'servicos', 'equipes', 'pecas'));
    }
    public function store(Request $request)
    {
        try {
            $validatedData = $request->validate([
                'data_emissao' => 'required|date',
                'data_conclusao' => 'nullable|date',
                'valor' => 'required|',
                'idveiculo' => 'required|exists:veiculos,idveiculo',
                'idcliente' => 'required|exists:clientes,idcliente',
                'iditem' => 'required|exists:itens_servico,iditem',
                'idequipe' => 'required|exists:equipes,idequipe',
                'idpeca' => 'required|array',
                'idpeca.*' => 'exists:pecas,idpeca',
            ]);

            $ordemDeServico = OrdemDeServico::create($validatedData);

            // Adiciona as peças à ordem de serviço usando o método attach
            $ordemDeServico->pecas()->attach($validatedData['idpeca']);

            \Log::info('Ordem de serviço criada com sucesso!');

            return redirect()->route('ordens_de_servico.list')->with('success', 'Ordem de serviço criada com sucesso!');
        } catch (\Exception $e) {
            \Log::error('Erro ao criar ordem de serviço: ' . $e->getMessage());

            return back()->withInput()->with('error', 'Erro ao criar ordem de serviço. Detalhes: ' . $e->getMessage());
        }
    }

public function destroy($id)
{
    try {
        $ordemDeServico = OrdemDeServico::findOrFail($id);
        $ordemDeServico->delete();

        \Log::info('Ordem de serviço excluída com sucesso!');

        return redirect()->route('ordens_de_servico.list')->with('success', 'Ordem de serviço excluída com sucesso!');
    } catch (\Exception $e) {
        \Log::error('Erro ao excluir ordem de serviço: ' . $e->getMessage());

        return back()->with('error', 'Erro ao excluir ordem de serviço. Detalhes: ' . $e->getMessage());
    }
}


    public function listOrdensDeServico(){
    // Carrega as relações necessárias para evitar consultas adicionais na view
    $ordensDeServico = OrdemDeServico::with(['veiculo', 'cliente', 'servico', 'equipe'])->get();

    return view('ordemServico', compact('ordensDeServico'));
}


    
}
