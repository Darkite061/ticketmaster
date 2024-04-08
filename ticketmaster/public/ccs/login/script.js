const button = document.querySelector("#button");
let SUCCESSFUL = true;

const err = (err) => {
  alert(`${err}\nLog in no exitoso! Vuelve a intentarlo...`);
  SUCCESSFUL = false;
};

button.addEventListener("click", () => {
  // event.preventDefault();
  const user = document.querySelector("#user");
  const password = document.querySelector("#password");

  if (!user.value || !password.value) return;

  const name = user.value;
  const pass = password.value;

  // Verificar longitud de usuario y contraseña
  if (name.length < 4 || name.length > 10 || pass.length < 8 || pass.length > 10) {
    err("El usuario debe tener de 4 a 10 caracteres y la contraseña debe tener de 8 a 10.");
    return;
  }
  
  // Verificar que no haya Numeros o mayusculas
  if (/[A-Z0-9]/.test(pass)) {
    err("No se permiten mayusculas ni numeros.");
    return;
  }

  // Verificar que no haya espacios en el usuario o contraseña
  if (/\s/.test(name) || /\s/.test(pass)) {
    err("No se permiten espacios en el usuario o contraseña.");
    return;
  }

  // Verificar que no tenga caracteres especiales en medio
  if (/^[^A-Z0-9]+[^a-zA-Z0-9]*[a-zA-Z0-9]*$/.test(name)) {
    err("No se permiten caracteres minusculas y caracteres especiales al inicio del usuario.");
    return;
  }

  // Verificar que no tenga caracteres especiales en medio
  if (/^[^a-zA-Z0-9]*[a-z]+[^a-zA-Z0-9]+[a-z]+[^a-zA-Z0-9]*$/.test(pass)) {
    err("Solo permiten caracteres especiales al inicio y el final de la contraseña.");
    return;
  }

if (SUCCESSFUL) alert("Log in exitoso!");
href="/index1.html"

});

