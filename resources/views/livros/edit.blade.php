@extends('layout')

@section('content')
<div class="container">
    <h1>Editar Livro</h1>

    <form action="{{ url('livros/'.$livro->Codl) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="Titulo">Título</label>
            <input type="text" name="Titulo" class="form-control" value="{{ old('Titulo', $livro->Titulo) }}" required>
            @error('Titulo') <small class="text-danger">{{ $message }}</small> @enderror
        </div>

        <div class="form-group">
            <label for="Editora">Editora</label>
            <input type="text" name="Editora" class="form-control" value="{{ old('Editora', $livro->Editora) }}">
        </div>

        <div class="form-group">
            <label for="AnoPublicacao">Ano de Publicação</label>
            <input type="number" name="AnoPublicacao" class="form-control" value="{{ old('AnoPublicacao', $livro->AnoPublicacao) }}">
        </div>

        <div class="form-group">
            <label for="Valor">Valor</label>
            <input type="number" step="0.01" name="Valor" class="form-control" value="{{ old('Valor', $livro->Valor) }}">
        </div>

        <div class="form-group">
            <label for="autores">Autores</label>
            <select name="autores[]" id="autores" class="form-control" multiple>
                @foreach($autores as $autor)
                    <option value="{{ $autor->codau }}" 
                        {{ in_array($autor->codau, $livro->autores->pluck('codau')->toArray()) ? 'selected' : '' }}>
                        {{ $autor->nome }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label for="assuntos">Assuntos</label>
            <select name="assuntos[]" id="assuntos" class="form-control" multiple>
                @foreach($assuntos as $assunto)
                    <option value="{{ $assunto->CodAs }}" 
                        {{ in_array($assunto->CodAs, $livro->assuntos->pluck('CodAs')->toArray()) ? 'selected' : '' }}>
                        {{ $assunto->Descricao }}
                    </option>
                @endforeach
            </select>
        </div>

        <button type="submit" class="btn btn-success mt-2">Atualizar</button>
        <a href="{{ route('livros.index') }}" class="btn btn-secondary mt-2">Voltar</a>
    </form>
</div>
@endsection