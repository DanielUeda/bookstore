<?php

namespace Tests\Unit;

use Tests\TestCase;
use App\Models\Autor;
use App\Models\Livro;
use Illuminate\Foundation\Testing\RefreshDatabase;

class AutorTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function autor_pode_ter_varios_livros()
    {
        $autor = Autor::factory()->create();
        $livros = Livro::factory()->count(3)->create();

        $autor->livros()->attach($livros);

        $this->assertCount(3, $autor->livros);
    }
}