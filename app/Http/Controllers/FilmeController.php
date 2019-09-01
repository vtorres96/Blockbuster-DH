<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Filme;
use App\Ator;
use App\Genero;

class FilmeController extends Controller
{
    public function listandoFilmes(){
        $filmes = Filme::orderBy('id', 'ASC')->paginate(5);

        return view('listandoFilmes')->with('filmes', $filmes);
    }

    public function adicionandoFilme(){
        $atores = Ator::orderBy('nome', 'ASC')->get();
        $generos = Genero::orderBy('descricao', 'ASC')->get();

        return view('adicionandoFilme')->with(["atores" => $atores, "generos" => $generos]);
    }

    public function salvandoFilme(Request $request){
        $request->validate([
            "titulo" => "required|max:50",
            "sinopse" => "required|max:200",
            "genero" => "required",
            "ator" => "required"
        ]);

        $arquivo = $request->file('imagem');

        if (empty($arquivo)) {
            abort(400, 'Nenhum arquivo foi enviado');
        }

        // salvando imagem no projeto
        $nomePasta = 'uploads';

        $arquivo->storePublicly($nomePasta);

        $caminhoAbsoluto = public_path()."/storage/$nomePasta";

        $nomeArquivo = $arquivo->getClientOriginalName();

        $caminhoRelativo = "storage/$nomePasta/$nomeArquivo";

        // movendo imagem
        $arquivo->move($caminhoAbsoluto, $nomeArquivo);

        $filme = Filme::create([
            "titulo" => $request->input('titulo'),
            "sinopse" => $request->input('sinopse'),
            "imagem" => $caminhoRelativo,
            "id_genero" => $request->input('genero'),
            "id_protagonista" => $request->input('ator')
        ]);

        $filme->save();

        return redirect('/filmes');
    }

    public function modificandoFilme($id){
        $filme = Filme::find($id);

        $atores = Ator::orderBy('nome', 'ASC')->get();
        $generos = Genero::orderBy('descricao', 'ASC')->get();

        return view('adicionandoFilme')->with(
            ["filme" => $filme, "atores" => $atores, "generos" => $generos]
        );
    }

    public function alterandoFilme(Request $request, $id){
        $filme = Filme::find($id);

        $request->validate([
            "titulo" => "required|max:50",
            "sinopse" => "required|max:200",
            "ator" => "required",
            "genero" => "required"
        ]);

        $arquivo = $request->file('imagem');

        if (empty($arquivo)) {
            abort(400, 'Nenhum arquivo foi enviado');
        }

        // salvando imagem no projeto
        $nomePasta = 'uploads';

        $arquivo->storePublicly($nomePasta);

        $caminhoAbsoluto = public_path()."/storage/$nomePasta";

        $nomeArquivo = $arquivo->getClientOriginalName();

        $caminhoRelativo = "storage/$nomePasta/$nomeArquivo";

        // movendo imagem
        $arquivo->move($caminhoAbsoluto, $nomeArquivo);

        $filme->titulo = $request->input('titulo');
        $filme->sinopse = $request->input('sinopse');
        $filme->imagem = $caminhoRelativo;
        $filme->id_protagonista = $request->input('ator');
        $filme->id_genero = $request->input('genero');

        $filme->save();

        return redirect('/filmes');
    }

    public function removendoFilme($id){
        $filme = Filme::find($id);

        $filme->delete();

        return redirect('/filmes');
    }
}
