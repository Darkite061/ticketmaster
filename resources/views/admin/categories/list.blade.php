@extends('admin/plantilla/layout')

@section('title','Lista_de_categorias')

@section('contenido')
<h1>LISTA</h1>
<div>
    <a class="btn btn-primary" href="/categories/create">crear categoria</a>
</div>
<table class="table">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Genero</th>
      <th scope="col">Tipo</th>
      <th scope="col">img</th>
      <th scope="col">editar</th>
      <th scope="col">borrar</th>
      
    </tr>
  </thead>
  <tbody>

@foreach($categorias as $categoria)

    <tr>
      <th scope="row">{{$categoria->id}}</th>
      <td>{{$categoria->name}}</td>
      <td>{{$categoria->description}}</td>
      <td>
        <img src="{{ $categoria->image }}" alt="{{ $categoria->image }}" width="150">
      </td>
      <td><a href="/categories/editar/{{$categoria->id}}">editar</a></td>
      <td><a href="/categories/mostrar/{{$categoria->id}}">borrar</a></td>
    </tr>
  
    
    </tr> 
    @endforeach
  </tbody>
</table>

@endsection