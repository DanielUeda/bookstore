<?php

namespace App\Services;

use App\Models\VwAutorLivroAssunto;

class RelatorioService
{
    public function porAutor()
    {
        $linhas = VwAutorLivroAssunto::all()
            ->groupBy('autor_nome');

        return $linhas;

    }
}