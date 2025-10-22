<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class LivroAutorSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('livro_autor')->insert([
            ['livro_codl' => 1, 'autor_codau' => 1],
            ['livro_codl' => 2, 'autor_codau' => 2],
            ['livro_codl' => 3, 'autor_codau' => 3], 
            ['livro_codl' => 4, 'autor_codau' => 5], 
            ['livro_codl' => 5, 'autor_codau' => 1], 
            ['livro_codl' => 6, 'autor_codau' => 8], 

            ['livro_codl' => 4, 'autor_codau' => 6], 
            ['livro_codl' => 5, 'autor_codau' => 7], 
        ]);
    }
}