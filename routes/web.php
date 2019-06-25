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

use App\Cliente;
use App\Endereco;

Route::get('/enderecos', function () {
	$enderecos = Endereco::all();
	foreach ($enderecos as $endereco) {
		echo $endereco->cliente->id.'<br>'.
		$endereco->cliente->nome.
		' <br> '.$endereco->cidade.' <br> '.
		$endereco->bairro.'<br>'.
		$endereco->rua.'<br>'.
		$endereco->numero.'<br>'.
		$endereco->cep.'<br>';
	}
});


Route::get('/clientes', function () {
	$clientes = Cliente::all();
	foreach ($clientes as $cliente) {
		echo $cliente->id.' '.$cliente->nome.' '.$cliente->telefone.'<br>';
    	// $endereco = Endereco::where('cliente_id', $cliente->id)->first();    
		echo $cliente->endereco->cliente_id.' '.$cliente->endereco->cidade.' <br> '.
		$cliente->endereco->bairro.' '.$cliente->endereco->rua.'<br>'.
		$cliente->endereco->numero.' '.$cliente->endereco->cep.'<br>';
	
	}
});

Route::get('/inserir/{nome}/{telefone}', function($nome, $telefone){
	$cliente = new Cliente();
	$cliente->nome = $nome;
	$cliente->telefone = $telefone;
	$cliente->save();

	$endereco = new Endereco();
	$endereco->cidade = 'uberaba';
	$endereco->bairro = 'EUA';
	$endereco->rua = 'goias';
	$endereco->numero = '414';
	$endereco->cep = '30190909';
	$endereco->uf = 'sp';
	
	$cliente->endereco()->save($endereco);
});

Route::get('/clientes/json', function(){
	// $clientes = Cliente::all(); não retorna os enderecos, usa lasy loading
	$clientes = Cliente::with(['endereco'])->get(); //eager loading
	return json_encode($clientes);
});


Route::get('/enderecos/json', function(){
	// $clientes = Cliente::all(); não retorna os enderecos, usa lasy loading
	$enderecos = Endereco::with(['cliente'])->get(); //eager loading
	return json_encode($enderecos);
});









