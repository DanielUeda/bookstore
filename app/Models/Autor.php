<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Autor extends Model
{
    use HasFactory;
protected $table = 'autores';
    protected $primaryKey = 'codau';
    public $timestamps = false;
    public $incrementing = true; 
    protected $keyType = 'int';  
    protected $fillable = ['codau', 'nome'];

    public function getRouteKeyName()
    {
        return 'codau';
    }

    public function livros()
    {
        return $this->belongsToMany(Livro::class, 'livro_autor', 'autor_codau', 'livro_codl');
    }
}

