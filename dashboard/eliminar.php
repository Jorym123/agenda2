<?php
require_once("../conexion.php");
require_once("../clases/agenda.php");

// Verifica si la variable 'id' existe en la URL
if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Crea una instancia de la clase Agenda utilizando la conexión a la base de datos
    $agenda = new Agenda($conexion);

    $agenda->eliminarAgenda($id);
    header("Location: index.php"); 
}
?>
