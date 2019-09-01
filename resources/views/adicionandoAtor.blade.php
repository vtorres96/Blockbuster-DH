@extends('layouts.master')

@section('title', 'Blockbuster DH - Atores')

@section('content')
    @if(Request::is('atores/adicionar'))
        <h1>Cadastro de Atores</h1>

        <form method="POST" action="/atores/adicionar">
            @csrf
            {{ method_field('POST') }}
            <div class="form-group col-md-6 col-sm-12">
                <label for="nome">Nome</label>
                <input type="text" name="nome" class="form-control" id="nome">
            </div>
            <div class="form-group col-md-2">
                <button type="submit" class="form-control btn btn-primary">Enviar</button>
            </div>
        </form>

        @else
            <h1>Modificando Atores</h1>

            <form method="POST" action="/atores/modificar/{{$ator->id}}">
                @csrf
                {{ method_field('PUT') }}

                <div class="form-group col-md-6 col-sm-12">
                    <label for="nome">Nome</label>
                    <input type="text" name="nome" value="{{$ator->nome}}" class="form-control" id="nome">
                </div>
                <div class="form-group col-md-2">
                    <button type="submit" class="form-control btn btn-primary">Enviar</button>
                </div>
            </form>

        @endif

        @if(count($errors) > 0)
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
@endsection
