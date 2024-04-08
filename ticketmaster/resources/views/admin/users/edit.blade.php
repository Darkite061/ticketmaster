@extends('/admin/plantilla/layout')

@section('titulo','Lista_de_usuarios')

@section('contenido')
<h1>EDITAR</h1>
<form class="row g-3 needs-validation" method="POST" action="/users/{{$users->id}}" novalidate enctype="multipart/form-data">
  @csrf  
  @method('PUT')
  <div class="col-md-12">
    <label for="validationCustom01" class="form-label">Nombre</label>
    <input type="text" class="form-control" id="validationCustom01" name="name" value="{{$users->name}}" required>
    <div class="valid-feedback">
      Looks good!
    </div>
    <div class="invalid-feedback">
      Please choose a name.
    </div>
  </div>
  <div class="col-md-12">
    <label for="validationCustom02" class="form-label">Apellido</label>
    <input type="text" class="form-control" id="validationCustom02" value="{{$users->last_name}}" name="last_name" required>
    <div class="valid-feedback">
      Looks good!
    </div>
    <div class="invalid-feedback">
      Please choose a genero.
    </div>
  </div>
  <div class="col-md-12">
    <label for="validationCustom03" class="form-label">IMG</label>
    <img src="{{ $users->image }}" alt="{{ $users->image }}" width="150">
    <input type="file" accept="image/*" class="form-control" id="validationCustom03" name="image" required>
    <div class="valid-feedback">
      Looks good!
    </div>
    <div class="invalid-feedback">
      Please provide a img.
    </div>
  </div>
  <div class="col-md-12">
    <label for="validationCustom02" class="form-label">Correo</label>
    <input type="text" class="form-control" id="validationCustom02" value="{{$users->email}}" name="email" required>
    <div class="valid-feedback">
      Looks good!
    </div>
    <div class="invalid-feedback">
      Please choose a genero.
    </div>
  </div>
  <div class="col-md-12">
    <label for="validationCustom02" class="form-label">Contraseña</label>
    <input type="text" class="form-control" id="validationCustom02" value="{{$users->password}}" name="password" required>
    <div class="valid-feedback">
      Looks good!
    </div>
    <div class="invalid-feedback">
      Please choose a genero.
    </div>
  </div>
  <div class="col-md-12">
    <label for="validationCustom01" class="form-label">Permisos</label>
    <select name="permission">
            <option value="ADMIN">Administrador</option>
            <option value="USER">Usuario</option>
    </select>
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