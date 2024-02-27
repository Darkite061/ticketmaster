@extends('/admin/plantilla/layout')

@section('titulo','LISTADO DE CATEGORIAS')

@section('contenido')
<div class="col-12">
  <a class="btn btn-primary" href="/admin/events/create">create category</a>
</div>
<table class="table">
  <thead>
    <tr>
      <th scope="col">id</th>
      <th scope="col">name</th>
      <th scope="col">date</th>
      <th scope="col">description</th>
      <th scope="col">Categorie</th>
      <th scope="col">Artist</th>
      <th scope="col">Places</th>
      <th scope="col">Prices</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <th scope="row">1</th>
      <td>Mark</td>
      <td>Otto</td>
      <td>@mdo</td>
    </tr>
    <tr>
      <th scope="row">2</th>
      <td>Jacob</td>
      <td>Thornton</td>
      <td>@fat</td>
    </tr>
    <tr>
      <th scope="row">3</th>
      <td colspan="2">Larry the Bird</td>
      <td>@twitter</td>
    </tr>
  </tbody>
</table>
@endsection