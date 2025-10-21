<?php

namespace App\Http\Controllers;

use App\Repositories\AssuntoRepository;
use Illuminate\Http\Request;

class AssuntoController extends Controller
{
    public function __construct(private AssuntoRepository $repo) {}

    public function index()
    {
        $assuntos = $this->repo->paginate();
        return view('assuntos.index', compact('assuntos'));
    }

    public function create()
    {
        return view('assuntos.create');
    }

    public function store(Request $request)
    {
        $dados = $request->validate([
            'Descricao' => ['required', 'string', 'max:20', 'unique:assuntos,Descricao'],
        ]);

        $this->repo->create($dados);
        return redirect()->route('assuntos.index')->with('success', 'Assunto criado com sucesso.');
    }

    public function edit(int $id)
    {
        $assunto = $this->repo->find($id);
        return view('assuntos.edit', compact('assunto'));
    }

    public function update(Request $request, int $id)
    {
        $assunto = $this->repo->find($id);

        $dados = $request->validate([
            'Descricao' => ['required', 'string', 'max:20', 'unique:assuntos,Descricao,' . $assunto->id],
        ]);

        $this->repo->update($assunto, $dados);
        return redirect()->route('assuntos.index')->with('success', 'Assunto atualizado com sucesso.');
    }

    public function destroy(int $id)
    {
        $assunto = $this->repo->find($id);
        $this->repo->delete($assunto);
        return redirect()->route('assuntos.index')->with('success', 'Assunto removido.');
    }
}