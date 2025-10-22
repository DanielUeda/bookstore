<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Autor;

class AutorSeeder extends Seeder
{
    public function run(): void
    {
        Autor::insert([
            ['nome' => 'Machado de Assis'],
            ['nome' => 'José de Alencar'],
            ['nome' => 'Clarice Lispector'],
            ['nome' => 'Graciliano Ramos'],
            ['nome' => 'Jorge Amado'],
            ['nome' => 'Cecília Meireles'],
            ['nome' => 'Carlos Drummond de Andrade'],
            ['nome' => 'Monteiro Lobato']
        ]);
    }
}