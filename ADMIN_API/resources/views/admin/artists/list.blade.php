@extends('admin/plantilla/layout')

@section('titulo','Lista_de_artistas')

@section('contenido')
<h1>LISTA</h1>
<div>
  <a class="btn btn-primary" href="/artist/create">crear artistas</a>
</div>
<table class="table">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Nombre</th>
      <th scope="col">Genero</th>
      <th scope="col">IMG</th>
      <th scope="col">Editar</th>
      <th scope="col">Borrar</th>
    </tr>
  </thead>
  <tbody>
    @foreach($artists as $artista)
    <tr>
      <th scope="row">{{$artista->id}}</th>
      <td>{{$artista->name}}</td>
      <td>{{$artista->genre}}</td>
      <td>
        <img src="{{ $artista->image }}" alt="{{ $artista->image }}" width="150">
      </td>
      <td><a href="/artist/editar/{{$artista->id}}">editar</a></td>
      <td><a href="/artist/mostrar/{{$artista->id}}">borrar</a></td>
    </tr>
    @endforeach
  </tbody>
</table>
@endsection