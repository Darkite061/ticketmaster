@extends('/admin/plantilla/layout')

@section('titulo','CREAR Lugar')

@section('contenido')
<h1>CREAR</h1>
<form class="row g-3 needs-validation" method="POST" action="/places" novalidate enctype="multipart/form-data">
  @csrf
  @method('POST')
    <div class="col-md-12">
      <label for="validationCustom01" class="form-label">Lugar</label>
      <input type="text" class="form-control" id="validationCustom01" name="name" value="Lugar" required>
      <div class="valid-feedback">
        Looks good!
      </div>
      <div class="invalid-feedback">
        Please choose a name.
      </div>
    </div>
    <div class="col-md-12">
      <label for="validationCustom02" class="form-label">Dirreccion</label>
      <input type="text" class="form-control" id="validationCustom02" value="Direccion" name="address" required>
      <div class="valid-feedback">
        Looks good!
      </div>
      <div class="invalid-feedback">
        Please choose a genero.
      </div>
    </div>
    <div class="col-md-12">
      <label for="validationCustom02" class="form-label">Capacidad</label>
      <input type="text" class="form-control" id="validationCustom02" value="Capacidad" name="capacity" required>
      <div class="valid-feedback">
        Looks good!
      </div>
      <div class="invalid-feedback">
        Please choose a genero.
      </div>
    </div>
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
      <div class="col-12">
        <button class="btn btn-primary" type="submit">Submit form</button>
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