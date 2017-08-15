@extends('layouts.app')

@section('content')

<center>
<h1>{{$p->titulo}}</h1>
<h2>{{$p->chamada}}</h2>
<img src="{{url('/Imagem/dougras.jpg')}}" alt="Image"/><br>

<h2>{{$p->texto}}</h2>
<a href="@if(\Auth::check()) {{action('PostController@gerenciadordepost')}} @else {{action('PostController@todosposts',$pagina)}} @endif"><button type="button" class="btn btn-success">Voltar</button></a>
<br><br><br>
  <h4>Comentarios</h4>
  <!--listagem DE COmEnTARIO-->
<!--
<table class="table table-striped">
<th align="center" >Nome</th> <th>Comentario</th> <th>Data de Postagem</th>
  @foreach($comentarios as $comentario)
  <tr>
  <td>{{$comentario->nome}}</td> <td>{{$comentario->texto}}</td> <td>{{$comentario->updated_at}}</td>
  @endforeach
  </tr>
</table>
-->
</center>
@foreach($comentarios as $comentario)
  <table class="table table-sm">
    <tr>
      <td>{{$comentario->nome}}</td><td>{{$comentario->updated_at}}</td></tr>
      <tr>
        <td>{{$comentario->texto}}</td>
      </tr>
  </table>
<br>

@endforeach



  <!--INSERSAO DE COmEnTARIO-->
<div class="formulario-comentario">
  <form action="/comentario/adiciona/{{$p->id}}/{{$pagina}}" method="post">

  <input type="hidden"
  name="_token" value="{{{ csrf_token() }}}" />

  <input type="hidden"
  name="id_post" value="{{{ $p['id'] }}}" />


  <div class="form-group">
  <label>Usuario</label>
  <input name="nome" class="form-control" >
  </div>

  <div class="form-group">
  <label>Email (Opicional)</label>
  <input name="email" class="form-control">
  </div>

  <div class="form-group">
  <textarea name="texto" rows="8" cols="80"></textarea>
  </div>

  <button type="submit" class="btn btn-primary btn-block">Enviar</button>

</div>
@endsection