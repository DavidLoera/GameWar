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
  var asunto = document.getElementById('asunto').value;
  if (asunto.length == 0) {
    alert('Tu asunto esta vacio');
    return;
  }
  if(asunto.length >=1 && asunto.length<=6){
    alert('Tu asunto es muy corto');
    return;
  }
  var mensaje = document.getElementById('mensaje').value;
  if(mensaje.length == 0){
    alert('Tu mensaje esta vacio');
    return;
  }
  if(mensaje.length < 15){
    alert('Tu mensaje es corto');
    return;
  }
  this.submit();
}
</script>
</head>
<body>
<?php include("include/header.php")?><br><br><br>
<div class="tutorial"><h2>Contáctanos</h2>
<ul class="breadcrumb">
  <h5>
    <li>
      <a href="index.php">GameWar</a>
    </li>
    <li>
      <a href="contact.php"> Contact</a>
    </li>
  </h5>
</ul>
</div>
<div class="contact_form">
    <div class="formulario">      
      <h1>Formulario de contacto</h1>
        <h3>Escríbenos si existe algún problema</h3>
          <form name="formularioContacto" action="" method="get" id="formulario">       
                <p>
                  <label for="nombre" class="colocar_nombre">Username
                    <span class="obligatorio">*</span>
                  </label>
                    <input type="text" name="username" id="username" placeholder="Escribe tu Username">
                </p>
                <p>
                  <label for="email" class="colocar_nombre">Email
                    <span class="obligatorio">*</span>
                  </label>
                    <input type="text" name="email" id="email"  placeholder="Escribe tu Email" require>
                </p>   
                <p>
                  <label for="asunto" class="colocar_asunto">Asunto
                    <span class="obligatorio">*</span>
                  </label>
                    <input type="text" name="asunto" id="asunto"  placeholder="Escribe un asunto">
                </p>    
                <p>
                  <label for="mensaje" class="colocar_mensaje">Mensaje
                    <span class="obligatorio">*</span>
                  </label>                     
                    <textarea name="mensaje" class="texto_mensaje" id="mensaje" placeholder="Deja aquí tu comentario..."></textarea> 
                </p>                    
                <button type="submit" name="enviar_formulario" id="enviar"><p>Enviar</p></button>     
          </form>
    </div>  
  </div>

<?php include("include/footer.php")?>

</body>
</html>