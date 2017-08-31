@extends('layouts.app')

@section('content')


<a href="{{action('ComentarioController@gerenciadordecomentarios')}}"><button type="button" class="btn btn-default pull-left">Gerenciador de Comentarios</button></a>
<a href="{{action('PostController@FORMULARIO')}}"><button type="button" class="btn btn-default pull-left">Novo Post</button></a>

<table class="table">
  <thead class="thead-inverse">

  <tr>
    <th>ID</th>
    <th>Titulo</th>

    <th>Chamada</th>


  </tr>
  @foreach($p as $post)
  @if($post->estado ==0)
    <tr bgcolor="#ffcccc">
  @endif

      <td>{{ $post->id }}</td>
      <td>{{ $post->titulo }}</td>

      <td>{{ $post->chamada }}</td>
      <td><a href="{{action('PostController@mostra', $post->id)}}">Mostrar</a>
      <a href="{{action('PostController@atualizar', $post->id)}}">Atualizar</a>
      <a href="{{action('PostController@desligar', $post->id)}}">deletar</a>
      </td>
            </tr>
  @endforeach
</table>
<center>

<li>
    <a href="{{ route('logout') }}"
        onclick="event.preventDefault();
                 document.getElementById('logout-form').submit();">
        Logout
    </a>

    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
        {{ csrf_field() }}
    </form>
</li>
</center>

@endsection
