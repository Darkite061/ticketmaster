@extends('admin/plantilla/layout')

@section('title','Lista_de_categorias')

@section('contenido')
<h1>EDITAR</h1>
<form class="row g-3 needs-validation" method="POST" action="/categories/{{$categoria->id}}" novalidate enctype="multipart/form-data">
  @csrf  
  @method('PUT')
  <div class="col-md-12">
      <label for="validationCustom01" class="form-label">Categoria</label>
      <input type="text" class="form-control" id="validationCustom01" name="name" value="{{$categoria->name}}" required>
      <div class="valid-feedback">
        Looks good!
      </div>
      <div class="invalid-feedback">
          Porfa ingresar la categoria
      </div>
    </div>
    <div class="col-md-12">
      <label for="validationCustom01" class="form-label">Descripcion</label>
      <input type="text" class="form-control" id="validationCustom01" name="description" value="{{$categoria->description}}" required>
      <div class="valid-feedback">
        Looks good!
      </div>
      <div class="invalid-feedback">
          Porfa ingresar el genero
      </div>
    </div>
    <div class="col-md-12">
      <label for="validationCustom03" class="form-label">IMG</label>
      <img src="{{ $categoria->image }}" alt="{{ $categoria->image }}" width="150">
      <input type="file" accept="image/*" class="form-control" id="validationCustom03" name="image" required>
      <div class="valid-feedback">
        Looks good!
      </div>
      <div class="invalid-feedback">
        Please provide a img.
      </div>
    </div>
    <div class="col-12">
      <button class="btn btn-primary" type="submit">actualizar</button>
    </div>
</form>
<script>
    // Example starter JavaScript for disabling form submissions if there are invalid fields
(() => {
  'use strict'

  // Fetch all the forms we want to apply custom Bootstrap validation styles to
  const forms = document.querySelectorAll('.needs-validation')

  // Loop over them and prevent submission
  Array.from(forms).forEach(form => {
    form.addEventListener('submit', event => {
      if (!form.checkValidity()) {
        event.preventDefault()
        event.stopPropagation()
      }

      form.classList.add('was-validated')
    }, false)
  })
})()
</script>

@endsection