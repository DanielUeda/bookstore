<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Assunto;

class AssuntoSeeder extends Seeder
{
    public function run(): void
    {
        Assunto::insert([
            ['Descricao' => 'Romance'],
            ['Descricao' => 'Ficção'],
            ['Descricao' => 'Poesia'],
            ['Descricao' => 'Crônica'],
            ['Descricao' => 'Infantil'],
            ['Descricao' => 'Drama']
        ]);
    }
}