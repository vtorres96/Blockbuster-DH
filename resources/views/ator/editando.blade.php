@extends('layouts.app')

@section('title', 'Blockbuster DH - Atores')

@section('content')
    <h1>Modificando Atores</h1>

    <form method="POST" action="/atores/modificar/{{$ator->id}}">
        @csrf
        {{ method_field('PUT') }}

        <div class="form-group col-md-6 col-sm-12">
            <label for="nome">Nome</label>
            <input type="text" name="nome" value="{{ $ator->nome }}" class="form-control{{$errors->has('nome') ? ' is-invalid':''}}" id="nome">
            <div class="invalid-feedback">{{ $errors->first('nome') }}</div>
        </div>

        <div class="form-group col-md-2">
            <button type="submit" class="form-control btn btn-primary">Enviar</button>
        </div>
    </form>
@endsection
