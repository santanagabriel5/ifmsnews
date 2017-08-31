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

<a class="navbar-brand" href="{{action('PostController@todosposts', 0)}}">
    <b>Noticias</b>
</a>
@stop
<center>
@section('content')
<?php $o=5;
$i = 0;
?>
  <table  border="0">
<tr class="spaca_abaixo">
    @foreach($p as $post)

      @if($i==$o )
    </tr >
          <tr class="spaca_abaixo">
          <?php $o=$i+5; ?>
      @endif
      <?php $i++; ?>
      <?php $existe =0; ?>

        @if($post->estado == 1)
        <?php $existe =1; ?>

          <td><a href="/posts/mostra/{{$post->id}}/{{$pagina}}"><div id="textocontatos">
            <?php $imagen =0; ?>
            @foreach($imagens as $imagem)
              @if($imagem->post == $post->id && $imagen==0)
              <?php $imagen =1; ?>
              <img class="center-block" src="/storage/{{$imagem->novonome}}" alt="Imagem nao enviada" height="100" width="200">
              @endif
            @endforeach
            <h4>{{$post->titulo}}</h4><h5>
              {{$post->chamada}}</h5>
            </div></a></td>

        @endif
    @endforeach
  </table>

  @if(!isset($existe))
    <h1>Fim dos posts</h1>
  @endif

  @if($pagina>=10)
    <a href="{{action('PostController@todosposts', ($pagina-10))}}"><button type="button" class="btn btn-success" name="button">Voltar</button></a>
  @endif

  @if(($existe == 0))
    @else
      <a href="{{action('PostController@todosposts', ($pagina+10))}}"><button type="button" class="btn btn-success" name="button">Proximo</button></a>

  @endif
</center>

@endsection
