<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro</title>
    <link rel="stylesheet" href="css/style.css">
    <link href="https://fonts.googleapis.com/css2?family=Anton&display=swap" rel="stylesheet">
</head>
<body>
<div class="login-container">
    <h2>Registro</h2>
    <form action="php/register.php" method="post">
        <input type="text" name="username" placeholder="Usuario" required>
        <input type="password" name="password" placeholder="Contraseña" required>
        <input type="submit" value="Registrar">
    </form>
    <div class="error-message" id="error-message" style="display: none;"></div>
</div>
<script>
    // Verificar si hay un parámetro de error en la URL
    const urlParams = new URLSearchParams(window.location.search);
    const errorMessage = document.getElementById('error-message');
    if (urlParams.has('error')) {
        const error = urlParams.get('error');
        if (error === '1') {
            errorMessage.innerText = 'El usuario ya existe';
        } else if (error === '2') {
            errorMessage.innerText = 'Error al registrar el usuario';
        }
        errorMessage.style.display = 'block';
    }
</script>
</body>
</html>