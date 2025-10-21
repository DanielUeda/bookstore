@extends('layout')

@section('content')
<div class="container">
    <h1>Novo Autor</h1>

    <form action="{{ route('autores.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="nome">Nome</label>
            <input type="text" name="nome" class="form-control" value="{{ old('nome') }}">
            @error('nome')
                <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>

        <button type="submit" class="btn btn-success mt-2">Salvar</button>
    </form>
</div>
@endsection