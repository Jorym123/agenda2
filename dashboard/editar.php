<?php
require_once("../clases/agenda.php");
require_once("../conexion.php");
require_once('../autenticacion.php');

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    $sql = "SELECT * FROM agenda WHERE id = ?";
    $stmt = mysqli_prepare($conexion, $sql);
    mysqli_stmt_bind_param($stmt, "i", $id);
    mysqli_stmt_execute($stmt);
    $resultado = mysqli_stmt_get_result($stmt);
    $dataAgenda = mysqli_fetch_assoc($resultado);
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id = $_POST['id'];
    $tarea = $_POST['tarea'];
    $estado = $_POST['estado'];
    $fecha = $_POST['fecha'];
    $prioridad = $_POST['prioridad'];
    $nota = $_POST['nota'];

    $agenda = new Agenda($conexion);

    $agenda->editarAgenda($id, $tarea, $estado, $fecha, $prioridad, $nota);

    header("Location: index.php");
    exit();
}
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
    <div class="container d-flex justify-content-center align-items-center vh-10">
        <div class="card p-4 w-50">
            <h2 class="text-center">Editar Agenda</h2>
            <form method="POST">
                <div class="mb-3">
                    <input type="hidden" name="id" value="<?php echo $dataAgenda['id']; ?>">
                </div>
                <div class="mb-3">
                    <label class="form-label"></i>Estado</label>
                    <input type="text" name="tarea" value="<?php echo $dataAgenda['tarea']; ?>" required><br>
                </div>

                <div class="mb-3">
                    <label class="form-label">Estado</label>
                    <select name="estado">
                        <option value="SinIniciar" <?php echo $dataAgenda['estado'] === 'SinIniciar' ? 'selected' : ''; ?>>Sin Iniciar</option>
                        <option value="Iniciado" <?php echo $dataAgenda['estado'] === 'Iniciado' ? 'selected' : ''; ?>>Iniciado</option>
                        <option value="Terminado" <?php echo $dataAgenda['estado'] === 'Terminado' ? 'selected' : ''; ?>>Terminado</option>
                    </select><br><br>
                </div>


                <div class="mb-3">
                    <label class="form-label">Fecha</label>
                    <input type="date" name="fecha" value="<?php echo $dataAgenda['fecha']; ?>" required><br>
                </div>

                <div class="mb-3">
                    <label class="form-label">prioridad</label>
                    <select name="prioridad">
                        <option value="Baja" <?php echo $dataAgenda['estado'] === 'Baja' ? 'selected' : ''; ?>>Baja</option>
                        <option value="Media" <?php echo $dataAgenda['estado'] === 'Media' ? 'selected' : ''; ?>>Media</option>
                        <option value="Alta" <?php echo $dataAgenda['estado'] === 'ALta' ? 'selected' : ''; ?>>Alta</option>
                    </select><br><br>
                </div>

                <div class="mb-3">
                    <label class="form-label">Notas</label>
                    <textarea name="nota" name="nota">
                        <?php echo $dataAgenda['nota']; ?>
                    </textarea>
                </div>
                <button type="submit" class="btn btn-primary">Actualizar</button>
                <a href="index.php"  class="btn btn-danger">Cancelar Registro</a>
            </form>
        </div>
    </div>

</body>

</html>