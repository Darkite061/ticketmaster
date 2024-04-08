@extends('admin/plantilla/layout')

@section('titulo','Lista_de_reviews')

@section('contenido')
<h1>LISTA</h1>
<table class="table">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">event_id</th>
      <th scope="col">rating</th>
      <th scope="col">comment</th>
      <th scope="col">Editar</th>
      <th scope="col">Borrar</th>
    </tr>
  </thead>
  <tbody>
    @foreach($reviews as $review)
    <tr>
      <th scope="row">{{$review->id}}</th>
      <td>{{$review->event_id}}</td>
      <td>{{$review->rating}}</td>
      <td>{{$review->comment}}</td>
      <td><a href="/reviews/editar/{{$review->id}}">editar</a></td>
      <td><a href="/reviews/mostrar/{{$review->id}}">borrar</a></td>
    </tr>
    @endforeach
  </tbody>
</table>
@endsection