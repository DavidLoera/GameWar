<?php include("../config/auth.php")?>

<!DOCTYPE html>
<html lang="es">
<title>GameWar | Editar juego</title>
<head>
<?php include("../include/user/head.php")?>
</head>
<body>
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

  $id = $_GET['id_juego'];
  
  $sqlid ='SELECT  id_juego, b.id_desarrolladores, c.id_categorias,nombre, descripcion, link, descripcion, c.nombre_categorias, b.nombre_desarrollador, d.username
  FROM juegos as a, desarrolladores as b, categoria as c, usuarios as d 
  WHERE a.id_desarrolladores=b.id_desarrolladores and a.id_categorias=c.id_categorias and a.id_usuario=d.id_usuario and id_juego=:id_juego';
 $statementid = $conexion->prepare($sqlid);
 $statementid->execute([':id_juego' => $id ]);
 $categoria= $statementid->fetch(PDO::FETCH_OBJ);

  // SQL Para las desarolladores
$sql = 'SELECT * FROM categoria WHERE activo_categorias = 1';
$statement = $conexion->prepare($sql);
$statement->execute();
$desarolladores= $statement->fetchAll(PDO::FETCH_OBJ);

// SQL Para las marcas de los categorias
$sql2 = 'SELECT * FROM desarrolladores WHERE estatus_desarrollador = 1';
$statement2 = $conexion->prepare($sql2);
$statement2->execute();
$marcas = $statement2->fetchAll(PDO::FETCH_OBJ);


if (isset ($_POST['name']) && isset($_POST['desarolladorStatus']) && isset($_POST['categoriaStatus']) && isset($_POST['mensaje']) && isset($_POST['link']) && isset($_POST['usuario'])) {
    $name = $_POST['name'];
    $desarolladores = $_POST['desarolladorStatus'];
    $categoria = $_POST['categoriaStatus'];
    $mensaje= $_POST['mensaje'];
    $link = $_POST['link'];
    $usuario = $_POST['usuario'];
    
    $sql3 = 'UPDATE juegos SET id_usuario=:usuario, id_desarrolladores=:desarollador, id_categorias=:categoria, nombre=:nombre, descripcion=:descripcion, link=:link WHERE id_juego=:id_juego';
    $statement3 = $conexion->prepare($sql3);
    if ($statement3->execute([':usuario' => $usuario, ':desarollador' => $desarolladores, ':categoria' => $categoria, ':nombre' => $name, ':descripcion' => $mensaje, ':link' => $link, ':id_juego' => $id])) {
      header("Location: ../usuario/index.php");
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
  var mensaje = document.getElementById('mensaje').value;
  if(mensaje.length == 0) {
    alert('No has escrito nada en la descripción');
    return;
  }
  var link = document.getElementById('link').value;
  if(link.length == 0) {
    alert('No has escrito un link');
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

<div class="tutorial"><h2>Editar juegos</h2>
<ul class="breadcrumb">
  <h5>
    <li>
      <a href="../index.php">GameWar</a>
    </li>
    <li>
      <a href="index.php">Administrador</a>
    </li>
    <li>
      <a href="editjuegos.php"> Editar juego</a>
    </li>
  </h5>
</ul>
</div>

<div class="contact_form">
    <div class="formulario">      
      <h1>Editar juego</h1>
          <form method="post" id="formulario">       
                <p>
                  <label for="nombre" class="colocar_nombre">Escribe a el juego
                    <span class="obligatorio">*</span>
                  </label>
                    <input type="text" name="name" id="username" value="<?=$categoria->nombre;?>">
                </p>
                <p>
                    <label class="colocar_nombre">Desarollador: </label>
				    <select class="txt9" name="desarolladorStatus" required >
                    <option value="<?php echo $categoria->id_desarrolladores ?>">Seleccionado: <?php echo $categoria->nombre_desarrollador?></option>
                    <?php foreach($marcas as $marc): ?>
				    <option value="<?= $marc->id_desarrolladores; ?>"><?= $marc->nombre_desarrollador; ?></option>
					<?php endforeach; ?>
				    </select>  
                </p>
                <p>
                    <label class="colocar_nombre">Categoría: </label>
				    <select class="txt9" name="categoriaStatus" required >
                    <option value="<?php echo $categoria->id_categorias ?>">Seleccionado: <?php echo $categoria->nombre_categorias?></option>
                    <?php foreach($desarolladores as $des): ?>
				    <option value="<?= $des->id_categorias; ?>"><?= $des->nombre_categorias; ?></option>
					<?php endforeach; ?>
				    </select>  
                </p>
                <p>
                  <label for="mensaje" class="colocar_mensaje">Descripción
                    <span class="obligatorio">*</span>
                  </label>                     
                    <textarea name="mensaje" class="texto_mensaje" id="mensaje" value=""><?=$categoria->descripcion;?></textarea> 
                </p>
                <p>
                  <label for="nombre" class="colocar_nombre">Escribe el link
                    <span class="obligatorio">*</span>
                  </label>
                    <input type="text" name="link" id="link" value="<?=$categoria->link;?>">
                </p>           
                <input name="usuario" type="hidden" value="<?=$auth->id_usuario;?>">         
                <button type="submit"><p>Enviar</p></button>     
          </form>
    </div>  
  </div>

<?php include("include/footer.php")?>

</body>
</html>