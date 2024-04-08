@extends('/admin/plantilla/layout')

@section('titulo','Lista_de_tickets')

@section('contenido')
<h1>MOSTRAR</h1>
<form class="row g-3 needs-validation" method="POST" action="/tickets/{{$tickets->id}}" novalidate>
  @csrf  
  @method('DELETE')
  <div class="col-md-12">
    <label for="validationCustom01" class="form-label">Event id</label>
    <input type="text" class="form-control" id="validationCustom01" name="event_id" value="{{$tickets->event_id}}" required>
    <div class="valid-feedback">
      Looks good!
    </div>
    <div class="invalid-feedback">
      Please choose a name.
    </div>
  </div>
  <div class="col-md-12">
    <label for="validationCustom01" class="form-label">User id</label>
    <input type="text" class="form-control" id="validationCustom01" name="user_id" value="{{$tickets->user_id}}" required>
    <div class="valid-feedback">
      Looks good!
    </div>
    <div class="invalid-feedback">
      Please choose a name.
    </div>
  </div>
  <div class="col-md-12">
    <label for="validationCustom02" class="form-label">Precio</label>
    <input type="text" class="form-control" id="validationCustom02" value="{{$tickets->price}}" name="price" required>
    <div class="valid-feedback">
      Looks good!
    </div>
    <div class="invalid-feedback">
      Please choose a genero.
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