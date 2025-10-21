<?php

namespace App\Repositories;

use App\Models\Assunto;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;

class AssuntoRepository
{
    public function paginate(int $perPage = 10): LengthAwarePaginator
    {
        return Assunto::orderBy('descricao')->paginate($perPage);
    }

    public function find(int $id): Assunto
    {
        return Assunto::findOrFail($id);
    }

    public function create(array $dados): Assunto
    {
        return Assunto::create($dados);
    }

    public function update(Assunto $assunto, array $dados): Assunto
    {
        $assunto->update($dados);
        return $assunto;
    }

    public function delete(Assunto $assunto): void
    {
        $assunto->delete();
    }
}