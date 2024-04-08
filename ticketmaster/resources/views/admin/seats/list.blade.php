@extends('admin/plantilla/layout')

@section('titulo','Lista_de_seats')

@section('contenido')
<h1>LISTA</h1>
<div>
  <a class="btn btn-primary" href="/seats/create">crear seats</a>
</div>
<table class="table">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">event_id</th>
      <th scope="col">section</th>
      <th scope="col">row</th>
      <th scope="col">number</th>
      <th scope="col">Editar</th>
      <th scope="col">Borrar</th>
    </tr>
  </thead>
  <tbody>
    @foreach($seats as $seat)
    <tr>
      <th scope="row">{{$seat->id}}</th>
      <td>{{$seat->event_id}}</td>
      <td>{{$seat->section}}</td>
      <td>{{$seat->row}}</td>
      <td>{{$seat->number}}</td>
      <td><a href="/seats/editar/{{$seat->id}}">editar</a></td>
      <td><a href="/seats/mostrar/{{$seat->id}}">borrar</a></td>
    </tr>
    @endforeach
  </tbody>
</table>
@endsection