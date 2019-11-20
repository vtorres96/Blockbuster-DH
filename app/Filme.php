<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Filme extends Model
{
    protected $table = "filmes";
    protected $primaryKey = "id";
    protected $fillable = [
        "titulo", "sinopse", "imagem", "id_protagonista", "id_genero"
    ];

    public function genero(){
        return $this->hasOne(Genero::class, 'id', 'id_genero');
    }

    public function ator(){
        return $this->hasOne(Ator::class, 'id', 'id_protagonista');
    }

    public function getImagemImageAttribute($value) {
        return $this->imagem == null ? asset('img/null.jpeg') : asset($this->imagem);
    }
}
