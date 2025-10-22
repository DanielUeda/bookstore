@extends('layout')

@section('content')
<div class="container">
    <h1>Assuntos</h1>

    <a href="{{ route('assuntos.create') }}" class="btn btn-primary mb-3">Novo Assunto</a>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Código</th>
                <th>Descrição</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
            @foreach($assuntos as $assunto)
                <tr>
                    <td>{{ $assunto->CodAs }}</td>
                    <td>{{ $assunto->Descricao }}</td>
                    <td>
                        <a href="{{ route('assuntos.edit', $assunto->CodAs) }}" class="btn btn-sm btn-warning">Editar</a>
                        <form action="{{ route('assuntos.destroy', $assunto->CodAs) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-sm btn-danger" onclick="return confirm('Deseja excluir este assunto?')">Excluir</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    <div class="d-flex justify-content-center mt-3">
        {{ $assuntos->links('pagination.pt-br') }}
    </div>

</div>
@endsection