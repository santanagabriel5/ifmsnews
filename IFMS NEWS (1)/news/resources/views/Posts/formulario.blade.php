@extends('layouts.app')

@section('content')
<form action="/posts/adiciona" method="post">
  <?php      $user = app('Illuminate\Contracts\Auth\Guard')->user();
   ?>
  <input type="hidden"
  name="_token" value="{{{ csrf_token() }}}" />

  <input type="hidden"
  name="id_user" value="{{{ $user['id'] }}}" />
  
<div class="form-group">
<label>Titulo</label>
<input name="titulo" class="form-control">
</div>

<div class="form-group">
<label>Chamada</label>
<input name="chamada" class="form-control">
</div>

<div class="form-group">
<textarea name="texto" rows="8" cols="80"></textarea>
</div>


<button type="submit" class="btn btn-primary btn-block">Salvar</button>
</form>
@endsection
