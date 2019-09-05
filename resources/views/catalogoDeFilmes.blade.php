@extends('layouts.app')

@section('title', 'Blockbuster DH - Filmes')

@section('content')
    <section class="row">
        <article class="col-3">
            <table class="table">
                <thead class="thead-light">
                    <tr>
                        <th scope="col">Gêneros</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td scope="row">
                            <a href="{{ route('catalogo') }}">Todos os Filmes</a>
                        </td>
                    </tr>
                    @foreach ($generos as $genero)
                        <tr>
                            <td scope="row">
                                <a href="/catalogo/{{$genero->id}}">
                                    {{$genero->descricao}}
                                </a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </article>
        <article class="col-9">
            <div class="card-deck">
                @if($filmes->isEmpty())
                    <section class="row">
                        <header class="col-12">
                            <h1 class="col-12 text-center">Que pena! Não temos filmes disponíveis</h1>
                        </header>
                    </section>
                @else
                    <section class="row col-12 mb-4">
                        <header class="col-12">
                            @if(!isset($generoEscolhido))
                                <h1 class="col-12 text-center">Todos os Filmes</h1>
                            @else
                                <h1 class="col-12 text-center">{{$generoEscolhido->descricao}}</h1>
                            @endif
                        </header>
                    </section>
                    @foreach ($filmes as $filme)
                        <div class="card col-4">
                            <img src="{{url($filme->imagem)}}" class="card-img-top" alt="{{$filme->titulo}}">
                            <div class="card-body">
                                <h5 class="card-title">{{$filme->titulo}}</h5>
                                <p class="card-text">{{$filme->sinopse}}</p>
                                <p class="card-text"><small class="text-muted">{{$filme->ator->nome}}</small></p>
                                <p class="card-text"><small class="text-muted">{{$filme->genero->descricao}}</small></p>
                            </div>
                        </div>
                    @endforeach
                @endif
            </div>
            <div class="d-flex justify-content-center">
                {{ $filmes->links() }}
            </div>
        </article>
    </section>
@endsection
