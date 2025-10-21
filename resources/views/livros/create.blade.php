@extends('layout')

@section('content')
<div class="container">
    <h1>Novo Livro</h1>

    <form action="{{ route('livros.store') }}" method="POST">
        @csrf

        {{-- Exibe todos os erros em bloco no topo --}}
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul class="mb-0">
                    @foreach ($errors->all() as $erro)
                        <li>{{ $erro }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <div class="form-group">
            <label for="Titulo">Título</label>
            <input type="text" name="Titulo" class="form-control" value="{{ old('Titulo') }}" required>
            @error('Titulo') <small class="text-danger">{{ $message }}</small> @enderror
        </div>

        <div class="form-group">
            <label for="Editora">Editora</label>
            <input type="text" name="Editora" class="form-control" value="{{ old('Editora') }}" required>
            @error('Editora') <small class="text-danger">{{ $message }}</small> @enderror
        </div>

        <div class="form-group">
            <label for="AnoPublicacao">Ano de Publicação</label>
            <input type="number" name="AnoPublicacao" class="form-control" value="{{ old('AnoPublicacao') }}" required>
            @error('AnoPublicacao') <small class="text-danger">{{ $message }}</small> @enderror
        </div>

        <div class="form-group">
            <label for="Valor">Valor</label>
            <input type="number" step="0.01" name="Valor" class="form-control" value="{{ old('Valor') }}" required>
            @error('Valor') <small class="text-danger">{{ $message }}</small> @enderror
        </div>

        <div class="form-group">
            <label for="autores">Autores</label>
            <select name="autores[]" id="autores" class="form-control" multiple required>
                @foreach($autores as $autor)
                    <option value="{{ $autor->codau }}" {{ collect(old('autores'))->contains($autor->codau) ? 'selected' : '' }}>
                        {{ $autor->nome }}
                    </option>
                @endforeach
            </select>
            @error('autores') <small class="text-danger">{{ $message }}</small> @enderror
        </div>

        <div class="form-group">
            <label for="assuntos">Assuntos</label>
            <select name="assuntos[]" id="assuntos" class="form-control" multiple required>
                @foreach($assuntos as $assunto)
                    <option value="{{ $assunto->CodAs }}" {{ collect(old('assuntos'))->contains($assunto->CodAs) ? 'selected' : '' }}>
                        {{ $assunto->Descricao }}
                    </option>
                @endforeach
            </select>
            @error('assuntos') <small class="text-danger">{{ $message }}</small> @enderror
        </div>

        <button type="submit" class="btn btn-success mt-2">Salvar</button>
        <a href="{{ route('livros.index') }}" class="btn btn-secondary mt-2">Voltar</a>
    </form>
</div>
@endsection