@extends('admin/plantilla/layout')

@section('title','Lista_de_categoriass')

@section('contenido')
<h1>MOSTRAR</h1>
<form class="row g-3 needs-validation" method="POST" action="/events/{{$events->id}}" novalidate>
  @csrf  
  @method('DELETE')
  <div class="col-md-12">
    <label for="validationCustom01" class="form-label">events</label>
    <input type="text" class="form-control" id="validationCustom01" name="name" value="{{$events->name}}" required>
    <div class="valid-feedback">
      Looks good!
    </div>
    <div class="invalid-feedback">
        Porfa ingresar la events
    </div>
  </div>
  <div class="col-md-12">
    <label for="validationCustom01" class="form-label">Date</label>
    <input type="text" class="form-control" id="validationCustom01" name="date" value="{{ \Carbon\Carbon::parse($events->date)->format('Y-m-d') }}" required>
    <div class="valid-feedback">
        Looks good!
    </div>
    <div class="invalid-feedback">
        Por favor, ingresa la fecha.
    </div>
</div>
  <div class="col-md-12">
    <label for="validationCustom01" class="form-label">Descripcion</label>
    <input type="text" class="form-control" id="validationCustom01" name="description" value="{{$events->description}}" required>
    <div class="valid-feedback">
      Looks good!
    </div>
    <div class="invalid-feedback">
        Porfa ingresar el genero
    </div>
  </div>
  <div class="col-md-12">
    <label for="validationCustom01" class="form-label">price_tickets</label>
    <input type="text" class="form-control" id="validationCustom01" name="price_tickets" value="{{$events->price_tickets}}" required>
    <div class="valid-feedback">
      Looks good!
    </div>
    <div class="invalid-feedback">
        Porfa ingresar el price_tickets
    </div>
  </div>
    <div class="col-12">
      <button class="btn btn-primary" type="submit">Borrar</button>
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