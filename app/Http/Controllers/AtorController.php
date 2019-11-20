<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Ator;

class AtorController extends Controller
{
    public function listandoAtores(){
        $atores = Ator::orderBy('id', 'ASC')->paginate(10);

        return view('ator.listando')->with('atores', $atores);
    }

    public function adicionandoAtor(){
        return view('ator.adicionando');
    }

    public function salvandoAtor(Request $request){
        $request->validate([
            "nome" => "required|max:50"
        ]);

        $ator = Ator::create([
            "nome" => $request->input('nome')
        ]);

        $ator->save();

        return redirect('/atores');
    }

    public function modificandoAtor($id){
        $ator = Ator::find($id);

        return view('ator.editando')->with('ator', $ator);
    }

    public function alterandoAtor(Request $request, $id){
        $ator = Ator::find($id);

        $request->validate([
            "nome" => "required|max:50"
        ]);

        $ator->nome = $request->input('nome');

        $ator->save();

        return redirect('/atores');
    }

    public function removendoAtor($id){
        $ator = Ator::find($id);

        $ator->delete();

        return redirect('/atores');
    }
}
