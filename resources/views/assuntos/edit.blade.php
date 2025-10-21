@extends('layout')

@section('content')
<div class="container">
    <h1>Editar Assunto</h1>

    <form action="{{ route('assuntos.update', $assunto->CodAs) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="Descricao">Descrição</label>
            <input type="text" name="Descricao" class="form-control" value="{{ old('Descricao', $assunto->Descricao) }}">
            @error('Descricao')
                <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>

        <button type="submit" class="btn btn-success mt-2">Atualizar</button>
        <a href="{{ route('assuntos.index') }}" class="btn btn-secondary mt-2">Voltar</a>
    </form>
</div>
@endsection