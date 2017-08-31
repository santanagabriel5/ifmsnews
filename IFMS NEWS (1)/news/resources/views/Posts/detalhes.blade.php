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
    Noticias
</a>
@stop

@section('content')
@if(\Auth::check())
<a href=" {{action('PostController@gerenciadordepost')}} "><button type="button" class="btn btn-success">Voltar ao gerenciador</button></a>
@endif
<center>
<h1>{{$p->titulo}}</h1>
<h2>{{$p->chamada}}</h2>

<!-- CARROSEL MULEK -->
<div id="CARROSEL" class="carousel slide" data-ride="carousel">

  <!-- Indicadores -->
<ol class="carousel-indicators">
  <?php $o=0; ?>
   @foreach($imagens as $imag)
   <li data-target="#CARROSEL" data-slide-to={{$o}} @if($o == 0) class="active" @endif ></li>
   <?php $o++; ?>
   @endforeach
</ol>

           <!--slides -->
       <div class="carousel-inner" role="listbox">
         <?php $i=0; ?>
         @foreach($imagens as $imag)

         <div class="item @if($i==0) active @endif ">
           <?php $i++; ?>

           <img class="center-block" src="/storage/{{$imag->novonome}}" alt="Imagem nao enviada" style="max-height: 500px">
          </div>

         @endforeach

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
<h5>{{$p->texto}}</h5>
</center>
<br>
<h3 id="labelcomentarios">Comentarios</h3>

@foreach($comentarios as $comentario)

<div id="comentario">
Nome :{{$comentario->nome}}  <br> Data :{{$comentario->updated_at}}
<br>

<?php $output = str_split($comentario->texto, 20); ?>
@foreach($output as $texto)
{{$texto}}
@endforeach
</div>
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
