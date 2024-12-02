<?php
#conexion sql 
class Usuario{
    public $nombre, $email, $password;
    public $conexion;
    public function __construct($conexion)
    {
        $this->conexion = $conexion;
    }
    //metodo de registro
    public function registrarUsuario($nombre, $email, $password)
    {
        $hashed_password = password_hash($password, PASSWORD_DEFAULT);
        $sql="INSERT INTO `usuarios`(`nombre`, `email`, `password`) VALUES ('$nombre','$email','$hashed_password')";
        if(mysqli_query($this->conexion, $sql)){
            return "usuario registrado correctamente";
        } else{
            return "Error al registrar el usuario". mysqli_error($this->conexion);
        }
    }
}