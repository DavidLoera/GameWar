
<!DOCTYPE html>
<html lang="es">
<title>GameWar | Juegos</title>
<head>
<?php include("include/head.php")?>
</head>
<body>
<?php include("include/header.php")?><br>
</div>
<div>
<?php if(($_SESSION["s_usuario"]) == false): ?>
<div class="restrict"> 
<div id="notfound">
		<div class="notfound">
			<div class="notfound-404">
			
				<br><h1><span>I</span><span>N</span><span>I</span><span>C</span><span>I</span><span>A</span></h1>
			</div>
			<h2>Lo sentimos. debes de Iniciar sesión para ver todo el contenido :( </h2><a href="signin.php">clic aquí :D</a>
		</div>
	</div>
</div>
<?php else:?>
	<br><br>
<div class="tutorial"><h2>Juegos añadidos</h2>
<ul class="breadcrumb">
  <h5>
    <li>
      <a href="../../index.php">GameWar</a>
    </li>
    <li>
    <a href="../../create.php">Juegos</a>
    </li>
  </h5>
</ul>
</div><br>

<?php

$sqluser ='SELECT  id_juego, nombre, descripcion, link, descripcion, c.nombre_categorias, b.nombre_desarrollador, d.username
FROM juegos as a, desarrolladores as b, categoria as c, usuarios as d 
WHERE a.id_desarrolladores=b.id_desarrolladores and a.id_categorias=c.id_categorias and a.id_usuario=d.id_usuario';
   
  $statementuser = $conexion->prepare($sqluser);
  $statementuser->execute();
  $categoriasuser = $statementuser->fetchAll(PDO::FETCH_OBJ);
  
?>
<?php foreach($categoriasuser as $cate): ?>
<div class="tutorial4"><h2><?= $cate->nombre; ?></h2>
<p>Desarrollador: <?= $cate->nombre_desarrollador; ?></p><br>

</div>
<div class="tutorial5">
	<p>Categoría: <?= $cate->nombre_categorias; ?></p>
	<p>Descripcion: <?= $cate->descripcion; ?></p>
	
	<p>Ve a esta página para descargar, <a href="<?= $cate->link; ?>">Clic aqui</a></p>
	
</div>
<?php endforeach; ?>
<?php endif;?>

</div>
</body>
</html>