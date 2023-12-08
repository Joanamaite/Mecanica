<?php

namespace App\Http\Controllers;

use App\Models\Mecanico;
use Illuminate\Http\Request;

class MecanicoController extends Controller
{
    public function showForm()
    {
        return view('adicionarFuncionario');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nome' => 'required',
            'endereco' => 'required',
            'especialidade' => 'required',
            'codigo' => 'required',
        ]);

        try {
            Mecanico::create($validatedData);

            return redirect()->route('mecanico.list')->with('success', 'Mecânico cadastrado com sucesso');
        } catch (\Exception $e) {
            \Log::error('Erro ao cadastrar mecânico: ' . $e->getMessage());

            return back()->withInput()->with('error', 'Erro ao cadastrar mecânico. Detalhes: ' . $e->getMessage());
        }
    }

    public function delete($id)
    {
        try {
            $mecanico = Mecanico::findOrFail($id);

            // Verificar se há uma equipe vinculada a este mecânico
            if ($mecanico->equipe) {
                return back()->with('error', 'Não é possível excluir o mecânico. Existem equipes vinculadas a este mecânico.');
            }

            $mecanico->delete();

            return redirect()->route('mecanico.list')->with('success', 'Mecânico excluído com sucesso');
        } catch (\Exception $e) {
            \Log::error('Erro ao excluir mecânico: ' . $e->getMessage());

            return back()->with('error', 'Erro ao excluir mecânico. Detalhes: ' . $e->getMessage());
        }
    }
    public function editForm($id)
{
    $mecanico = Mecanico::findOrFail($id);
    return view('editarMecanico', ['mecanico' => $mecanico]);
}

public function update(Request $request, $id)
{
    $request->validate([
        'nome' => 'required',
        'endereco' => 'required',
        'especialidade' => 'required',
        'codigo' => 'required',
    ]);

    $mecanico = Mecanico::findOrFail($id);
    $mecanico->update([
        'nome' => $request->input('nome'),
        'endereco' => $request->input('endereco'),
        'especialidade' => $request->input('especialidade'),
        'codigo' => $request->input('codigo'),
    ]);

    return redirect()->route('mecanico.list')->with('success', 'Mecânico atualizado com sucesso!');
}


    public function listMecanicos()
    {
        $mecanicos = Mecanico::all();
        return view('mecanico', ['mecanicos' => $mecanicos]);
    }
}
