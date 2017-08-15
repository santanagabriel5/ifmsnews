@extends('layouts.app')
@section('menus')
<a class="navbar-brand active" href="{{ url('/') }}">
    Home
</a>
<a class="navbar-brand" href="{{url('/sobre')}}">
  Sobre
</a>
<a class="navbar-brand" href="{{url('/contatos')}}">
    <b>Contatos</b>
</a>

<a class="navbar-brand" href="{{ url('/') }}">
 Noticias
</a>
@stop
@section('content')
<center>
<div class="entry_conteudo_pagina">
<table border="1" cellpadding="0">
<tbody>
<tr>
<td width="113">
<p align="center"><strong>Unidade</strong></p>
</td>
<td width="234">
<p align="center"><strong>Telefone</strong></p>
</td>
</tr>
<tr>
<td width="113">
<p align="center">Reitoria</p>
</td>
<td width="234">
<p align="center">+ 55 (67) 3378-9501</p>
</td>
</tr>
<tr>
<td width="113">
<p align="center">Aquidauana</p>
</td>
<td width="234">
<p align="center">+ 55 (67) 3240-1600</p>
</td>
</tr>
<tr>
<td width="113">
<p align="center">Campo Grande</p>
</td>
<td width="234">
<p align="center">+ 55 (67) 3357-8501</p>
</td>
</tr>
<tr>
<td width="113">
<p align="center">Corumbá</p>
</td>
<td width="234">
<p align="center">+ 55 (67) 3234-9101</p>
</td>
</tr>
<tr>
<td width="113">
<p align="center">Coxim</p>
</td>
<td width="234">
<p align="center">+ 55 (67) 3291-9600</p>
</td>
</tr>
<tr>
<td width="113">
<p align="center">Dourados</p>
</td>
<td width="234">
<p align="center">+ 55 (67) 3410-8500</p>
</td>
</tr>
<tr>
<td width="113">
<p align="center">Jardim</p>
</td>
<td width="234">
<p align="center">+ 55 (67) 3209-0200</p>
</td>
</tr>
<tr>
<td width="113">
<p align="center">Naviraí</p>
</td>
<td width="234">
<p align="center">+ 55 (67) 3409-2501</p>
</td>
</tr>
<tr>
<td width="113">
<p align="center">Nova Andradina</p>
</td>
<td width="234">
<p align="center">+ 55 (67) 3378-9510</p>
</td>
</tr>
<tr>
<td width="113">
<p align="center">Ponta Porã</p>
</td>
<td width="234">
<p align="center">+ 55 (67) 3437-9600</p>
</td>
</tr>
<tr>
<td width="113">
<p align="center">Três Lagoas</p>
</td>
<td width="234">
<p align="center">+ 55 (67) 3509-9500</p>
</td>
</tr>
</tbody>
</table>
<p><span id="more-47"></span>Endereço</p>
<p>Rua Ceará, 972 – Santa Fé – Campo Grande – MS<br />
CEP: 79021-000<br />
Telefone: (67) 3378-9625<br />
E-mail: ouvidoria@ifms.edu.br<br />
Atendimento: segunda a sexta-feira, das 8h às 12h e das 13h às 17h.</p>
</div>
</center>
@endsection
