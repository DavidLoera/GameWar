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


  $sql ='SELECT  id_juego, nombre, descripcion, link, descripcion, c.nombre_categorias, b.nombre_desarrollador, d.username
  FROM juegos as a, desarrolladores as b, categoria as c, usuarios as d 
  WHERE a.id_desarrolladores=b.id_desarrolladores and a.id_categorias=c.id_categorias and a.id_usuario=d.id_usuario';
     
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
<title>GameWar | Añadir juegos</title>
<head>
<?php include("../include/user/head.php")?>
<link rel="stylesheet" type="text/css" href="../public/css/main3.css">
</head>
<body>
<?php if(($auth-> id_usuario) == 1): ?>
  <nav>
    <div class="wrapper">
    <img src="../public/img/index.png" alt="GameWar" height="60%">
      <input type="radio" name="slider" id="menu-btn">
      <input type="radio" name="slider" id="close-btn">
      <ul class="nav-links">
        <label for="close-btn" class="btn close-btn"><i class="fas fa-times"></i></label>
       
          <li><a href="index.php"><i class="fas fa-gamepad"></i> Añadir juego</a></li>
   
        <li><a href="categoria.php"><i class="fas fa-plus"></i> Añadir Género</a></li>  
        <li><a href="desarrollador.php"><i class="fas fa-address-card"></i> Añadir desarrollador</a></li>
        <li><a href="../config/logout.php"><i class="fas fa-sign-out-alt"></i> Cerrar sesión</a></li>
      </ul>
      <label for="menu-btn" class="btn menu-btn"><i class="fas fa-bars"></i></label>
    </div>
  </nav><br><br><br><br>
  <?php else: ?>

    <nav>
    <div class="wrapper">
    <img src="../public/img/index.png" alt="GameWar" height="60%">
      <input type="radio" name="slider" id="menu-btn">
      <input type="radio" name="slider" id="close-btn">
      <ul class="nav-links">
        <label for="close-btn" class="btn close-btn"><i class="fas fa-times"></i></label>
        <li><a onclick="funcion6()"><i class="fas fa-home"></i> Inicio</a></li>
        <li>
          <a onclick="funcion()" class="desktop-item"><i class="fas fa-gamepad"></i> Juegos</a>
          <input type="checkbox" id="showDrop">
          <label for="showDrop" class="mobile-item"><i class="fas fa-gamepad"></i> Juegos</label>
          <ul class="drop-menu">
            <li><a href="#">SKYDROW</a></li>
            <li><a href="#">CODEX</a></li>
            <li><a href="#">VREX</a></li>
            <li><a href="#">RELOADED</a></li>
            <li><a href="#">FLTDOX</a></li>
            <li><a href="#">RAZORDOX</a></li>
            <li><a href="#">PLAZA</a></li>
            <li><a href="#">BAT</a></li>
            <li><a href="#">GOG</a></li>
            <li><a href="#">ANOMALY</a></li>
            <li><a href="#">HHT</a></li>
            <li><a href="#">P2P</a></li>
          </ul>
        </li>
        <li>
          <a onclick="funcion2()" class="desktop-item"><i class="fas fa-users"></i> Tutoriales y más...</a>
          <input type="checkbox" id="showMega">
          <label for="showMega" class="mobile-item"><i class="fas fa-users"></i> Tutoriales y más...</label>
          <div class="mega-box">
            <div class="content">
                 
              <div class="row">
                <header>Tutoriales</header>
                <ul class="mega-links">
                  <li><a href="torrent.php">¿Como descargar Utorrent?</a></li>
                  <li><a href="download.php">¿Como descargar Un juego?</a></li>
                  <li><a href="update.php">¿Como actualizar un juego?</a></li>
                  <li><a href="extract.php">¿Como extraer la actualizacion de un juego?</a></li>
                  <li><a href="bypass.php">¿Como evitar el limite de descarga?</a></li>
                </ul>
              </div>

              <div class="row">
                <header>Ayuda</header>
                <ul class="mega-links">
                  <li><a href="../updatemore/faq.php">FAQ</a></li>
                  <li><a href="../mapa.php">Mapa de sitio</a></li>
                </ul>
              <div>
          </div>
        </li>
        <li><a onclick="funcion7()"><i class="fas fa-address-card"></i> Contáctanos</a></li>
        <li><a onclick="funcion3()"><i class="fas fa-address-book"></i> Acerca de</a></li>
        <?php if(($auth-> id_usuario) == 1): ?>
          <li><a href="../usuario/index.php"><i class="fas fa-address-card"></i> Añadir</a></li>
        <?php endif ?>
        <li><a href="../config/logout.php"><i class="fas fa-sign-out-alt"></i> Cerrar sesión</a></li>
      </ul>
      <label for="menu-btn" class="btn menu-btn"><i class="fas fa-bars"></i></label>
    </div>
  </nav><br><br><br><br>

    <?php endif; ?>
