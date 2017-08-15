<?php

namespace App\Http\Controllers;

use App\Comentario;
use Request;
class ComentarioController extends Controller
{

  public function adiciona($id,$pagina)  {
    $user = app('Illuminate\Contracts\Auth\Guard')->user();
    Comentario::create(Request::all());
    return redirect()->action('PostController@mostra2', ['id' => $id, 'pagina'=> $pagina])->with('u', $user);
  }

  public function deletar($id){
    $comentario = Comentario::find($id);
    $comentario->estado =false;
    $comentario->save();
    return redirect()->action('ComentarioController@gerenciadordecomentarios',$id);
  }

  public function gerenciadordecomentarios(){
    $comentarios = Comentario::all();
    return view('Posts.gerenciadordecomentarios')->with('c', $comentarios);

  }

    //
}
