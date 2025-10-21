<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    public function up(): void
    {
        DB::statement("
            CREATE OR REPLACE VIEW vw_autores_livros_assuntos AS
            SELECT
                a.codau       AS autor_id,
                a.nome        AS autor_nome,
                l.Codl        AS livro_id,
                l.Titulo      AS livro_titulo,
                l.AnoPublicacao,
                l.Valor,
                GROUP_CONCAT(DISTINCT s.Descricao ORDER BY s.Descricao SEPARATOR ', ') AS assuntos
            FROM autores a
            JOIN livro_autor la 
                ON la.autor_codau = a.codau
            JOIN livros l 
                ON l.Codl = la.livro_codl
            LEFT JOIN livro_assunto ls 
                ON ls.livro_codl = l.Codl
            LEFT JOIN assuntos s 
                ON s.CodAs = ls.assunto_codAs
            GROUP BY a.codau, a.nome, l.Codl, l.Titulo, l.AnoPublicacao, l.Valor;

        ");
    }

    public function down(): void
    {
        DB::statement("DROP VIEW IF EXISTS vw_autores_livros_assuntos");
    }
};
