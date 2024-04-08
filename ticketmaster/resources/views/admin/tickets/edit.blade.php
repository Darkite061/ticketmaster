@extends('/admin/plantilla/layout')

@section('titulo','Lista_de_tickets')

@section('contenido')
<h1>EDITAR</h1>
<form class="row g-3 needs-validation" method="POST" action="/tickets/{{$tickets->id}}" novalidate enctype="multipart/form-data">
  @csrf  
  @method('PUT')
  <div class="col-md-12">
    <label for="event_id">Event id:</label>
    <select name="event_id" id="event_id">
        @foreach ($events as $event)
            <option value="{{ $event->id }}" @if($tickets && $tickets->event_id == $event->id) selected @endif>{{ $event->name }}</option>
        @endforeach
    </select>
  </div>
  <div class="col-md-12">
    <label for="user_id">User id:</label>
    <select name="user_id" id="user_id">
        @foreach ($users as $user)
            <option value="{{ $user->id }}" @if($tickets && $tickets->user_id == $user->id) selected @endif>{{ $user->name }}</option>
        @endforeach
    </select>
  </div>

    <!-- Agregar campos ocultos para almacenar los nombres seleccionados -->
  <input type="hidden" name="event_name" id="event_name">
  <input type="hidden" name="user_name" id="user_name">
  
  <!-- Agregar script JavaScript para actualizar campos ocultos al seleccionar una opción -->
  <script>
      document.getElementById('event_id').addEventListener('change', function () {
          var selectedOption = this.options[this.selectedIndex];
          document.getElementById('event_name').value = selectedOption.text;
      });
  
      document.getElementById('user_id').addEventListener('change', function () {
          var selectedOption = this.options[this.selectedIndex];
          document.getElementById('user_name').value = selectedOption.text;
      });
  </script>
  
  <div class="col-md-12">
    <label for="validationCustom02" class="form-label">Price</label>
    <input type="text" class="form-control" id="validationCustom02" value="{{$tickets->price}}" name="price" required>
    <div class="valid-feedback">
      Looks good!
    </div>
    <div class="invalid-feedback">
      Please choose a price.
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