<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Genero;
use App\Filme;

class GeneroController extends Controller
{
    public function listandoGeneros(){
        $generos = Genero::orderBy('id', 'ASC')->paginate(10);

        return view('genero.listando')->with('generos', $generos);
    }

    public function adicionandoGenero(){
        return view('genero.adicionando');
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

        return view('genero.editando')->with('genero', $genero);
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

    public function listandoFilmesPorGenero($id){
        $generos = Genero::all();
        $generoEscolhido = Genero::find($id);
        $filmes = Filme::where('id_genero', '=', $id)->paginate(10);

        return view('catalogo')->with(['generos' => $generos, 'generoEscolhido' => $generoEscolhido, 'filmes' => $filmes]);
    }
}
