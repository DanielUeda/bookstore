@extends('layout')

@section('content')
<div class="container">
    <h1>Livros</h1>

    <a href="{{ route('livros.create') }}" class="btn btn-primary mb-3">Novo Livro</a>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Código</th>
                <th>Título</th>
                <th>Editora</th>
                <th>Ano</th>
                <th>Valor</th>
                <th>Autores</th>
                <th>Assuntos</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
            @foreach($livros as $livro)
                <tr>
                    <td>{{ $livro->Codl }}</td>
                    <td>{{ $livro->Titulo }}</td>
                    <td>{{ $livro->Editora }}</td>
                    <td>{{ $livro->AnoPublicacao }}</td>
                    <td>R$ {{ number_format($livro->Valor, 2, ',', '.') }}</td>

                    {{-- Lista de autores --}}
                    <td>
                        @if($livro->autores->isNotEmpty())
                            <ul class="mb-0">
                                @foreach($livro->autores as $autor)
                                    <li>{{ $autor->nome }}</li>
                                @endforeach
                            </ul>
                        @else
                            <em>Sem autores</em>
                        @endif
                    </td>

                    {{-- Lista de assuntos --}}
                    <td>
                        @if($livro->assuntos->isNotEmpty())
                            <ul class="mb-0">
                                @foreach($livro->assuntos as $assunto)
                                    <li>{{ $assunto->Descricao }}</li>
                                @endforeach
                            </ul>
                        @else
                            <em>Sem assuntos</em>
                        @endif
                    </td>

                    <td>
                        <a href="{{ url('livros/'.$livro->Codl.'/edit') }}" class="btn btn-sm btn-warning">Editar</a>

                        <form action="{{ url('livros/'.$livro->Codl) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-sm btn-danger" onclick="return confirm('Deseja excluir este livro?')">
                                Excluir
                            </button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection