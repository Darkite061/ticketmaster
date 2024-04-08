@extends('admin/plantilla/layout')

@section('titulo','Lista_de_purchases')

@section('contenido')
<h1>LISTA</h1>
<table class="table">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">user_id</th>
      <th scope="col">date</th>
      <th scope="col">total_amount</th>
      <th scope="col">Editar</th>
      <th scope="col">Borrar</th>
    </tr>
  </thead>
  <tbody>
    @foreach($purchases as $purchase)
    <tr>
      <th scope="row">{{$purchase->id}}</th>
      <td>{{$purchase->user_id}}</td>
      <td>{{$purchase->date}}</td>
      <td>{{$purchase->total_amount}}</td>
      <td><a href="/purchases/editar/{{$purchase->id}}">editar</a></td>
      <td><a href="/purchases/mostrar/{{$purchase->id}}">borrar</a></td>
    </tr>
    @endforeach
  </tbody>
</table>
@endsection