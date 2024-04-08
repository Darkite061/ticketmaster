@extends('admin/plantilla/layout')

@section('titulo','Lista_de_lugares')

@section('contenido')
<h1>LISTA</h1>
<div>
  <a class="btn btn-primary" href="/places/create">crear places</a>
</div>
<table class="table">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Nombre</th>
      <th scope="col">Direccion</th>
      <th scope="col">Capacidad</th>
      <th scope="col">IMG</th>
      <th scope="col">Editar</th>
      <th scope="col">Borrar</th>
    </tr>
  </thead>
  <tbody>
    @foreach($places as $place)
    <tr>
      <th scope="row">{{$place->id}}</th>
      <td>{{$place->name}}</td>
      <td>{{$place->address}}</td>
      <td>{{$place->capacity}}</td>
      <td>
        <img src="{{ $place->image }}" alt="{{ $place->image }}" width="150">
      </td>
      <td><a href="/places/editar/{{$place->id}}">editar</a></td>
      <td><a href="/places/mostrar/{{$place->id}}">borrar</a></td>
    </tr>
    @endforeach
  </tbody>
</table>
@endsection