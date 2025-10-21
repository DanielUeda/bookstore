<?php

namespace App\Services;

use App\Models\Livro;
use App\Repositories\LivroRepository;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;

class LivroService
{
    public function __construct(private LivroRepository $repo) {}

    public function listar(int $perPage = 10)
    {
        return $this->repo->paginate($perPage);
    }

    public function obter(int $id): Livro
    {
        return $this->repo->find($id);
    }

    public function criar(array $dados): Livro
    {
        $this->validar($dados);
        return $this->repo->create($dados);
    }

    public function atualizar(Livro $livro, array $dados): Livro
    {
        $this->validar($dados, true);
        return $this->repo->update($livro, $dados);
    }

    public function remover(Livro $livro): void
    {
        $this->repo->delete($livro);
    }

    private function validar(array $dados, bool $atualizando = false): void
    {
        $regras = [
            'titulo' => ['required', 'string', 'max:200'],
            'isbn' => ['nullable', 'string', 'max:20'],
            'data_publicacao' => ['nullable', 'date'],
            'valor' => ['required', 'numeric', 'min:0'],
            'autores' => ['array'],
            'autores.*' => ['integer', 'exists:autores,id'],
            'assuntos' => ['array'],
            'assuntos.*' => ['integer', 'exists:assuntos,id'],
        ];

        $validador = Validator::make($dados, $regras);

        if ($validador->fails()) {
            throw new ValidationException($validador);
        }
    }
}