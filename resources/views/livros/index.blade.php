@extends('layout')

@section('content')
<div class="container">
    <h1>Livros</h1>

    <a href="{{ route('livros.create') }}" class="btn btn-primary mb-3">Novo Livro</a>
    
    <div class="table-responsive">
        <table class="table table-bordered align-middle">
            <thead>
                <tr>
                    <th>Código</th>
                    <th>Título</th>
                    <th>Editora</th>
                    <th>Ano</th>
                    <th>Valor</th>
                    <th>Autores</th>
                    <th>Assuntos</th>
                    <th style="width: 180px;">Ações</th>
                </tr>
            </thead>
            <tbody>
                @forelse($livros as $livro)
                    <tr>
                        <td>{{ $livro->Codl }}</td>
                        <td>{{ $livro->Titulo }}</td>
                        <td>{{ $livro->Editora }}</td>
                        <td>{{ $livro->AnoPublicacao }}</td>
                        <td>R$ {{ number_format($livro->Valor, 2, ',', '.') }}</td>

                        <td>
                            @if($livro->autores->isNotEmpty())
                                <ul class="mb-0 ps-3">
                                    @foreach($livro->autores as $autor)
                                        <li>{{ $autor->nome }}</li>
                                    @endforeach
                                </ul>
                            @else
                                <em>Sem autores</em>
                            @endif
                        </td>

                        <td>
                            @if($livro->assuntos->isNotEmpty())
                                <ul class="mb-0 ps-3">
                                    @foreach($livro->assuntos as $assunto)
                                        <li>{{ $assunto->Descricao }}</li>
                                    @endforeach
                                </ul>
                            @else
                                <em>Sem assuntos</em>
                            @endif
                        </td>

                        {{-- Ações --}}
                        <td>
                            <a href="{{ route('livros.edit', $livro->Codl) }}" class="btn btn-sm btn-warning">Editar</a>

                            <form action="{{ route('livros.destroy', $livro->Codl) }}" method="POST" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-sm btn-danger" onclick="return confirm('Deseja excluir este livro?')">
                                    Excluir
                                </button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="8" class="text-center">Nenhum livro cadastrado.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <div class="d-flex justify-content-center mt-3">
        {{ $livros->links('pagination.pt-br') }}
    </div>
</div>
@endsection