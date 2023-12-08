<?php

namespace App\Http\Controllers;

use App\Models\Equipe;
use App\Models\Mecanico;
use Illuminate\Http\Request;

class EquipeController extends Controller
{
    public function create()
    {
        $mecanicos = Mecanico::all();
        $idequipe = null; 
    
        return view('adicionaEquipe', ['mecanicos' => $mecanicos, 'idequipe' => $idequipe]);
    }
    
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nome' => 'required',
            'funcao' => 'required',
            'mecanicos' => 'required|array',
        ]);
    
        try {
            // Cria a equipe
            $equipe = Equipe::create([
                'nome' => $validatedData['nome'],
                'funcao' => $validatedData['funcao'],
            ]);
    
            // Adiciona os mecânicos à equipe apenas se houver mecânicos selecionados
            if (!empty($validatedData['mecanicos'])) {
                // Obtem os IDs reais dos mecânicos a partir dos dados do formulário
                $mecanicosIds = Mecanico::whereIn('idmecanico', $validatedData['mecanicos'])->pluck('idmecanico')->toArray();
    
                // Adiciona os mecânicos à equipe usando os IDs reais
                $equipe->mecanicos()->attach($mecanicosIds);
            }
    
            return redirect()->route('equipes.list')->with('success', 'Equipe criada com sucesso!');
        } catch (\Exception $e) {
            \Log::error('Erro ao criar equipe: ' . $e->getMessage());
    
            return back()->withInput()->with('error', 'Erro ao criar equipe. Detalhes: ' . $e->getMessage());
        }
    }
    
    public function listEquipes()
    {
        $equipes = Equipe::all();
        return view('equipes', ['equipes' => $equipes]);
    }



public function destroy($id)
{
    try {

        $equipe = Equipe::findOrFail($id);


        $equipe->delete();

        flash()->success('Equipe excluída com sucesso!');
        return redirect()->route('equipes.list');
    } catch (\Exception $e) {
        \Log::error('Erro ao excluir equipe: ' . $e->getMessage());
        flash()->error('Erro ao excluir equipe. Detalhes: ' . $e->getMessage());
        return back();
    }
}

public function edit($id)
{
    $equipe = Equipe::find($id);
    $mecanicos = Mecanico::all();

    return view('editarEquipe', ['equipe' => $equipe, 'mecanicos' => $mecanicos]);
}

public function update(Request $request, $id)
{
    $validatedData = $request->validate([
        'nome' => 'required',
        'funcao' => 'required',
        'mecanicos' => 'required|array',
    ]);

    try {
        // Busca a equipe pelo ID
        $equipe = Equipe::find($id);

        // Atualiza os dados da equipe
        $equipe->update([
            'nome' => $validatedData['nome'],
            'funcao' => $validatedData['funcao'],
        ]);

        // Sincroniza os mecânicos associados à equipe
        $equipe->mecanicos()->sync($validatedData['mecanicos']);

        return redirect()->route('equipes.list')->with('success', 'Equipe atualizada com sucesso!');
    } catch (\Exception $e) {
        \Log::error('Erro ao atualizar equipe: ' . $e->getMessage());

        return back()->withInput()->with('error', 'Erro ao atualizar equipe. Detalhes: ' . $e->getMessage());
    }
}


}



