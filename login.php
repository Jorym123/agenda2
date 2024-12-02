<?php
    session_start();
    // Incluye archivos necesarios para establecer conexión con la base de datos y las clases necesarias
    require_once('../agenda2/conexion.php');
    require_once('../agenda2/clases/usuario.php');

    // Crea una instancia de la clase Usuario para manejar operaciones relacionadas con los usuarios
    $usuario = new Usuario($conexion);

    // Verifica si el formulario ha sido enviado mediante el método POST
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        // Obtiene y limpia los datos del formulario para evitar inyecciones SQL
        $email = mysqli_real_escape_string($conexion, $_POST['email']);
        $password = $_POST['password'];

        $sql = "SELECT * FROM `usuarios` WHERE email='$email'";
        $resultado = mysqli_query($conexion, $sql);

        // Si se encuentra el usuario
        if (mysqli_num_rows($resultado) > 0) {
            $user = mysqli_fetch_assoc($resultado);

            // Verifica si la contraseña ingresada coincide con la almacenada en la base de datos
            if (password_verify($password, $user['password'])) {
                // Si la contraseña es válida, guarda el nombre del usuario y marca como autenticado
                $_SESSION['usuarios'] = $user['nombre'];
                $_SESSION['autenticado'] = true;

                // Redirige al usuario al dashboard después de iniciar sesión correctamente
                header("location: /agenda2/dashboard/index.php");
                exit;
            } else {
                // Si la contraseña es inválida, muestra un mensaje de error
                echo "Contraseña invalida";
            }
        }
    }
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Definir el conjunto de caracteres y la vista para dispositivos móviles -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Iniciar Sesión</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="css/styles.css">
</head>

<body>
    <!-- Barra de navegación con enlaces de breadcrumbs para indicar la ubicación actual -->
    <header>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.php">Inicio</a></li>
                <li class="breadcrumb-item active">Iniciar Sesion</li>
                <li class="breadcrumb-item"><a href="registro.php">Registrarse</a></li>
            </ol>
        </nav>
    </header>

    <!-- Contenedor principal centrado para el formulario de inicio de sesión -->
    <div class="container d-flex justify-content-center align-items-center vh-10">
        <div class="card p-4 w-50">
            <h2 class="text-center">Iniciar Sesión</h2>

            <!-- Formulario de inicio de sesión -->
            <form method="POST">
                <div class="mb-3">
                    <label class="form-label"><i class="bi bi-envelope"></i> Correo Electrónico</label>
                    <input type="email" class="form-control" id="email" name="email" required>
                </div>

                <div class="mb-3">
                    <label class="form-label"><i class="bi bi-lock"></i>Contraseña</label>
                    <input type="password" class="form-control" id="password" name="password" required>
                </div>
                
                <?php if (isset($error)): ?>
                    <div class="alert alert-danger"><?php echo $error; ?></div>
                <?php endif; ?>

                <button type="submit" class="btn btn-primary w-100">Iniciar Sesión</button>
            </form>

            <!-- Enlace para redirigir a los usuarios a la página de registro en caso de no tener cuenta -->
            <p class="text-center mt-3">No tienes una cuenta? <a href="registro.php">Regístrate</a></p>
        </div>
    </div>

</body>

</html>
