<?php

namespace App\Repositories;

use App\Models\Livro;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;

class LivroRepository
{
    public function paginate(int $perPage = 10): LengthAwarePaginator
    {
        return Livro::with(['autores', 'assuntos'])
            ->orderBy('titulo')
            ->paginate($perPage);
    }

    public function find(int $id): Livro
    {
        return Livro::with(['autores', 'assuntos'])->findOrFail($id);
    }

    public function create(array $dados): Livro
    {
        $autores = $dados['autores'] ?? [];
        $assuntos = $dados['assuntos'] ?? [];
        unset($dados['autores'], $dados['assuntos']);

        $livro = Livro::create($dados);
        $livro->autores()->sync($autores);
        $livro->assuntos()->sync($assuntos);

        return $livro->refresh();
    }

    public function update(Livro $livro, array $dados): Livro
    {
        $autores = $dados['autores'] ?? [];
        $assuntos = $dados['assuntos'] ?? [];
        unset($dados['autores'], $dados['assuntos']);

        $livro->update($dados);
        $livro->autores()->sync($autores);
        $livro->assuntos()->sync($assuntos);

        return $livro->refresh();
    }

    public function delete(Livro $livro): void
    {
        $livro->delete();
    }
}