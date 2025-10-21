@extends('layout')

@section('content')
<div class="container">
    <h1>Editar Autor</h1>

    <form action="{{ route('autores.update', $autor->codau) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="nome">Nome</label>
            <input type="text" name="nome" class="form-control" value="{{ old('nome', $autor->nome) }}">
            @error('nome')
                <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>

        <button type="submit" class="btn btn-success mt-2">Atualizar</button>
        <a href="{{ route('autores.index') }}" class="btn btn-secondary mt-2">Voltar</a>
    </form>
</div>
@endsection