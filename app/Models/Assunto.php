<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Assunto extends Model
{
    use HasFactory;

    protected $table = 'assuntos';
    protected $primaryKey = 'CodAs';
    public $timestamps = false;
    protected $fillable = ['CodAs', 'Descricao'];

    public function livros()
    {
        return $this->belongsToMany(Livro::class, 'livro_assunto', 'assunto_codAs', 'Livro_codl');
    }
}