<?php if(($auth-> id_usuario) == 1): ?>
<div class="tutorial"><h2>Añadir juegos</h2>
<ul class="breadcrumb">
  <h5>
    <li>
      <a href="../index.php">GameWar</a>
    </li>
    <li>
      <a href="index.php"> Añadir juegos</a>
    </li>
  </h5>
</ul>
</div>

<a class="txt7" href="addjuegos.php">Agregar juegos</a>
		<div class="container-table100">
			<div class="wrap-table100">	
				<div class="table100 ver2 m-b-110">
					<div class="table100-head">
						<table>
							<thead>
								<tr class="row100 head">
									<th class="cell100 column1">Nombre del juego</th>
									<th class="cell100 column1">Desarrollador</th>
                  <th class='cell100 column1'>Categoría</th>
                  <th class='cell100 column1'>Descripcion</th>
                  <th class='cell100 column1'>Link</th>
                  <th class='cell100 column1'>Opciones</th>
								</tr>
							</thead>
						</table>
					</div>

						<table>
							<tbody>
							<?php foreach($categorias as $cate): ?>
								<tr class="row100 body">
                  <td class='cell100 column1'><?= $cate->nombre; ?></td>
                  <td class='cell100 column1'><?= $cate->nombre_desarrollador; ?></td>
                  <td class='cell100 column1'><?= $cate->nombre_categorias; ?></td>
                  <td class='cell100 column1'><?= $cate->descripcion; ?></td>
                  <td class='cell100 column1'><a style=" color: white; text-decoration:none; " href="<?= $cate->link; ?>">Ir</a></td>
										<td class='cell100 column1'>
                      <a style="font-family: 'Roboto', sans-serif; font-size: 15px; color: #fff; border-radius: 5px; width: 90px; height: 35px; background: #0788bb; display: flex; justify-content: center; align-items: center; text-decoration: none ; margin-bottom:12px; margin-right:12px;" 
                      href='editjuegos.php?id_juego=<?=$cate->id_juego;?>' >Editar </a>
                      <a style="font-family: 'Roboto', sans-serif; font-size: 15px; line-height: 1.5; color: #fff; border-radius: 5px; width: 90px; height: 35px; background: #c01919; display: flex; justify-content: center; align-items: center;text-decoration: none ;"  
                      href='deletejuegos.php?id_juego=<?=$cate->id_juego;?>' onclick="return confirm('¿Esta seguro de eliminar esto?');"> Borrar</a>
										</td>
								</tr>
                <?php endforeach; ?>
                
							</tbody>
						</table>
					</div>
					<center>
					<a class="txt6" href="addjuegos.php">Agregar juegos</a>
					</center>
				</div>
			</div>
		</div>
	</div>
  <?php else: ?>

    <div class="contact_form">
    <div class="formulario">      
      <h1>Bienvenido</h1>
        <h3>Ya puedes acceder al menu de juegos 😄</h3>
          <form method="">       
                <div class="auth">
                <a href="../games.php"><p>Entrar ahora</p></a>
                </div><br>
                <div align="center"><p>ó</p></div><br>
                <div class="auth">
                <a href="config/logout.php"><p>Cierra sesión</p></a>
                </div> 
          </form>
    </div>  
  </div>

  <?php endif; ?>

</body>
</html>