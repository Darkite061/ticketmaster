@extends('admin/plantilla/layout')

@section('titulo','Lista_de_promociones')

@section('contenido')
<h1>LISTA</h1>
<div>
  <a class="btn btn-primary" href="/promotions/create">crear promociones</a>
</div>
<table class="table">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">code</th>
      <th scope="col">description</th>
      <th scope="col">discount</th>
      <th scope="col">start_date</th>
      <th scope="col">end_date</th>
      <th scope="col">Editar</th>
      <th scope="col">Borrar</th>
    </tr>
  </thead>
  <tbody>
    @foreach($promotions as $promo)
    <tr>
      <th scope="row">{{$promo->id}}</th>
      <td>{{$promo->code}}</td>
      <td>{{$promo->description}}</td>
      <td>{{$promo->discount}}</td>
      <td>{{$promo->start_date}}</td>
      <td>{{$promo->end_date}}</td>
      <td><a href="/promotions/editar/{{$promo->id}}">editar</a></td>
      <td><a href="/promotions/mostrar/{{$promo->id}}">borrar</a></td>
    </tr>
    @endforeach
  </tbody>
</table>
@endsection