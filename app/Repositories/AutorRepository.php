<?php

namespace App\Repositories;

use App\Models\Autor;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;

class AutorRepository
{
    public function paginate(int $perPage = 10): LengthAwarePaginator
    {
        return Autor::orderBy('nome')->paginate($perPage);
    }

    public function find(int $id): Autor
    {
        return Autor::findOrFail($id);
    }

    public function create(array $dados): Autor
    {
        return Autor::create($dados);
    }

    public function update(Autor $autor, array $dados): Autor
    {
        $autor->update($dados);
        return $autor;
    }

    public function delete(Autor $autor): void
    {
        $autor->delete();
    }
}