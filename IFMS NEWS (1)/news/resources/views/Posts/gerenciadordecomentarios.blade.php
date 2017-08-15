@extends('layouts.app')

@section('content')

<a href="{{action('PostController@gerenciadordepost')}}"><button type="button" class="btn btn-default pull-left">Gerenciador de Posts</button></a>
<table class="table">
  <thead class="thead-inverse">

  <tr>
    <th>ID</th>
    <th>Nome</th>
    <th>Texto</th>
    <th>Email</th>
    <th>Data de criacao</th>


  </tr>
  @foreach($c as $comentario)
  @if($comentario->estado ==0)
    <tr bgcolor="#ffcccc">
      @endif

      <td>{{ $comentario->id }}</td>
      <td>{{ $comentario->nome }}</td>
      <td>{{ $comentario->texto }}</td>
      <td>{{ $comentario->email }}</td>
      <td>{{ $comentario->created_at }}</td>
      <td><a href="{{action('ComentarioController@deletar', $comentario->id)}}">deletar</a></td>
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
