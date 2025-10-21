<?php

namespace App\Http\Controllers;

use App\Services\RelatorioService;
use Barryvdh\DomPDF\Facade\Pdf;


class RelatorioController extends Controller
{
    public function __construct(private RelatorioService $service) {}

    public function porAutor()
    {
        $linhas = $this->service->porAutor();
        return view('relatorios.by_autor', compact('linhas'));
    }

    public function exportarPdf()
    {
        $linhas = $this->service->porAutor();

        $pdf = Pdf::loadView('relatorios.by_autor', compact('linhas'))
                  ->setPaper('a4', 'portrait');

        return $pdf->download('relatorio_por_autor.pdf');
    }

}