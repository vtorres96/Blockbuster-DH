@extends('layouts.app')

@section('title', 'Blockbuster DH - Atores')

@section('content')
    @if($atores->isEmpty())
        <section class="row">
            <header class="col-12">
                <h1 class="col-12 text-center">Que pena! Não temos atores cadastrados na plataforma</h1>
            </header>
        </section>
    @else
        <section class="row">
            <header class="col-12">
                <h1 class="col-12 text-center">Atores</h1>
                <p class="col-12 d-block text-center"><b>listando todos os atores da nossa plataforma</b></p>
            </header>
        </section>
        <section class="row">
            <article class="col-12">
                <table class="table">
                    <thead class="thead-light">
                        <tr>
                            <th scope="col">Nome</th>
                            <th scope="col" colspan="2">Ações</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($atores as $ator)
                        <tr>
                            <td scope="row">{{$ator->nome}}</td>
                            <td>
                                <a href="/atores/modificar/{{$ator->id}}">
                                    <i class="fas fa-edit"></i>
                                </a>
                            </td>
                            <td>
                                <a href="#" data-toggle="modal" data-target="#modal{{ $ator->id }}">
                                    <i class="fas fa-trash"></i>
                                </a>
                                <div class="modal fade" id="modal{{ $ator->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title">Deseja excluir o ator {{ $ator->nome }} ?</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <p>Nome: {{ $ator->nome }}</p>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                                                <form action="/atores/remover/{{ $ator->id }}" method="POST">
                                                    @csrf
                                                    {{ method_field('DELETE') }}
                                                    <button type="submit" class="btn btn-danger">Excluir</a>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                <div class="d-flex justify-content-center">
                    {{ $atores->links() }}
                </div>
            </article>
        </section>
    @endif
@endsection
