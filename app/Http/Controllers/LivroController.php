<?php

namespace App\Http\Controllers;

use App\Models\Autor;
use App\Models\Assunto;
use App\Models\Livro;
use App\Services\LivroService;
use Illuminate\Http\Request;

class LivroController extends Controller
{
    public function __construct(private LivroService $service) {}

    public function index()
    {
        $livros = $this->service->listar(15); 
        
        return view('livros.index', compact('livros'));
    }

    public function create()
    {
        $autores = Autor::all();
        $assuntos = Assunto::all();
        return view('livros.create', compact('autores', 'assuntos'));
    }

    public function store(Request $request)
    {
        $this->service->criar($request->all());

        return redirect()
            ->route('livros.index')
            ->with('success', 'Livro criado com sucesso!');
    }

    public function edit(Livro $livro)
    {
        $autores = Autor::all();
        $assuntos = Assunto::all();
        return view('livros.edit', compact('livro', 'autores', 'assuntos'));
    }

    public function update(Request $request, Livro $livro)
    {
        $this->service->atualizar($livro, $request->all());

        return redirect()
            ->route('livros.index')
            ->with('success', 'Livro atualizado com sucesso!');
    }

    public function destroy(Livro $livro)
    {
        $this->service->remover($livro);

        return redirect()
            ->route('livros.index')
            ->with('success', 'Livro excluído com sucesso!');
    }
}
