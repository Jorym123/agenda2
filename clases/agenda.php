<?php
class Agenda {
   // Definición de las propiedades de la clase Agenda
   public $tarea, $estado, $fecha, $prioridad, $nota;
   public $conexion;

   public function __construct($conexion) {
      $this->conexion = $conexion;
   }

   public function insertarAgenda($tarea, $estado, $fecha, $prioridad, $nota) {
      $sql = "INSERT INTO agenda(tarea, estado, fecha, prioridad, nota) VALUES(?,?,?,?,?)";

      $stmt = mysqli_prepare($this->conexion, $sql);

      // Vincula los parámetros de la consulta SQL a las variables de PHP
      mysqli_stmt_bind_param($stmt, 'sssss', $tarea, $estado, $fecha, $prioridad, $nota);

      if (mysqli_stmt_execute($stmt)) {
         echo "Agenda insertada correctamente";
      } else {
         echo "Error al insertar los datos";
      }

      // Cierra la consulta preparada
      mysqli_stmt_close($stmt);
      //"statement" (en inglés, "declaración" o "sentencia"
   }

   // editar una tarea existente en la agenda
   public function editarAgenda($id, $tarea, $estado, $fecha, $prioridad, $nota) {
      // actualizar una tarea existente
      $sql = "UPDATE agenda SET tarea = ?, estado = ?, fecha = ?, prioridad = ?, nota = ? WHERE id = ?";
      $stmt = mysqli_prepare($this->conexion, $sql);

      // Vincula los parámetros de la consulta SQL a las variables de PHP
      mysqli_stmt_bind_param($stmt, 'sssssi', $tarea, $estado, $fecha, $prioridad, $nota, $id);

      // Ejecuta la consulta y muestra un mensaje si fue exitosa o no
      if (mysqli_stmt_execute($stmt)) {
         echo "Agenda actualizada correctamente";
      } else {
         echo "Error al actualizar la agenda: " . mysqli_error($this->conexion);
      }

      // Cierra la consulta preparada
      mysqli_stmt_close($stmt);
   }

   function eliminarAgenda($id) {
      $sql = "DELETE FROM agenda WHERE id = ?";
      $stmt = mysqli_prepare($this->conexion, $sql);
      mysqli_stmt_bind_param($stmt, "i", $id);

      // Ejecuta la consulta y muestra un mensaje si fue exitosa o no
      if (mysqli_stmt_execute($stmt)) {
         echo "Datos eliminados correctamente.";
      } else {
         echo "Error al eliminar los datos: " . mysqli_error($this->conexion);
      }
      mysqli_stmt_close($stmt);
   }
}
?>
