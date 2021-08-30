<?php include("../config/auth.php")?>
<?php

  require '../config/database.php';
  $objeto = new Conexion();
  $conexion = $objeto->Conectarse();
  
  //SQL Autentificacion Administrador
  $usuario2 = $_SESSION["s_usuario"];
  $sqlauth= "SELECT id_usuario from usuarios WHERE username = '$usuario2' or email = '$usuario2'";
  $statementauth = $conexion->prepare($sqlauth);
  $statementauth->execute();
  $auth= $statementauth->fetch(PDO::FETCH_OBJ);

  $sql = 'SELECT * FROM categoria';
  $statement = $conexion->prepare($sql);
  $statement->execute();
  $categorias = $statement->fetchAll(PDO::FETCH_OBJ);

if (isset ($_POST['delete_id'])) {
	// sql to delete a record
	$delete_id = $_POST['delete_id'];
	$sqldel = "DELETE FROM categorias WHERE id_categorias=:delete_id ";
	$statement2 = $conexion->prepare($sqldel);
	if ($statement2->execute([':delete_id' => $delete_id])) {
 	 header("Location: ../usuario/categorias.php");
	}
}
  ?>


<!DOCTYPE html>
<html lang="es">
<title>GameWar | Categoría</title>
<head>
<?php include("../include/user/head.php")?>
<link rel="stylesheet" type="text/css" href="../public/css/main3.css">
</head>
<body>

  <nav>
    <div class="wrapper">
    <img src="../public/img/index.png" alt="GameWar" height="60%">
      <input type="radio" name="slider" id="menu-btn">
      <input type="radio" name="slider" id="close-btn">
      <ul class="nav-links">
        <label for="close-btn" class="btn close-btn"><i class="fas fa-times"></i></label>
        <?php if(($auth-> id_usuario) == 1): ?>
          <li><a href="index.php"><i class="fas fa-gamepad"></i> Añadir juego</a></li>
        <?php endif ?>
        <li><a href="categoria.php"><i class="fas fa-plus"></i> Añadir Género</a></li>  
        <li><a href="desarrollador.php"><i class="fas fa-address-card"></i> Añadir desarrollador</a></li>
        <li><a href="../config/logout.php"><i class="fas fa-sign-out-alt"></i> Cerrar sesión</a></li>
      </ul>
      <label for="menu-btn" class="btn menu-btn"><i class="fas fa-bars"></i></label>
    </div>
  </nav><br><br><br><br>


<div class="tutorial"><h2>Añadir categoría</h2>
<ul class="breadcrumb">
  <h5>
    <li>
      <a href="../index.php">GameWar</a>
    </li>
    <li>
      <a href="categoria.php"> categoria</a>
    </li>
  </h5>
</ul>
</div>

<a class="txt7" href="addcategoria.php">Agregar categoría</a>
		<div class="container-table100">
			<div class="wrap-table100">	
				<div class="table100 ver2 m-b-110">
					<div class="table100-head">
						<table>
							<thead>
								<tr class="row100 head">
									<th class="cell100 column3">Categoría</th>
									<th class="cell100 column3">Estado</th>
									<th class='cell100 column3'>Opciones</th>
								</tr>
							</thead>
						</table>
					</div>

						<table>
							<tbody>
							<?php foreach($categorias as $cate): ?>
								<tr class="row100 head">
									<td class="cell100 column3"><?= $cate->nombre_categorias; ?></td>
									<td class="cell100 column3"> 
										<?php if(($cate -> activo_categorias) == 1){
											echo '<span class="success"> Disponible</span>';
										}else{
											echo '<span class="danger"> No disponible</span>';
										} ?> 
									</td>
										<td class='cell100 column3'>
                      <a style="font-family: 'Roboto', sans-serif; font-size: 15px; color: #fff; border-radius: 5px; width: 90px; height: 35px; background: #0788bb; display: flex; justify-content: center; align-items: center; text-decoration: none ; margin-bottom:12px; margin-right:12px;" 
                      href='editcategoria.php?id_categorias=<?=$cate->id_categorias;?>' >Editar </a>
                      <a style="font-family: 'Roboto', sans-serif; font-size: 15px; line-height: 1.5; color: #fff; border-radius: 5px; width: 90px; height: 35px; background: #c01919; display: flex; justify-content: center; align-items: center;text-decoration: none ;"  
                      href='deletecategoria.php?id_categorias=<?=$cate->id_categorias;?>' onclick="return confirm('¿Esta seguro de eliminar esto?');"> Borrar</a>
										</td>
								</tr>
                <?php endforeach; ?>
                
							</tbody>
						</table>
					</div>
					<center>
					<a class="txt6" href="addcategoria.php">Agregar categoría</a>
					</center>
				</div>
			</div>
		</div>
	</div>



</body>
</html>