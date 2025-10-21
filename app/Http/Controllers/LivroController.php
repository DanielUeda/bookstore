<?php

namespace App\Http\Controllers;

use App\Models\Livro;
use App\Models\Autor;
use App\Models\Assunto;
use Illuminate\Http\Request;

class LivroController extends Controller
{
    public function index()
    {
        $livros = Livro::with(['autores', 'assuntos'])->get();
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
        $request->validate([
            'Titulo'         => 'required|string|max:40',
            'Editora'        => 'required|string|max:40',
            'AnoPublicacao'  => 'required|integer|min:1000|max:' . date('Y'),
            'Valor'          => 'required|numeric|min:0',
            'autores'        => 'required|array|min:1',
            'autores.*'      => 'exists:autores,codau',
            'assuntos'       => 'required|array|min:1',
            'assuntos.*'     => 'exists:assuntos,CodAs',
        ], [
            'Titulo.required'        => 'O título é obrigatório.',
            'Editora.required'       => 'A editora é obrigatória.',
            'AnoPublicacao.required' => 'O ano de publicação é obrigatório.',
            'AnoPublicacao.max'      => 'O ano de publicação não pode ser maior que o ano atual.',
            'Valor.required'         => 'O valor é obrigatório.',
            'Valor.min'              => 'O valor não pode ser negativo.',
            'autores.required'       => 'Selecione pelo menos um autor.',
            'assuntos.required'      => 'Selecione pelo menos um assunto.',
        ]);



        $livro = Livro::create($request->only(['Titulo','Editora','AnoPublicacao','Valor']));

        $livro->autores()->sync($request->input('autores', []));
        $livro->assuntos()->sync($request->input('assuntos', []));

        return redirect()->route('livros.index')->with('success', 'Livro criado com sucesso!');
    }

    public function edit(Livro $livro)
    {
        $autores = Autor::all();
        $assuntos = Assunto::all();
        return view('livros.edit', compact('livro', 'autores', 'assuntos'));
    }

    public function update(Request $request, Livro $livro)
    {
        $request->validate([
        'Titulo'         => 'required|string|max:40',
        'Editora'        => 'required|string|max:40',
        'AnoPublicacao'  => 'required|integer|min:1000|max:' . date('Y'),
        'Valor'          => 'required|numeric|min:0',
        'autores'        => 'required|array|min:1',
        'autores.*'      => 'exists:autores,codau',
        'assuntos'       => 'required|array|min:1',
        'assuntos.*'     => 'exists:assuntos,CodAs',
    ]);


        $livro->update($request->only(['Titulo','Editora','AnoPublicacao','Valor']));

        $livro->autores()->sync($request->input('autores', []));
        $livro->assuntos()->sync($request->input('assuntos', []));

        return redirect()->route('livros.index')->with('success', 'Livro atualizado com sucesso!');
    }

    public function destroy(Livro $livro)
    {
        $livro->autores()->detach();
        $livro->assuntos()->detach();
        $livro->delete();

        return redirect()->route('livros.index')->with('success', 'Livro excluído com sucesso!');
    }
}