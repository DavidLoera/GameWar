<!DOCTYPE html>
<html lang="es">
<title>GameWar | Registrate</title>
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
  var email = document.getElementById('email').value;
  if (email.length == 0) {
    alert('El correo esta vacio');
    return;
  }
  var clave = document.getElementById('pass').value;
  if (clave.length < 6) {
    alert('La clave tiene que tener al menos 6 caracteres');
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
      <a href="register.php"> Register</a>
    </li>
  </h5>
</ul>
</div>
<div align="center"><div class="circulo"><div class="iniciar"><img src="public/img/index2.png" alt="GameWar"></div></div></div>
<div class="contact_form">
    <div class="formulario">      
      <h1>Registrate</h1>
        <h3>Unete a la comunidad de gamers</h3>
          <form action="" method="get" id="formulario">       
                <p>
                  <label for="nombre" class="colocar_nombre">Username
                    <span class="obligatorio">*</span>
                  </label>
                    <input type="text" name="username" id="username" placeholder="Escribe tu Username">
                </p>
                <p>
                  <label for="nombre" class="colocar_nombre">Correo
                    <span class="obligatorio">*</span>
                  </label>
                    <input type="email" name="email" id="email" placeholder="Escribe tu correo" require>
                </p>    
                <p>
                  <label for="nombre" class="colocar_nombre">Password
                    <span class="obligatorio">*</span>
                  </label>
                    <input type="password" name="pass" id="pass" placeholder="Escribe tu clave">
                </p>  
                <button type="submit" name="enviar_formulario" id="enviar"><p>Registrarse</p></button>     
          </form>
    </div>  
  </div>
</body>
</html>