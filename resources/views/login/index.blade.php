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
        <form class="form">
            <h1>Login</h1>
            <div class="inputs">
                <input required type="text" id="user" placeholder="usuario">
                <input required type="password" id="password" placeholder="contraseña">
            </div>
            <footer>
                <button id="button">Log in</button>
            </footer>
        </form>
    </main>
    <script src="\ccs\login\script.js"></script>
</body>
</html>