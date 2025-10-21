<?php

namespace App\Http\Controllers;

use App\Repositories\AutorRepository;
use Illuminate\Http\Request;

class AutorController extends Controller
{
    public function __construct(private AutorRepository $repo) {}

    public function index()
    {
        $autores = $this->repo->paginate();
        return view('autores.index', compact('autores'));
    }

    public function create()
    {
        return view('autores.create');
    }

    public function store(Request $request)
    {
        $dados = $request->validate([
            'nome' => ['required', 'string', 'max:150'],
            'data_nascimento' => ['nullable', 'date'],
        ]);

        $this->repo->create($dados);
        return redirect()->route('autores.index')->with('success', 'Autor criado com sucesso.');
    }

    public function edit(int $id)
    {
        $autor = $this->repo->find($id);
        return view('autores.edit', compact('autor'));
    }

    public function update(Request $request, int $id)
    {
        $autor = $this->repo->find($id);

        $dados = $request->validate([
            'nome' => ['required', 'string', 'max:150'],
            'data_nascimento' => ['nullable', 'date'],
        ]);

        $this->repo->update($autor, $dados);
        return redirect()->route('autores.index')->with('success', 'Autor atualizado com sucesso.');
    }

    public function destroy(int $id)
    {
        $autor = $this->repo->find($id);
        $this->repo->delete($autor);
        return redirect()->route('autores.index')->with('success', 'Autor removido.');
    }
}