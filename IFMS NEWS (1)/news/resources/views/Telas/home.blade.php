@extends('layouts.app')
@section('menus')
<a class="navbar-brand active" href="{{ url('/') }}">
    <b>Home</b>
</a>
<a class="navbar-brand" href="{{url('/sobre')}}">
  Sobre
</a>
<a class="navbar-brand" href="{{url('/contatos')}}">
  Contatos
</a>

<a class="navbar-brand" href="{{ url('/') }}">
    Noticias
</a>
@stop
@section('content')


<!-- CARROSEL MULEK -->
<div id="CARROSEL" class="carousel slide" data-ride="carousel">

  <!-- Indicadores -->
<ol class="carousel-indicators">
  <li data-target="#CARROSEL" data-slide-to="0" class="active"></li>

  @for($i = 1; $i < 5 ; $i++)
  <li data-target="#CARROSEL" data-slide-to="{{$i}}"></li>
    @endfor
</ol>

           <!--slides -->
       <div class="carousel-inner" role="listbox">

         @for($i = 0; $i < 5 ; $i++)
                       <div class="item @if($i==0) active @endif ">
                           <img class="center-block" src="{{url('/Imagem/img1.jpg')}}" alt="Imagem" style="max-height: 500px">
                           <div class="carousel-caption">
                                  <h3>{{$p[$i]->titulo}}</h3>
                                  <p>{{$p[$i]->chamada}}</p>
                           </div>
               </div>
       @endfor
       </div>

       <!-- Controles -->
               <a class="left carousel-control" href="#CARROSEL" role="button" data-slide="prev">
                   <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
                   <span class="sr-only">Anterior</span>
           </a>
               <a class="right carousel-control" href="#CARROSEL" role="button" data-slide="next">
                   <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
                   <span class="sr-only">Proximo</span>
       </a>
   </div>
<!-- FIM DO CARROSEL MULEk -->
<br>
<center>
<table  cellpadding="300" border="1" height="300"  >
  <tr>
    <?php
    $limitador = count($p);
    $o=7; ?>

  @for($i = 5; $i < $limitador ; $i++)



    @if($i==$o )
        </tr>
        <tr >
        <?php $o=$i+2; ?>
        @endif
  @if($p[$i]->estado==1)
      <td align="center"  style="padding: 10px" >
      {{$p[$i]->titulo}}<br>
      {{$p[$i]->chamada}}<br>
      <a href="{{action('PostController@mostra', $p[$i]->id)}}">Mostrar</a>
      </td>
      @endif
      @if($i >= 9 )
        <?php $i = $limitador++; ?>
        @endif
  @endfor
</table>
<center>
<br>
<a href="{{action('PostController@todosposts', 0)}}"><button type="button" class="btn btn-success" name="button">Ver Mais Noticias</button></a>
@endsection
