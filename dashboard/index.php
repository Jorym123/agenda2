<?php
require_once("../conexion.php");
require_once('../autenticacion.php');
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
</head>

<body>
    <div>
        <div class="container-fluid">
            <div class="row">
                <div class="col-2 bd-light sidebar py-4">
                    <!--  Sidebar -->
                    <div class="text-center mb-4">
                        <h4>Agenda</h4>
                        <p>Bienvenido</p>
                    </div>
                    <nav class="nav flex-column">
                        <a class="btn btn-primary" href="nuevo.php">
                            <i class="bi bi-plus-circle-fill"></i>
                            Nueva agenda
                        </a><br>
                        <a class="btn btn-danger" href="../logout.php">
                            <i class="bi bi-box-arrow-right"></i>

                            cerrar Sesion
                        </a>
                    </nav>
                </div>
                <div class="col-10 py-4 px-4">
                    <!-- Contenido Principal -->
                    <table class="table table-striped table-bordered -table-hover ">
                        <thead>
                            <?php
                            $sql = "SELECT * FROM agenda";
                            $stmt = mysqli_prepare($conexion, $sql);
                            mysqli_stmt_execute($stmt);
                            $resultado = mysqli_stmt_get_result($stmt);

                            if (mysqli_num_rows($resultado)):
                            ?>
                                <tr>
                                    <th>ID</th>
                                    <th>TAREA</th>
                                    <th>ESTADO</th>
                                    <th>FECHA</th>
                                    <th>PRIORIDAD</th>
                                    <th>NOTA</th>
                                    <th>ACCIONES</th>
                                </tr>
                        </thead>
                        <tbody>
                            <?php
                                // Corrección del bucle

                                while ($fila = mysqli_fetch_assoc($resultado)): ?>
                                <tr>
                                    <td><?php echo $fila['id']; ?></td>
                                    <td><?php echo $fila['tarea']; ?></td>
                                    <td><?php echo $fila['estado']; ?></td>
                                    <td><?php echo $fila['fecha']; ?></td>
                                    <td><?php echo $fila['prioridad']; ?></td>
                                    <td><?php echo $fila['nota']; ?></td>
                                    <td>
                                        <a href="editar.php?id=<?php echo $fila['id']; ?>" class="btn btn-primary">Editar</a> |
                                        <a href="eliminar.php?id=<?php echo $fila['id']; ?>" onclick="return confirm('¿Estás seguro de eliminar la tarea?')" class="btn btn-danger">Eliminar</a>
                                    </td>
                                </tr>
                            <?php endwhile; ?>
                        <?php endif; ?>
                        </tbody>
                    </table>
                </div>
            </div>
</body>

</html>