@extends('admin/plantilla/layout')

@section('title','Lista_de_eventos')

@section('contenido')
<h1>LISTA</h1>
<div>
    <a class="btn btn-primary" href="/events/create">crear evento</a>
</div>
<table class="table">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Nombre</th>
      <th scope="col">Date</th>
      <th scope="col">Descripcion</th>
      <th scope="col">IMG</th>
      <th scope="col">Price_tickets</th>
      <th scope="col">Category_id</th>
      <th scope="col">Artist_id</th>
      <th scope="col">Places_id</th>
      <th scope="col">Editar</th>
      <th scope="col">Borrar</th>
      
    </tr>
  </thead>
  <tbody>
    @foreach($events as $event)
    <tr>
      <th scope="row">{{$event->id}}</th>
      <td>{{$event->name}}</td>
      <td>{{$event->date}}</td>
      <td>{{$event->description}}</td>
      <td>
        <img src="{{ $event->image }}" alt="{{ $event->image }}" width="150">
      </td>
      <td>{{$event->price_tickets}}</td>
      <td>{{$event->category_id}}</td>
      <td>{{$event->artist_id}}</td>
      <td>{{$event->places_id}}</td>
      <td><a href="/events/editar/{{$event->id}}">editar</a></td>
      <td><a href="/events/mostrar/{{$event->id}}">borrar</a></td>
    </tr>
    @endforeach
  </tbody>
</table>

@endsection