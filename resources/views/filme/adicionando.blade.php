@extends('layouts.app')

@section('title', 'Blockbuster - Filmes')


@section('content')
    <h1>Cadastro de Filmes</h1>

    <form method="POST" action="/filmes/adicionar" enctype="multipart/form-data">
        @csrf
        {{ method_field('POST') }}
        <div class="form-group col-md-6 col-sm-12">
            <label for="titulo">Título</label>
            <input type="text" name="titulo"  value="{{ old('titulo') }}" class="form-control{{$errors->has('titulo') ? ' is-invalid':''}}" id="titulo">
            <div class="invalid-feedback">{{ $errors->first('titulo') }}</div>
        </div>

        <div class="form-group col-md-6 col-sm-12">
            <label for="sinopse">Sinopse</label>
            <input type="text" name="sinopse"  value="{{ old('sinopse') }}" class="form-control{{$errors->has('sinopse') ? ' is-invalid':''}}" id="sinopse">
            <div class="invalid-feedback">{{ $errors->first('sinopse') }}</div>
        </div>

        <div class="form-group col-md-6 col-sm-12">
            <label for="imagem">Imagem</label>
            <input type="file" name="imagem" class="form-control" id="imagem">
        </div>

        <div class="form-group col-md-6 col-sm-12">
            <label for="genero">Gênero</label>
            <select class="form-control{{$errors->has('genero') ? ' is-invalid':''}}" name="genero" id="genero">
                <option value="">Selecione um gênero</option>
                @foreach ($generos as $genero)
                    <option value="{{$genero->id}}">{{$genero->descricao}}</option>
                @endforeach
            </select>
            <div class="invalid-feedback">{{ $errors->first('genero') }}</div>
        </div>

        <div class="form-group col-md-6 col-sm-12">
            <label for="ator">Ator Protagonista</label>
            <select class="form-control{{$errors->has('ator') ? ' is-invalid':''}}" name="ator" id="ator">
                <option value="">Selecione um protagonista</option>
                @foreach ($atores as $ator)
                    <option value="{{$ator->id}}">{{$ator->nome}}</option>
                @endforeach
            </select>
            <div class="invalid-feedback">{{ $errors->first('ator') }}</div>
        </div>

        <div class="form-group col-md-2">
            <button type="submit" class="form-control btn btn-primary">Enviar</button>
        </div>
    </form>
@endsection
