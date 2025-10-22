@extends('layout')

@section('content')
<div class="container">
    <h1>Autores</h1>

    <a href="{{ route('autores.create') }}" class="btn btn-primary mb-3">Novo Autor</a>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Código</th>
                <th>Nome</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
            @foreach($autores as $autor)
                <tr>
                    <td>{{ $autor->codau }}</td>
                    <td>{{ $autor->nome }}</td>
                    <td>
                        <a href="{{ route('autores.edit', $autor->codau) }}" class="btn btn-sm btn-warning">Editar</a>

                        <form action="{{ route('autores.destroy', $autor->codau) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-sm btn-danger" onclick="return confirm('Deseja excluir este autor?')">
                                Excluir
                            </button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    
    <div class="d-flex justify-content-center mt-3">
    {{ $autores->links('pagination.pt-br') }}
    </div>

</div>
@endsection