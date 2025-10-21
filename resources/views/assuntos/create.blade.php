@extends('layout')

@section('content')
<div class="container">
    <h1>Novo Assunto</h1>

    <form action="{{ route('assuntos.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="Descricao">Descrição</label>
            <input type="text" name="Descricao" class="form-control" value="{{ old('Descricao') }}">
            @error('Descricao')
                <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>

        <button type="submit" class="btn btn-success mt-2">Salvar</button>
        <a href="{{ route('assuntos.index') }}" class="btn btn-secondary mt-2">Voltar</a>
    </form>
</div>
@endsection