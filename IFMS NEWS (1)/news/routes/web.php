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

// Route::get('/', function () {
//     return view('welcome');
// });

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/sobre', 'Controller@sobre');

Route::get('/contatos', 'Controller@contatos');

//Posts

Route::get('/', 'PostController@telaprincipal');

Route::get('/posts/{number}', 'PostController@todosposts');


Route::get('/posts/gerenciador/posts', 'PostController@gerenciadordepost');

Route::get('/posts/mostra/{id}','PostController@mostra')/*->where('id','[0-9]+')*/;

//OVERLOAD
Route::get('/posts/mostra/{id}/{pagina}','PostController@mostra2')/*->where('id','[0-9]+')*/;


Route::get('/posts/novo','PostController@novo');

Route::post('/posts/adiciona','PostController@adiciona');

Route::get('/posts/atualizar/{id}','PostController@atualizar');

Route::post('/posts/atualiza/{id}','PostController@atualiza');

Route::get('/posts/desligar/{id}','PostController@desligar');
//FIM DE Posts

//COMENTARIOS
Route::post('/comentario/adiciona/{id}/{pagina}','ComentarioController@adiciona');

Route::get('/posts/gerenciador/comentarios', 'ComentarioController@gerenciadordecomentarios');

Route::get('/comentario/remove/{id}','ComentarioController@deletar');
//FIM DE COMENTARIOS
