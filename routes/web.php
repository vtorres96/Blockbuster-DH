<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Home Não Logados
Route::get('/', function () {
    return view('welcome');
})->name('welcome');

Route::get('/catalogo', 'FilmeController@listandoCatalogoDeFilmes')->name('catalogo');
Route::get('/catalogo/{id}', 'GeneroController@listandoFilmesPorGenero');

Auth::routes();

Route::middleware(['auth'])->group(function (){
    // Home Logados
    Route::get('/home', 'HomeController@index')->name('home');

    // Listar Filmes
    Route::get('/filmes', 'FilmeController@listandoFilmes')->name('filmes');

    // Adicionar Filme
    Route::get('/filmes/adicionar', 'FilmeController@adicionandoFilme')->name('filmes-adicionar');
    Route::post('/filmes/adicionar', 'FilmeController@salvandoFilme');

    // Modificando Filme
    Route::get('/filmes/modificar/{id}', 'FilmeController@modificandoFilme');
    Route::put('/filmes/modificar/{id}', 'FilmeController@alterandoFilme');

    // Excluindo Filme
    Route::delete('/filmes/remover/{id}', 'FilmeController@removendoFilme');

    // Listar Gêneros
    Route::get('/generos', 'GeneroController@listandoGeneros')->name('generos');

    // Adicionar Gênero
    Route::get('/generos/adicionar', 'GeneroController@adicionandoGenero')->name('generos-adicionar');
    Route::post('/generos/adicionar', 'GeneroController@salvandoGenero');

    // Modificando Gênero
    Route::get('/generos/modificar/{id}', 'GeneroController@modificandoGenero');
    Route::put('/generos/modificar/{id}', 'GeneroController@alterandoGenero');

    // Excluindo Filme
    Route::delete('/generos/remover/{id}', 'GeneroController@removendoGenero');

    // Listar Atores
    Route::get('/atores', 'AtorController@listandoAtores')->name('atores');

    // Adicionar Ator
    Route::get('/atores/adicionar', 'AtorController@adicionandoAtor')->name('atores-adicionar');
    Route::post('/atores/adicionar', 'AtorController@salvandoAtor');

    // Modificando Ator
    Route::get('/atores/modificar/{id}', 'AtorController@modificandoAtor');
    Route::put('/atores/modificar/{id}', 'AtorController@alterandoAtor');

    // Excluindo Ator
    Route::delete('/atores/remover/{id}', 'AtorController@removendoAtor');

});
