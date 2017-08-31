<?php

namespace App\Http\Controllers;

use Request;
use App\Post;
use App\Imagen;
use DB;
use Illuminate\Support\Facades\Storage;


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
    $imagens = Imagen::all();
    $posts = Post::orderBy('id', 'DESC')->get();
    return view('Telas.home', ['p' => $posts,'imagens' =>$imagens]);
  }
  public function todosposts($pagina){
    $imagens = Imagen::all();
    $posts = DB::table('posts')->orderBy('id', 'DESC')->skip($pagina)->take(10)->get();
  return view('Telas.listadeposts',['p'=> $posts, 'pagina'=>$pagina, 'imagens' =>$imagens]);
  }

  public function gerenciadordepost(){
    $posts = Post::all();
//
   //$posts = Post::all();
    return view('Posts.gerenciadordeposts')->with('p', $posts);
  }

  public function mostra($id)  {
    $post = Post::find($id);
    $comentarios = DB::table('comentarios')->where([
    ['id_post', '=', $id],
    ['estado', '<>', '0'],])->get();

    $imagens = DB::table('imagens')->where([
    ['post', '=', $id],])->get();

    if(empty($post)) {
    return "Essa disciplina não existe";
    }
$pagina=0;
   return view('Posts.detalhes',['p'=> $post, 'comentarios' =>$comentarios, 'pagina'=>$pagina, 'imagens'=>$imagens ]);
  }
  //OVERLOAD
  public function mostra2($id,$pagina)  {
    $post = Post::find($id);
    $comentarios = DB::table('comentarios')->where([
    ['id_post', '=', $id],
    ['estado', '<>', '0'],
])->get();

$imagens = DB::table('imagens')->where([
['post', '=', $id],])->get();

    if(empty($post)) {
    return "Essa disciplina não existe";
    }

   return view('Posts.detalhes',['p'=> $post,'pagina'=> $pagina,'comentarios' =>$comentarios, 'imagens'=>$imagens  ]);
  }


  public function FORMULARIO()  {
    return view('Posts.formulario');
  }

  public function adiciona()  {
    //Post::create(Request::all());

    $params = Request::all();
    $user = app('Illuminate\Contracts\Auth\Guard')->user();

    $post = new Post;
    $post->titulo = $params['titulo'];
    $post->texto = $params['texto'];
    $post->chamada = $params['chamada'];
    $post->id_user = $user['id'];
    $post->save();

    foreach ($params['arquivo'] as $item) {
      $imagen = new Imagen ();

      $url =Storage::disk('public')->put('arquivos', $item);


      $imagen->nomeantigo =  $item->getClientOriginalName();
      $imagen->novonome = $url;
      $imagen->post=$post->id;
      $imagen->save();
    }
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
