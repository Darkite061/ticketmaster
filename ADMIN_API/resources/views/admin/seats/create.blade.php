@extends('/admin/plantilla/layout')

@section('titulo','CREAR SEATS')

@section('contenido')
<h1>CREAR</h1>
<form class="row g-3 needs-validation" method="POST" action="/seats" novalidate enctype="multipart/form-data">
  @csrf
  @method('POST')
  <div class="col-md-12">
    <label for="validationCustom01" class="form-label">Evento::</label>
    <select name="event_id" id="event_id">
        @foreach ($events as $event)
            <option value="{{ $event->id }}">{{ $event->name }}</option>
        @endforeach
    </select>
    </div>
    
    <!-- Agregar campos ocultos para almacenar los nombres seleccionados -->
  <input type="hidden" name="event_name" id="event_name">
  
  <!-- Agregar script JavaScript para actualizar campos ocultos al seleccionar una opción -->
  <script>
      document.getElementById('event_id').addEventListener('change', function () {
          var selectedOption = this.options[this.selectedIndex];
          document.getElementById('event_name').value = selectedOption.text;
      });
  </script>
  <div class="col-md-12">
    <label for="validationCustom02" class="form-label">Section:</label>
    <input type="text" class="form-control" id="validationCustom02" value="section" name="section" required>
    <div class="valid-feedback">
      Looks good!
    </div>
    <div class="invalid-feedback">
      Please choose a section.
    </div>
  </div>
    <div class="col-md-12">
      <label for="validationCustom02" class="form-label">Row:</label>
      <input type="text" class="form-control" id="validationCustom02" value="Fila" name="row" required>
      <div class="valid-feedback">
        Looks good!
      </div>
      <div class="invalid-feedback">
        Please choose a fila.
      </div>
    </div>
    <div class="col-md-12">
      <label for="validationCustom02" class="form-label">Number:</label>
      <input type="text" class="form-control" id="validationCustom02" value="number" name="number" required>
      <div class="valid-feedback">
        Looks good!
      </div>
      <div class="invalid-feedback">
        Please choose a genero.
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