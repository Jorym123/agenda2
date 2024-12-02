<?php
    require_once('../agenda2/conexion.php');
    require_once('../agenda2/clases/usuario.php');

    // Crear una instancia del objeto Usuario
    $usuarios = new Usuario($conexion);

    // Verificar si el formulario fue enviado
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        // Capturar los datos del formulario
        $nombre = $_POST['nombre'];
        $email = $_POST['email'];
        $password = $_POST['password'];

        // Registrar al usuario y mostrar el resultado
        echo $usuarios->registrarUsuario($nombre, $email, $password);
    }
    ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Meta etiquetas para definir el juego de caracteres y la vista en dispositivos móviles -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <title>Registrarse</title>
!-- Enlaces a las hojas de estilo de Bootstrap y los íconos de Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="css/styles.css">
</head>

<body>
    <!-- Barra de navegación para mostrar el recorrido de la página -->
    <header>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <!-- Enlaces a las páginas de inicio y login -->
                <li class="breadcrumb-item"><a href="index.php">Inicio</a></li>
                <li class="breadcrumb-item"><a href="login.php">Iniciar Sesión</a></li>
                <li class="breadcrumb-item active">Registrarse</li>
            </ol>
        </nav>
    </header>
    <!-- Contenedor principal centrado para el formulario de registro -->
    <div class="container d-flex justify-content-center align-items-center vh-100">
        <div class="card p-4 w-50">
            <!-- Título del formulario -->
            <h2 class="text-center">Registrarse</h2>

            <!-- Formulario de registro -->
            <form method="POST">

                <div class="mb-3">
                    <label class="form-label"><i class="bi bi-person"></i>Usuario</label>
                    <input type="text" class="form-control" id="nombre" name="nombre" required>
                </div>

                <div class="mb-3">
                    <label class="form-label"><i class="bi bi-envelope"></i>Correo Electrónico</label>
                    <input type="email" class="form-control" id="email" name="email" required>
                </div>

                <div class="mb-3">
                    <label class="form-label"><i class="bi bi-lock"></i>Contraseña</label>
                    <input type="password" class="form-control" id="password" name="password" required>
                </div>

                <?php if (isset($error)): ?>
                    <div class="alert alert-danger"><?php echo $error; ?></div>
                <?php endif; ?>

                <button type="submit" class="btn btn-primary w-100">Registrarse</button>
            </form>

            <p class="text-center mt-3">ya tienes una cuenta? <a href="login.php">inicia Sesion</a></p>
        </div>
    </div>
</body>

</html>
