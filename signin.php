<?php 
	session_start();
	if (isset($_SESSION['nombre'])) {
		header('Location: usuario/index.php');
	}
?>

<!DOCTYPE html>
<html lang="es">
<title>GameWar | Iniciar sesión</title>
<head>
<?php include("include/head.php")?>
<script type="text/javascript">
  document.addEventListener("DOMContentLoaded", function() {
  document.getElementById("formulario").addEventListener('submit', validarFormulario); 
});

function validarFormulario(evento) {
  evento.preventDefault();
  var usuario = document.getElementById('username').value;
  if(usuario.length == 0) {
    alert('No has escrito nada en el usuario');
    return;
  }
  var clave = document.getElementById('pass').value;
  if (clave.length == 0) {
    alert('No ha escrito la contraseña');
    return;
  }
  this.submit();
}
</script>
</head>
<body>
<?php include("include/header.php")?><br><br><br>
<div class="tutorial"><h2>Iniciar sesión</h2>
<ul class="breadcrumb">
  <h5>
    <li>
      <a href="index.php">GameWar</a>
    </li>
    <li>
      <a href="signin.php"> Sign In</a>
    </li>
  </h5>
</ul>
</div>

<?php

//Verificacion si el usuario sigue conectado a la aplicacion

session_start();
if($_SESSION["s_usuario"] == null):

?>

<div align="center"><div class="circulo"><div class="iniciar"><img src="public/img/index2.png" alt="GameWar"></div></div></div>
<div class="contact_form">
    <div class="formulario">      
      <h1>Inicia sesión</h1>
        <h3>Es hora de demostrar tu lado Gamer</h3>
          <form method="POST" action="config/loginProceso.php" id="formulario">       
                <p>
                  <label for="nombre" class="colocar_nombre">Username
                    <span class="obligatorio">*</span>
                  </label>
                    <input type="text" name="username" id="username" placeholder="Escribe tu Username">
                </p>
                <p>
                  <label for="nombre" class="colocar_nombre">Password
                    <span class="obligatorio">*</span>
                  </label>
                    <input type="password" name="pass" id="pass" placeholder="Escribe tu clave">
                </p>                         
                <button type="submit" name="enviar_formulario" onclick="validarFormulario();" id="enviar"><p>Iniciar sesión</p></button>     
          </form>
    </div>  
  </div>
  <?php else: 
	
	session_start();

	?>

<div align="center"><div class="circulo"><div class="iniciar"><img src="public/img/index2.png" alt="GameWar"></div></div></div>
<div class="contact_form">
    <div class="formulario">      
      <h1>Inicia sesión</h1>
        <h3>Usted ya está dentro😄</h3>
          <form method="">       
                <div class="auth">
                <a href="usuario/index.php"><p>Entrar ahora</p></a>
                </div><br>
                <div align="center"><p>ó</p></div><br>
                <div class="auth">
                <a href="config/logout.php"><p>Cierra sesión</p></a>
                </div> 
          </form>
    </div>  
  </div>

  <?php endif ?>
</body>
</html>