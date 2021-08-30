<?php



//Verificacion si el usuario sigue conectado a la aplicacion

session_start();
if($_SESSION["s_usuario"] == null):



?>

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
                  <li><a href="faq.php">FAQ</a></li>
                  <li><a href="mapa.php">Mapa de sitio</a></li>
                </ul>
              <div>
          </div>
        </li>
        <li><a onclick="funcion7()"><i class="fas fa-address-card"></i> Contáctanos</a></li>
        <li><a onclick="funcion3()"><i class="fas fa-address-book"></i> Acerca de</a></li>
        <li><a onclick="funcion4()"><i class="fas fa-user"></i> Registrate</a></li>
        <div class="signin">
        <li><a onclick="funcion5()"><i class="fas fa-sign-in-alt"></i> Iniciar sesion</a></li>
        </div>
      </ul>
      <label for="menu-btn" class="btn menu-btn"><i class="fas fa-bars"></i></label>
    </div>
  </nav><br><br><br><br>

  <?php else: 
	
	session_start();
  require '../config/database.php';
  $objeto = new Conexion();
  $conexion = $objeto->Conectarse();

  $sql = 'SELECT * FROM desarrolladores';
  $statement = $conexion->prepare($sql);
  $statement->execute();
  $categorias = $statement->fetchAll(PDO::FETCH_OBJ);
  
  //SQL Autentificacion Administrador
  $usuario2 = $_SESSION["s_usuario"];
  $sqlauth= "SELECT id_usuario from usuarios WHERE username = '$usuario2' or email = '$usuario2'";
  $statementauth = $conexion->prepare($sqlauth);
  $statementauth->execute();
  $auth= $statementauth->fetch(PDO::FETCH_OBJ);

  ?>
  
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
            <?php foreach($categorias as $cate): ?>
              <li><a href="../games"><?= $cate->nombre_desarrollador; ?></a></li>
              <?php endforeach; ?>
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
                  <li><a href="faq.php">FAQ</a></li>
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


  <?php endif ?>