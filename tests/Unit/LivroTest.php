<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\Livro;
use Illuminate\Foundation\Testing\RefreshDatabase;

class LivroTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function nao_permite_criar_livro_sem_titulo()
    {
        $response = $this->post(route('livros.store'), [
            'titulo' => '',
            'isbn' => '1234567890',
            'data_publicacao' => '2020-01-01', 
        ]);

        $response->assertSessionHasErrors('titulo');
    }

    /** @test */
    public function cria_livro_com_dados_validos()
    {
        $response = $this->post(route('livros.store'), [
            'titulo' => 'Livro Teste',
            'isbn' => '1234567890',
            'data_publicacao' => '2020-01-01', 
            'valor' => 100.50
        ]);

        $response->assertRedirect(route('livros.index'));
        $this->assertDatabaseHas('livros', ['titulo' => 'Livro Teste']);
    }
}