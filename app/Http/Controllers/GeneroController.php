<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Genero;
use App\Filme;

class GeneroController extends Controller
{
    public function listandoGeneros(){
        $generos = Genero::orderBy('id', 'ASC')->paginate(5);

        return view('listandoGeneros')->with('generos', $generos);
    }

    public function adicionandoGenero(){
        return view('adicionandoGenero');
    }

    public function salvandoGenero(Request $request){
        $request->validate([
            "descricao" => "required|max:50"
        ]);

        $genero = Genero::create([
            "descricao" => $request->input('descricao')
        ]);

        $genero->save();

        return redirect('/generos');
    }

    public function modificandoGenero($id){
        $genero = Genero::find($id);

        return view('adicionandoGenero')->with('genero', $genero);
    }

    public function alterandoGenero(Request $request, $id){
        $genero = Genero::find($id);

        $request->validate([
            "descricao" => "required|max:50"
        ]);

        $genero->descricao = $request->input('descricao');

        $genero->save();

        return redirect('/generos');
    }

    public function removendoGenero($id){
        $genero = Genero::find($id);

        $genero->delete();

        return redirect('/generos');
    }

    public function listandoFilmesPorGenero(){
        $generos = Genero::all();
        $filmes = Filme::orderBy('titulo', 'ASC')->paginate(5);

        return view('catalogoDeFilmes')->with(['generos' => $generos, 'filmes' => $filmes]);
    }
}
