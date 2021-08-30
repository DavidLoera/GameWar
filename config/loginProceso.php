
<?php

//Verficar usuario o email y la contrasena del sistema

session_start();

include_once 'database.php';
$objeto = new Conexion();
$conexion = $objeto->Conectarse();

//recepción de datos enviados mediante POST 
$usuario = $_POST['username'];
$password = $_POST['pass'];

$pass = md5($password); //encripto la clave enviada por el usuario para compararla con la clava encriptada y almacenada en la BD

$consulta = "SELECT * FROM usuarios WHERE username='$usuario' AND password='$pass'";
$resultado = $conexion->prepare($consulta);
$resultado->execute();

if($resultado->rowCount() >= 1){
    $data = $resultado->fetchAll(PDO::FETCH_ASSOC);
	$_SESSION["s_usuario"] = $usuario;
	header('Location: ../usuario/index.php');
}else{

    $_SESSION["s_usuario"] = null;
}

$conexion=null;

?>