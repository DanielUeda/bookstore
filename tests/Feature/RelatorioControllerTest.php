<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\Autor;
use App\Models\Livro;
use App\Models\Assunto;
use Illuminate\Foundation\Testing\RefreshDatabase;

class RelatorioControllerTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function consegue_exibir_relatorio_por_autor_em_html()
    {
        $autor = Autor::factory()->create(['nome' => 'Machado de Assis']);
        $livro = Livro::factory()->create(['titulo' => 'Dom Casmurro']);
        $assunto = Assunto::factory()->create(['descricao' => 'Romance']);
        $livro->assuntos()->attach($assunto);
        $autor->livros()->attach($livro);

        $response = $this->get(route('relatorios.por_autor'));

        $response->assertStatus(200);
        $response->assertSee('Machado de Assis');
        $response->assertSee('Dom Casmurro');
        $response->assertSee('Romance');
    }

    /** @test */
    public function consegue_exportar_relatorio_por_autor_em_pdf()
    {
        $autor = Autor::factory()->create(['nome' => 'José de Alencar']);
        $livro = Livro::factory()->create(['titulo' => 'Iracema']);
        $autor->livros()->attach($livro);

        $response = $this->get(route('relatorios.por_autor.pdf'));

        $response->assertStatus(200);
        $response->assertHeader('content-type', 'application/pdf');
    }
}