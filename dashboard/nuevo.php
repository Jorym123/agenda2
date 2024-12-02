<?php
require_once("../conexion.php");
require_once("../clases/agenda.php");
require_once('../autenticacion.php');

// Verifica si el formulario ha sido enviado mediante el método POST
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Obtiene los datos enviados a través del formulario
    $tarea = $_POST['tarea'];          
    $estado = $_POST['estado'];        
    $fecha = $_POST['fecha'];         
    $prioridad = $_POST['prioridad'];  
    $nota = $_POST['nota'];           

    // Crea una instancia de la clase Agenda que maneja la lógica para insertar una tarea en la base de datos
    $agenda = new Agenda($conexion);
    // Llama al método insertarAgenda definido en clases/agenda
    $agenda->insertarAgenda($tarea, $estado, $fecha, $prioridad, $nota);

    // Redirige al usuario a la página de inicio después de insertar la tarea
    header("Location: index.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agregar Agenda</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

</head>

<body>

    <div class="container d-flex justify-content-center align-items-center vh-10">
        <div class="card p-4 w-50">
            <h2 class="text-center">Agregar Agenda</h2>

            <!-- Formulario para agregar una nueva tarea -->
            <form method="POST">
                <div class="mb-3">
                    <input type="text" name="tarea" required class="form-control" placeholder="Nombre de la tarea"><br>
                </div>

                <div class="mb-3">
                    <select name="estado" required class="form-select">
                        <!-- Opciones para el estado de la tarea -->
                        <option value="SinIniciar">Sin Iniciar</option>
                        <option value="Iniciado">Iniciado</option>
                        <option value="Terminado">Terminado</option>
                    </select>
                    <br>
                </div>

                <div class="mb-3">
                    <label>Fecha :</label><br>
                    <input type="date" name="fecha" required class="form-control"><br>
                </div>

                <div class="mb-3">
                    <label class="form-label">Prioridad</label>
                    <select name="prioridad" class="form-select">
                        <option value="Baja">Baja</option>
                        <option value="Media">Media</option>
                        <option value="Alta">Alta</option>
                    </select>
                </div>
                <div class="mb-3">
                    <label class="form-label">Nota</label>
                    <textarea name="nota" class="form-control" required></textarea>
                </div>

                <button type="submit" class="btn btn-primary">Agregar</button>
                <!-- Cancelar el Registro-->
                <a href="index.php" class="btn btn-danger">Cancelar Registro</a>
            </form>
        </div>
    </div>

</body>

</html>
