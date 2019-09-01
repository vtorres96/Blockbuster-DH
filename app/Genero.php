<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Filme;

class Genero extends Model
{
    protected $table = "generos";
    protected $primaryKey = "id";
    protected $fillable = ["descricao"];

    public function filmes(){
        return $this->hasMany(Filme::class, 'id_genero', 'id');
    }
}
