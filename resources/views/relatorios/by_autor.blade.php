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
            line-height: 1.4;
        }
        header {
            text-align: center;
            border-bottom: 2px solid #444;
            margin-bottom: 25px;
            padding-bottom: 10px;
        }
        header h1 {
            margin: 0;
            font-size: 20px;
            text-transform: uppercase;
            letter-spacing: 1px;
        }
        header p {
            font-size: 11px;
            color: #666;
            margin-top: 4px;
        }
        .autor {
            font-weight: bold;
            margin-top: 25px;
            margin-bottom: 8px;
            font-size: 14px;
            color: #222;
            border-left: 4px solid #444;
            padding-left: 6px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
            table-layout: fixed; /* força largura fixa */
        }
        th, td {
            border: 1px solid #bbb;
            padding: 6px 8px;
            text-align: left;
            word-wrap: break-word; /* quebra o texto longo */
        }
        th {
            background-color: #f0f0f0;
            font-weight: bold;
            text-transform: uppercase;
            font-size: 11px;
        }
        tr:nth-child(even) td {
            background-color: #fafafa;
        }
        /* Definindo larguras fixas para cada coluna */
        th:nth-child(1), td:nth-child(1) { width: 40%; } /* Título */
        th:nth-child(2), td:nth-child(2) { width: 15%; } /* Ano */
        th:nth-child(3), td:nth-child(3) { width: 15%; } /* Valor */
        th:nth-child(4), td:nth-child(4) { width: 30%; } /* Assuntos */

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
            margin-left: 5px;
        }
        .btn:hover {
            background: #222;
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
                        <td>{{ $livro->AnoPublicacao ?? '-' }}</td>
                        <td>
                            @if(is_numeric($livro->Valor))
                                R$ {{ number_format($livro->Valor, 2, ',', '.') }}
                            @else
                                -
                            @endif
                        </td>
                        <td>{{ $livro->assuntos ?: '-' }}</td>
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