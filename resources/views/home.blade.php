@extends('layout')
@section('content')

<div class="p-5 mb-4 bg-gradient text-black rounded-3">
  <div class="container-fluid py-5 text-center">
    <h1 class="display-4 fw-bold">Sistema de Cadastro de Livros</h1>
    <p class="fs-5">Gerencie <strong>Autores</strong>, <strong>Assuntos</strong> e <strong>Livros</strong> de forma simples e organizada.</p>
  </div>
</div>

<div class="row text-center">
  <div class="col-md-4 mb-4">
    <div class="card shadow-sm h-100 border-0">
      <div class="card-body">
        <div class="mb-3 fs-1 text-primary">👤</div>
        <h5 class="card-title">Autores</h5>
        <p class="card-text">Cadastre e gerencie os autores dos livros.</p>
        <a href="{{ route('autores.index') }}" class="btn btn-outline-primary">Ver Autores</a>
      </div>
    </div>
  </div>

  <div class="col-md-4 mb-4">
    <div class="card shadow-sm h-100 border-0">
      <div class="card-body">
        <div class="mb-3 fs-1 text-success">🏷️</div>
        <h5 class="card-title">Assuntos</h5>
        <p class="card-text">Organize os livros em temas e categorias.</p>
        <a href="{{ route('assuntos.index') }}" class="btn btn-outline-success">Ver Assuntos</a>
      </div>
    </div>
  </div>

  <div class="col-md-4 mb-4">
    <div class="card shadow-sm h-100 border-0">
      <div class="card-body">
        <div class="mb-3 fs-1 text-warning">📖</div>
        <h5 class="card-title">Livros</h5>
        <p class="card-text">Gerencie o acervo de livros com autores e assuntos.</p>
        <a href="{{ route('livros.index') }}" class="btn btn-outline-warning">Ver Livros</a>
      </div>
    </div>
  </div>
</div>

<div class="text-center mt-5">
  <a href="{{ route('relatorios.por_autor') }}" class="btn btn-dark btn-lg shadow">
    📊 Relatório por Autor
  </a>
</div>

@endsection