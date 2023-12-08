<?php

namespace App\Http\Controllers;

use App\Models\Peca;
use Illuminate\Http\Request;

class PecaController extends Controller
{
    public function showForm()
    {
        return view('adicionaPeca');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'descricao' => 'required',
            'valor_unitario' => 'required|numeric',
            'codigo' => 'required',
        ]);

        try {
            Peca::create($validatedData);

            return redirect()->route('pecas')->with('success', 'Peça cadastrada com sucesso!');
        } catch (\Exception $e) {
            // Log do erro
            \Log::error('Erro ao cadastrar peça: ' . $e->getMessage());

            return redirect()->route('pecas.list')->with('error', 'Erro ao cadastrar peça. Por favor, tente novamente.');
        }
    }

   public function delete($id){
       try {
             $pecas = Peca::findOrFail($id);
            $pecas->deletePeca();
    
            return redirect()->route('pecas.list')->with('success', 'Peça excluído com sucesso');
         } catch (\Exception $e) {
        \Log::error('Erro ao excluir veículo: ' . $e->getMessage());
    
           return back()->with('error', 'Erro ao excluir veículo. Detalhes: ' . $e->getMessage());
         }
    }
    public function editForm($id)
{
    $peca = Peca::findOrFail($id);
    return view('editarPeca', ['peca' => $peca]);
}

public function update(Request $request, $id)
{
    $request->validate([
        'descricao' => 'required',
        'valor_unitario' => 'required|numeric',
        'codigo' => 'required',
    ]);

    $peca = Peca::findOrFail($id);
    $peca->update([
        'descricao' => $request->input('descricao'),
        'valor_unitario' => $request->input('valor_unitario'),
        'codigo' => $request->input('codigo'),
    ]);

    return redirect()->route('pecas.list')->with('success', 'Peça atualizada com sucesso!');
}


    public function listPecas()
    {
        $pecas = Peca::all();
        return view('pecas', ['pecas' => $pecas]);
    }
}
