<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Quicksand:wght@400;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="\ccs\login\styles.css">
    <title>Login</title>
</head>
<body>
    <main class="container">
        <form method="POST" action="{{ route('inicia-sesion') }}" class="form">
            @csrf
                <div class="inputs">
                    <input type="text" id="email" name="email" placeholder="usuario" required autofocus>
                </div>
                <div class="inputs">
                    <input type="password" id="password" name="password" placeholder="contraseña" required>
                </div>
                <div>
                    <input type="checkbox" id="remember" name="remember">
                    <label for="remember">Recordarme</label>
                </div>
                <footer>
                    <button type="submit" id="button">Iniciar sesión</button>
                </footer>
        </form>
        
    </main>
    {{-- <script src="\ccs\login\script.js"></script> --}}
</body>
</html>