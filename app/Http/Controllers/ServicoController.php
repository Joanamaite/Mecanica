<?php

namespace App\Http\Controllers;

use App\Models\Servico;
use Illuminate\Http\Request;

class ServicoController extends Controller
{
    public function showForm()
    {
        $servicos = Servico::all();

        return view('adicionaServico', ['servicos' => $servicos]);
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'descricao' => 'required',
            'valor_mao_de_obra' => 'required|numeric',
        ]);

        try {
            Servico::create($validatedData);

            return redirect()->route('servicos.list')->with('success', 'Serviço cadastrado com sucesso');
        } catch (\Exception $e) {
            \Log::error('Erro ao cadastrar serviço: ' . $e->getMessage());

            return response()->json(['error' => 'Erro ao cadastrar serviço. Detalhes: ' . $e->getMessage()], 500);
        }
    }

    public function delete($id)
    {
        try {
            $servico = Servico::findOrFail($id);
            $servico->delete();

            return redirect()->route('servicos.list')->with('success', 'Serviço excluído com sucesso');
        } catch (\Exception $e) {
            \Log::error('Erro ao excluir serviço: ' . $e->getMessage());

            return back()->with('error', 'Erro ao excluir serviço. Detalhes: ' . $e->getMessage());
        }
    }
    public function editForm($id)
{
    $servico = Servico::findOrFail($id);
    return view('editarServico', ['servico' => $servico]);
}

public function update(Request $request, $id)
{
    $request->validate([
        'descricao' => 'required',
        'valor_mao_de_obra' => 'required|numeric',
    ]);

    $servico = Servico::findOrFail($id);
    $servico->update([
        'descricao' => $request->input('descricao'),
        'valor_mao_de_obra' => $request->input('valor_mao_de_obra'),
    ]);

    return redirect()->route('servicos.list')->with('success', 'Serviço atualizado com sucesso!');
}


    public function listServicos()
    {
        $servicos = Servico::all();
        return view('servicos', ['servicos' => $servicos]);
    }
}
