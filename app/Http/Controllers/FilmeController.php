<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\FilmeRequest;
use App\Filme;
use App\Ator;
use App\Genero;

class FilmeController extends Controller
{
    public function listandoFilmes(){
        $filmes = Filme::orderBy('id', 'ASC')->paginate(10);

        return view('filme.listando')->with('filmes', $filmes);
    }

    public function listandoCatalogo(){
        $filmes = Filme::orderBy('titulo', 'ASC')->paginate(9);
        $generos = Genero::all();

        return view('catalogo')->with(['filmes' => $filmes, 'generos' => $generos]);
    }

    public function adicionandoFilme(){
        $atores = Ator::orderBy('nome', 'ASC')->get();
        $generos = Genero::orderBy('descricao', 'ASC')->get();

        return view('filme.adicionando')->with(['atores' => $atores, 'generos' => $generos]);
    }

    public function salvandoFilme(FilmeRequest $request){
        $request->all();

        $arquivo = $request->file('imagem');
        if (empty($arquivo)) {
            $caminhoRelativo = null;
        } else {
            $arquivo->storePublicly('uploads');
            $caminhoAbsoluto = public_path()."/storage/uploads";
            $nomeArquivo = $arquivo->getClientOriginalName();
            $caminhoRelativo = "storage/uploads/$nomeArquivo";
            $arquivo->move($caminhoAbsoluto, $nomeArquivo);
        }

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

        return view('filme.editando')->with(
            ["filme" => $filme, "atores" => $atores, "generos" => $generos]
        );
    }

    public function alterandoFilme(FilmeRequest $request, $id){
        $filme = Filme::find($id);

        $request->all();

        $arquivo = $request->file('imagem');
        if (empty($arquivo)) {
            $caminhoRelativo = $filme->imagem;
        } else {
            $arquivo->storePublicly('uploads');
            $caminhoAbsoluto = public_path()."/storage/uploads";
            $nomeArquivo = $arquivo->getClientOriginalName();
            $caminhoRelativo = "storage/uploads/$nomeArquivo";
            $arquivo->move($caminhoAbsoluto, $nomeArquivo);
        }

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

    public function filtrarFilme(Request $request){
        $generos = Genero::all();

        $search = $request->input('search');

        $filmes = Filme::
              where('titulo', 'like', '%'.$search.'%')
              ->orWhere('sinopse', 'like', '%'.$search.'%')
              ->paginate(9);

        return view('catalogo')->with(['filmes' => $filmes, 'search' => $search, 'generos' => $generos]);
    }
}
