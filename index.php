<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Definir el juego de caracteres y la configuración de la vista para dispositivos móviles -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <!-- Incluir Bootstrap para los estilos y componentes -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    
    <!-- Enlace a un archivo CSS adicional para personalizar la apariencia -->
    <link rel="stylesheet" href="css/styles.css">

    <!-- Título de la página que aparecerá en la pestaña del navegador -->
    <title>Dashboard</title>
</head>

<body>
    <!-- Barra de navegación que muestra el recorrido de las páginas -->
    <header>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <!-- Elementos de la barra de navegación -->
                <li class="breadcrumb-item active">Inicio</li>
                <li class="breadcrumb-item"><a href="login.php">Iniciar Sesion</a></li>
                <li class="breadcrumb-item"><a href="registro.php">Registrarse</a></li>
            </ol>
        </nav>
    </header>

    <main>
        <!-- Tarjeta que contiene el contenido central de la página -->
        <div class="card p-4 w-60 text-center">
            <h1>Agenda Digital</h1>
            <p>Organiza tus eventos, contactos y notas de forma segura y sencilla</p>

            <!-- Contenedor de botones de acción -->
            <div class="mb-3 center">
                <a href="login.php" class="btn btn-primary btn-lg me-3">Iniciar Sesión</a>

                <a href="registro.php" class="btn btn-secondary btn-lg">Registrarse</a>
            </div>
        </div>
    </main>

    <footer class="container text-center mt-5">
        <!-- Muestra el año actual con la función PHP date('Y') -->
        <p>&copy; <?= date('Y') ?> Agenda Digital</p>
        <p>Todos los derechos reservados</p>
    </footer>

</body>
</html>
