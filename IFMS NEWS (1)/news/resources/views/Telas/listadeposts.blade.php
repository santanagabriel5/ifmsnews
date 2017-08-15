@extends('layouts.app')
@section('menus')
<a class="navbar-brand active" href="{{ url('/') }}">
    Home
</a>
<a class="navbar-brand" href="{{url('/sobre')}}">
  Sobre
</a>
<a class="navbar-brand" href="{{url('/contatos')}}">
  Contatos
</a>

<a class="navbar-brand" href="{{ url('/') }}">
    <b>Noticias</b>
</a>
@stop
<center>
@section('content')
<?php $o=3;
$i = -1;
?>

  <table  border="2">
<tr>
    @foreach($p as $post)

      @if($i==$o )
          </tr>
          <tr >
          <?php $o=$i+3; ?>
      @endif
      <?php $i++; ?>
        @if($post->estado == 1)
        <?php $existe =1; ?>
          <td><img src="{{url('/Imagem/dougras.jpg')}}" alt="Image" height="100" width="100"/><a href="/posts/mostra/{{$post->id}}/{{$pagina}}"><h4>{{$post->titulo}}</h4></a><br><h5>{{$post->chamada}}</h5></td>
        @endif
    @endforeach
  </table>

  @if(!isset($existe))
    <h1>Fim dos posts</h1>
  @endif

  @if($pagina>=10)
    <a href="{{action('PostController@todosposts', ($pagina-10))}}"><button type="button" class="btn btn-success" name="button">Voltar</button></a>
  @endif

  @if(!isset($existe))
    @else
      <a href="{{action('PostController@todosposts', ($pagina+10))}}"><button type="button" class="btn btn-success" name="button">Proximo</button></a>

  @endif
</center>

@endsection
