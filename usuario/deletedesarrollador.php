<?php
require '../config/database.php';
$objeto = new Conexion();
$conexion = $objeto->Conectarse();

$id = $_GET['id_desarrolladores'];
$sql = 'DELETE FROM desarrolladores WHERE id_desarrolladores=:id_desarrolladores';
$statement = $conexion->prepare($sql);
if ($statement->execute([':id_desarrolladores' => $id])) {
  header("Location: ../usuario/desarrollador.php");
}