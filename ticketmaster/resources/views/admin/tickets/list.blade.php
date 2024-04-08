@extends('admin/plantilla/layout')

@section('titulo','Lista_de_tickets')

@section('contenido')
<h1>LISTA</h1>
<table class="table">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">event_id</th>
      <th scope="col">user_id</th>
      <th scope="col">price</th>
      <th scope="col">Editar</th>
      <th scope="col">Borrar</th>
    </tr>
  </thead>
  <tbody>
    @foreach($tickets as $ticket)
    <tr>
      <th scope="row">{{$ticket->id}}</th>
      <td>{{$ticket->event_id}}</td>
      <td>{{$ticket->user_id}}</td>
      <td>{{$ticket->price}}</td>
      <td><a href="/tickets/editar/{{$ticket->id}}">editar</a></td>
      <td><a href="/tickets/mostrar/{{$ticket->id}}">borrar</a></td>
    </tr>
    @endforeach
  </tbody>
</table>
@endsection