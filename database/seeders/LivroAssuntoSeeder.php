<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class LivroAssuntoSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('livro_assunto')->insert([
            ['livro_codl' => 1, 'assunto_codAs' => 1], 
            ['livro_codl' => 1, 'assunto_codAs' => 6],

            ['livro_codl' => 2, 'assunto_codAs' => 1], 
            ['livro_codl' => 2, 'assunto_codAs' => 2], 

            ['livro_codl' => 3, 'assunto_codAs' => 2], 
            ['livro_codl' => 3, 'assunto_codAs' => 6], 

            ['livro_codl' => 4, 'assunto_codAs' => 1], 
            ['livro_codl' => 4, 'assunto_codAs' => 4], 

            ['livro_codl' => 5, 'assunto_codAs' => 1], 
            ['livro_codl' => 5, 'assunto_codAs' => 2], 

            ['livro_codl' => 6, 'assunto_codAs' => 5],
            ['livro_codl' => 6, 'assunto_codAs' => 2], 
        ]);
    }
}