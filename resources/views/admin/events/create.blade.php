@extends('admin/plantilla/layout')

@section('title','Lista_de_categorias')

@section('contenido')
<h1>CREAR</h1>
<form class="row g-3 needs-validation" method="POST" action="/events" novalidate enctype="multipart/form-data">
  @csrf
  @method('POST')
  <div class="col-md-12">
    <label for="validationCustom01" class="form-label">events</label>
    <input type="text" class="form-control" id="validationCustom01" name="name" value="Name" required>
    <div class="valid-feedback">
      Looks good!
    </div>
    <div class="invalid-feedback">
        Porfa ingresar la events
    </div>
  </div>
  <div class="col-md-12">
    <label for="validationCustom01" class="form-label">Fecha:</label>
    <input type="date" name="date" id="date" value="{{ old('date') }}" required>
    <div class="valid-feedback">
      Looks good!
    </div>
    <div class="invalid-feedback">
        Porfa ingresar el genero
    </div>
  </div>
  <div class="col-md-12">
    <label for="validationCustom01" class="form-label">Descripcion</label>
    <input type="text" class="form-control" id="validationCustom01" name="description" value="Description" required>
    <div class="valid-feedback">
      Looks good!
    </div>
    <div class="invalid-feedback">
        Porfa ingresar el genero
    </div>
  </div>
  <div class="col-md-12">
    <label for="validationCustom01" class="form-label">price_tickets</label>
    <input type="text" class="form-control" id="validationCustom01" name="price_tickets" value="price_tickets" required>
    <div class="valid-feedback">
      Looks good!
    </div>
    <div class="invalid-feedback">
        Porfa ingresar el price_tickets
    </div>
  </div>
  <div class="col-md-12">
  <label for="validationCustom01" class="form-label">Categoría:</label>
  <select name="category_id" id="category_id">
      @foreach ($categories as $category)
          <option value="{{ $category->id }}">{{ $category->name }}</option>
      @endforeach
  </select>
  </div>
  <div class="col-md-12">
  <label for="validationCustom01" class="form-label">Artista:</label>
  <select name="artist_id" id="artist_id">
      @foreach ($artists as $artist)
          <option value="{{ $artist->id }}">{{ $artist->name }}</option>
      @endforeach
  </select>
  </div>
  <div class="col-md-12">
  <label for="validationCustom01" class="form-label">Lugar:</label>
  <select name="places_id" id="places_id">
      @foreach ($places as $place)
          <option value="{{ $place->id }}">{{ $place->name }}</option>
      @endforeach
  </select>
  </div>
  <!-- Agregar campos ocultos para almacenar los nombres seleccionados -->
<input type="hidden" name="category_name" id="category_name">
<input type="hidden" name="artist_name" id="artist_name">
<input type="hidden" name="places_name" id="places_name">

<!-- Agregar script JavaScript para actualizar campos ocultos al seleccionar una opción -->
<script>
    document.getElementById('category_id').addEventListener('change', function () {
        var selectedOption = this.options[this.selectedIndex];
        document.getElementById('category_name').value = selectedOption.text;
    });

    document.getElementById('artist_id').addEventListener('change', function () {
        var selectedOption = this.options[this.selectedIndex];
        document.getElementById('artist_name').value = selectedOption.text;
    });

    document.getElementById('places_id').addEventListener('change', function () {
        var selectedOption = this.options[this.selectedIndex];
        document.getElementById('places_name').value = selectedOption.text;
    });
</script>
  <div class="col-md-12">
    <label for="validationCustom03" class="form-label">IMG</label>
    <input type="file" accept="image/*" class="form-control" id="validationCustom03" name="image" required>
    <div class="valid-feedback">
      Looks good!
    </div>
    <div class="invalid-feedback">
      Please provide a img.
    </div>
  </div>
  <div class="col-md-12">
      <label for="validationCustom03" class="form-label">IMG'S:</label>
      <input type="file" accept="image/*" class="form-control" id="validationCustom03" name="photos[]" multiple required>
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