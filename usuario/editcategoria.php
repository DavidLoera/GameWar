<?php include("../config/auth.php")?>

<!DOCTYPE html>
<html lang="es">
<title>GameWar | Editar categoría</title>
<head>
<?php include("../include/user/head.php")?>
</head>
<body>
<?php

require '../config/database.php';
$objeto = new Conexion();
$conexion = $objeto->Conectarse();

$id = $_GET['id_categorias'];
$sql = 'SELECT * FROM categoria WHERE id_categorias=:id_categorias';
$statement = $conexion->prepare($sql);
$statement->execute([':id_categorias' => $id ]);
$categorias = $statement->fetch(PDO::FETCH_OBJ);

if (isset ($_POST['name'])  && isset($_POST['categoriaStatus']) ) {
	$name = $_POST['name'];
	$estado = $_POST['categoriaStatus'];
	$sql = 'UPDATE categoria SET nombre_categorias=:name, activo_categorias=:categoriaStatus WHERE id_categorias=:id_categorias';
	$statement = $conexion->prepare($sql);
	if ($statement->execute([':name' => $name, ':categoriaStatus' => $estado, ':id_categorias' => $id])) {
	  header("Location: ../usuario/categoria.php");
	}
  
  }
  
  ?>

<script type="text/javascript">
  document.addEventListener("DOMContentLoaded", function() {
  document.getElementById("formulario").addEventListener('submit', validarFormulario); 
});

function validarFormulario(evento) {
  evento.preventDefault();
  var usuario = document.getElementById('username').value;
  if(usuario.length == 0) {
    alert('No has escrito nada en la categoría');
    return;
  }
  this.submit();
}
</script>

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
        <li><a href="categoria.php"><i class="fas fa-plus"></i> Añadir Genero</a></li>  
        <li><a href="desarrollador.php"><i class="fas fa-address-card"></i> Añadir desarrollador</a></li>
        <li><a href="../config/logout.php"><i class="fas fa-sign-out-alt"></i> Cerrar sesión</a></li>
      </ul>
      <label for="menu-btn" class="btn menu-btn"><i class="fas fa-bars"></i></label>
    </div>
  </nav><br><br><br><br>

<div class="tutorial"><h2>Editar categoría</h2>
<ul class="breadcrumb">
  <h5>
    <li>
      <a href="../index.php">GameWar</a>
    </li>
    <li>
      <a href="index.php">Administrador</a>
    </li>
    <li>
      <a href="categoria.php"> Añadir categoría</a>
    </li>
  </h5>
</ul>
</div>

<div class="contact_form">
    <div class="formulario">      
      <h1>Editar categoría</h1>
    
          <form method="post" id="formulario">       
                <p>
                  <label for="nombre" class="colocar_nombre">Escribe la categoría
                    <span class="obligatorio">*</span>
                  </label>
                    <input type="text" name="name" id="username" value="<?= $categorias->nombre_categorias; ?>">
                </p>
                <p>
					<label class="colocar_nombre">Estado: </label>
				    <select class="txt9" name="categoriaStatus" required >
				      	<option  value="<?php echo  $categorias-> activo_categorias?>"><?php if( $categorias->activo_categorias == 1){echo 'Esta como: Disponible';}else{echo 'Esta como: No disponible';}?></option>
				      	<option value="1">Disponible</option>
				      	<option value="2">No disponible</option>
				    </select>  
                </p>                     
                <button type="submit"><p>Enviar</p></button>     
          </form>
    </div>  
  </div>

<?php include("include/footer.php")?>

</body>
</html>