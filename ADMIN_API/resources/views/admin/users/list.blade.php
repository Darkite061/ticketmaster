@extends('admin/plantilla/layout')

@section('titulo','Lista_de_usuarios')

@section('contenido')
<h1>LISTA</h1>
<div>
  <a class="btn btn-primary" href="/users/create">crear usuarios</a>
</div>
<table class="table">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Nombre</th>
      <th scope="col">last_name</th>
      <th scope="col">image</th>
      <th scope="col">email</th>
      <th scope="col">password</th>
      <th scope="col">permission</th>
      <th scope="col">Editar</th>
      <th scope="col">Borrar</th>
    </tr>
  </thead>
  <tbody>
    @foreach($users as $user)
    <tr>
      <th scope="row">{{$user->id}}</th>
      <td>{{$user->name}}</td>
      <td>{{$user->last_name}}</td>
      <td>
      <img src="{{ $user->image }}" alt="{{ $user->image }}" width="150">
      </td>
      <td>{{$user->email}}</td>
      <td>{{$user->password}}</td>
      <td>{{$user->permission}}</td>
      <td><a href="/users/editar/{{$user->id}}">editar</a></td>
      <td><a href="/users/mostrar/{{$user->id}}">borrar</a></td>
    </tr>
    @endforeach
  </tbody>
</table>
@endsection