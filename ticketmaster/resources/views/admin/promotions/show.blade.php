@extends('/admin/plantilla/layout')

@section('titulo','Lista_de_lugar')

@section('contenido')
<h1>MOSTRAR</h1>
<form class="row g-3 needs-validation" method="POST" action="/promotions/{{$promotions->id}}" novalidate>
  @csrf  
  @method('DELETE')
  <div class="col-md-12">
    <label for="validationCustom01" class="form-label">codigo</label>
    <input type="text" class="form-control" id="validationCustom01" name="code" value="{{$promotions->code}}" required>
    <div class="valid-feedback">
      Looks good!
    </div>
    <div class="invalid-feedback">
      Please choose a name.
    </div>
  </div>
  <div class="col-md-12">
    <label for="validationCustom02" class="form-label">Descripcion</label>
    <input type="text" class="form-control" id="validationCustom02" value="{{$promotions->description}}" name="description" required>
    <div class="valid-feedback">
      Looks good!
    </div>
    <div class="invalid-feedback">
      Please choose a genero.
    </div>
  </div>
  <div class="col-md-12">
    <label for="validationCustom02" class="form-label">Descuento</label>
    <input type="text" class="form-control" id="validationCustom02" value="{{$promotions->discount}}" name="discount" required>
    <div class="valid-feedback">
      Looks good!
    </div>
    <div class="invalid-feedback">
      Please choose a genero.
    </div>
  </div>
  <div class="col-md-12">
    <label for="validationCustom01" class="form-label">Date</label>
    <input type="text" class="form-control" id="validationCustom01" name="start_date" value="{{ \Carbon\Carbon::parse($promotions->start_date)->format('Y-m-d') }}" required>
    <div class="valid-feedback">
        Looks good!
    </div>
    <div class="invalid-feedback">
        Por favor, ingresa la fecha.
    </div>
  </div>
  <div class="col-md-12">
    <label for="validationCustom01" class="form-label">Date</label>
    <input type="text" class="form-control" id="validationCustom01" name="end_date" value="{{ \Carbon\Carbon::parse($promotions->end_date)->format('Y-m-d') }}" required>
    <div class="valid-feedback">
        Looks good!
    </div>
    <div class="invalid-feedback">
        Por favor, ingresa la fecha.
    </div>
  </div>
  <class="col-12">
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