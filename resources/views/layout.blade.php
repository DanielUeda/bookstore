<!doctype html>
<html lang="pt-BR">
<head>
  <meta charset="utf-8">
  <title>Cadastro de Livros</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark mb-4">
    <div class="container">
      <a class="navbar-brand" href="{{ route('home') }}">Livros</a>
      <div>
        <a class="nav-link d-inline text-white" href="{{ route('autores.index') }}">Autores</a>
        <a class="nav-link d-inline text-white" href="{{ route('assuntos.index') }}">Assuntos</a>
        <a class="nav-link d-inline text-white" href="{{ route('livros.index') }}">Livros</a>
        <a class="nav-link d-inline text-white" href="{{ route('relatorios.por_autor') }}">Relatório</a>
      </div>
    </div>
  </nav>
  <main class="container">
    @if(session('success'))
      <div class="alert alert-success">{{ session('success') }}</div>
    @endif
    @if(session('error'))
      <div class="alert alert-danger">{{ session('error') }}</div>
    @endif

    @yield('content')
    @unless (request()->routeIs('home'))
      <div class="mt-4">
        <a href="{{ route('home') }}" class="btn btn-outline-dark">Voltar</a>
      </div>
    @endunless


  </main>

  <footer class="mt-5">
    <p>Sistema de Cadastro de Livros — Desenvolvido para Spassu</p>
  </footer>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>