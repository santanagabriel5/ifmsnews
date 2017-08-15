<?php

namespace App\Http\Controllers;

use Request;
use App\Post;
use Illuminate\Support\Facades\Storage;
use DB;

class PostController extends Controller
{

  public function desligar($id){
    $post = Post::find($id);
    $post->estado ="0";
    $post->save();
    return redirect()
    ->action('PostController@gerenciadordepost');
  }


  public function telaprincipal(){
    $posts = Post::all();
    return view('Telas.home')->with('p', $posts);
  }
  public function todosposts($pagina){
  /*  $query->where([
        ['estado', '=', 1],
        ['id', '>', $pagina],
        [COLUMN, OPERATOR, VALUE],
        ...
    ])   ;*/
    $posts = DB::table('posts')->skip($pagina)->take(10)->get();
  //  $posts = Post::table('posts')->where('name', 'John');
  return view('Telas.listadeposts',['p'=> $posts, 'pagina'=>$pagina]);
  }

  public function gerenciadordepost(){
    $posts = Post::all();
//
   $posts = Post::all();
    return view('Posts.gerenciadordeposts')->with('p', $posts);
  }

  public function mostra($id)  {
    $post = Post::find($id);
    $comentarios = DB::table('comentarios')->where([
    ['id_post', '=', $id],
    ['estado', '<>', '0'],
])->get();
    if(empty($post)) {
    return "Essa disciplina não existe";
    }

   return view('Posts.detalhes',['p'=> $post, 'comentarios' =>$comentarios ]);
  }
  //OVERLOAD
  public function mostra2($id,$pagina)  {
    $post = Post::find($id);
    $comentarios = DB::table('comentarios')->where([
    ['id_post', '=', $id],
    ['estado', '<>', '0'],
])->get();

    if(empty($post)) {
    return "Essa disciplina não existe";
    }

   return view('Posts.detalhes',['p'=> $post,'pagina'=> $pagina,'comentarios' =>$comentarios  ]);
  }


  public function novo()  {
    return view('Posts.formulario');
  }

  public function adiciona()  {
    $user = app('Illuminate\Contracts\Auth\Guard')->user();
    Post::create(Request::all());

    return redirect()->action('PostController@gerenciadordepost')->with('u', $user)
    ->withInput(Request::only('titulo'));

  }

  public function atualizar($id)  {
    $user = app('Illuminate\Contracts\Auth\Guard')->user();
    $post = Post::find($id);
    return view('Posts.atualizar',['p'=>$post,'u'=>$user]);
  }

  public function atualiza($id)  {

    $user = app('Illuminate\Contracts\Auth\Guard')->user();

    $params = Request::all();
    $post = new Post();
    $post = Post::find($id);

    $post->titulo = $params['titulo'];
    $post->endereco_imagem = "TEST";
    $post->texto = $params['texto'];
    $post->chamada = $params['chamada'];
    $post->id_user = $user['id'];

    $post->save();
    return redirect()->action('PostController@gerenciadordepost')->withInput(Request::only('titulo'));
  }




    //
}
