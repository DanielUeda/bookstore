<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Livro;

class LivroSeeder extends Seeder
{
    public function run(): void
    {
        Livro::insert([
            [
                'Titulo' => 'Dom Casmurro',
                'Editora' => 'Editora A',
                'AnoPublicacao' => 1899,
                'Valor' => 59.90,
            ],
            [
                'Titulo' => 'O Guarani',
                'Editora' => 'Editora B',
                'AnoPublicacao' => 1857,
                'Valor' => 39.90,
            ],
            [
                'Titulo' => 'A Hora da Estrela',
                'Editora' => 'Editora C',
                'AnoPublicacao' => 1977,
                'Valor' => 49.90,
            ],
            [
                'Titulo' => 'Capitães da Areia',
                'Editora' => 'Editora D',
                'AnoPublicacao' => 1937,
                'Valor' => 45.00,
            ],
            [
                'Titulo' => 'Memórias Póstumas de Brás Cubas',
                'Editora' => 'Editora A',
                'AnoPublicacao' => 1881,
                'Valor' => 55.00,
            ],
            [
                'Titulo' => 'Sítio do Picapau Amarelo',
                'Editora' => 'Editora Infantil',
                'AnoPublicacao' => 1920,
                'Valor' => 29.90,
            ],
        ]);
    }
}