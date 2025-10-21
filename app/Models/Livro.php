<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute;

class Livro extends Model
{
    use HasFactory;

    protected $table = 'livros';
    protected $primaryKey = 'Codl';
    public $timestamps = false;

    protected $fillable = [
        'Codl',
        'Titulo',
        'Editora',
        'AnoPublicacao',
        'Valor', 
    ];

    public function autores()
    {
        return $this->belongsToMany(Autor::class, 'livro_autor', 'livro_codl', 'autor_codau');
    }

    public function assuntos()
    {
        return $this->belongsToMany(Assunto::class, 'livro_assunto', 'Livro_codl', 'assunto_codAs');
    }

}
