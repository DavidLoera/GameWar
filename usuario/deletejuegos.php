<?php
require '../config/database.php';
$objeto = new Conexion();
$conexion = $objeto->Conectarse();

$id = $_GET['id_juego'];
$sql = 'DELETE FROM juegos WHERE id_juego=:id_juego';
$statement = $conexion->prepare($sql);
if ($statement->execute([':id_juego' => $id])) {
  header("Location: ../usuario/index.php");
}