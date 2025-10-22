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
            'Titulo'         => ['required', 'string', 'max:40'],
            'Editora'        => ['required', 'string', 'max:40'],
            'AnoPublicacao'  => ['required', 'integer', 'min:1000', 'max:' . date('Y')],
            'Valor'          => ['required', 'numeric', 'min:0'],
            'autores'        => ['required', 'array', 'min:1'],
            'autores.*'      => ['exists:autores,codau'],
            'assuntos'       => ['required', 'array', 'min:1'],
            'assuntos.*'     => ['exists:assuntos,CodAs'],
        ];

        $mensagens = [
            'Titulo.required'        => 'O título é obrigatório.',
            'Editora.required'       => 'A editora é obrigatória.',
            'AnoPublicacao.required' => 'O ano de publicação é obrigatório.',
            'AnoPublicacao.max'      => 'O ano de publicação não pode ser maior que o ano atual.',
            'Valor.required'         => 'O valor é obrigatório.',
            'Valor.min'              => 'O valor não pode ser negativo.',
            'autores.required'       => 'Selecione pelo menos um autor.',
            'assuntos.required'      => 'Selecione pelo menos um assunto.',
        ];

        $validador = Validator::make($dados, $regras, $mensagens);

        if ($validador->fails()) {
            throw new ValidationException($validador);
        }
    }
}
