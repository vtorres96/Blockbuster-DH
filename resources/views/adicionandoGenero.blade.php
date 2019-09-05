@extends('layouts.app')

@section('title', 'Blockbuster DH - Gêneros')

@section('content')
    @if(Request::is('generos/adicionar'))
        <h1>Cadastro de Gêneros</h1>

        <form method="POST" action="/generos/adicionar">
            @csrf
            {{ method_field('POST') }}
            <div class="form-group col-md-6 col-sm-12">
                <label for="descricao">Descrição</label>
                <input type="text" name="descricao" class="form-control" id="descricao">
            </div>
            <div class="form-group col-md-2">
                <button type="submit" class="form-control btn btn-primary">Enviar</button>
            </div>
        </form>

        @else
            <h1>Modificando Gêneros</h1>

            <form method="POST" action="/generos/modificar/{{$genero->id}}">
                @csrf
                {{ method_field('PUT') }}

                <div class="form-group col-md-6 col-sm-12">
                    <label for="descricao">Descrição</label>
                    <input type="text" name="descricao" value="{{$genero->descricao}}" class="form-control" id="descricao">
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
