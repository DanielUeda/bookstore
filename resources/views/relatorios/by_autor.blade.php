<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Relatório de Livros por Autor</title>
    <style>
        body {
            font-family: DejaVu Sans, sans-serif;
            font-size: 12px;
            color: #333;
            margin: 20px;
        }
        header {
            text-align: center;
            border-bottom: 1px solid #000;
            margin-bottom: 20px;
            padding-bottom: 8px;
        }
        header h1 {
            margin: 0;
            font-size: 18px;
        }
        header p {
            font-size: 11px;
            color: #555;
        }
        .autor {
            font-weight: bold;
            margin-top: 20px;
            margin-bottom: 5px;
            font-size: 14px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 15px;
        }
        th, td {
            border: 1px solid #444;
            padding: 6px 8px;
            text-align: left;
        }
        th {
            background-color: #f5f5f5;
        }
        tr:nth-child(even) td {
            background-color: #fafafa;
        }
        footer {
            position: fixed;
            bottom: 0;
            left: 0;
            right: 0;
            text-align: center;
            font-size: 10px;
            color: #555;
            border-top: 1px solid #ccc;
            padding-top: 5px;
        }
        .btn {
            display: inline-block;
            padding: 6px 12px;
            background: #444;
            color: #fff;
            text-decoration: none;
            border-radius: 3px;
            font-size: 12px;
        }
        @media print {
            .no-print { display: none !important; }
        }
    </style>
</head>
<body>
    <header>
        <h1>Relatório de Livros por Autor</h1>
        <p>Gerado em {{ \Carbon\Carbon::now()->format('d/m/Y H:i') }}</p>
    </header>

    {{-- Botões só aparecem no navegador --}}
    @if (!request()->routeIs('relatorios.por_autor.pdf'))
        <div class="no-print" style="text-align: right; margin-bottom: 15px;">
            <a href="{{ route('home') }}" class="btn">Voltar</a>
            <a href="{{ route('relatorios.por_autor.pdf') }}" class="btn">Exportar PDF</a>
        </div>
    @endif

    @foreach($linhas as $autor => $livros)
        <div class="autor">Autor: {{ $autor }}</div>
        <table>
            <thead>
                <tr>
                    <th>Título</th>
                    <th>Ano Publicação</th>
                    <th>Valor</th>
                    <th>Assuntos</th>
                </tr>
            </thead>
            <tbody>
                @foreach($livros as $livro)
                    <tr>
                        <td>{{ $livro->livro_titulo }}</td>
                        <td>
                            @if($livro->AnoPublicacao)
                                {{ $livro->AnoPublicacao }}
                            @endif
                        </td>
                        <td>
                            @if(is_numeric($livro->Valor))
                                R$ {{ number_format($livro->Valor, 2, ',', '.') }}
                            @endif
                        </td>
                        <td>{{ $livro->assuntos }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @endforeach

    <footer>
        Sistema de Cadastro de Livros — Relatório gerado automaticamente
    </footer>
</body>
</html>