@extends('layouts.app')

@section('title', 'Blockbuster DH - Atores')

@section('content')
    <h1>Cadastro de Atores</h1>

    <form method="POST" action="/atores/adicionar">
        @csrf
        {{ method_field('POST') }}
        <div class="form-group col-md-6 col-sm-12">
            <label for="nome">Nome</label>
            <input type="text" name="nome" class="form-control{{$errors->has('nome') ? ' is-invalid':''}}" value="{{ old('nome') }}" id="nome">
            <div class="invalid-feedback">{{ $errors->first('nome') }}</div>
        </div>

        <div class="form-group col-md-2">
            <button type="submit" class="form-control btn btn-primary">Enviar</button>
        </div>
    </form>
@endsection
