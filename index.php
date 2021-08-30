<!DOCTYPE html>
<html lang="es">
<title>GameWar | Inicio</title>
<head>
<?php include("include/head.php")?>
</head>
<body class="homepage is-preload">
<?php include("include/header.php")?><br><br><br>
<div class="tutorial"><h2>GameWar</h2>
<ul class="breadcrumb">
  <h5>
    <li>
      <a href="index.php">GameWar</a>
    </li>
  </h5>
</ul>
</div>
<script>
  
  var imagen;

    if (window.XMLHttpRequest) { 
      imagen = new XMLHttpRequest();
    }
    else if (window.ActiveXObject) { 
      imagen = new ActiveXObject("Microsoft.XMLHTTP");
     }  
 
    function getData(dataSource, divID) {
     if(imagen) {
      var objeto = document.getElementById("nombres"); 
      imagen.open("GET", dataSource); 

      imagen.onreadystatechange = function(){
       if (imagen.readyState == 4 && imagen.status == 200){ 
        objeto.innerHTML = imagen.responseText; 
       }
      } 
      imagen.send(); 
     }
    }
  
</script>
<div class="index">
<!-- Page content -->
<div class="w3-content w3-padding" style="max-width:1564px">

  <!-- Project Section -->
  <div class="w3-container w3-padding-32" id="projects">
    <h3 class="w3-border-bottom w3-border-light-grey w3-padding-16">Desarrolladores TOPS</h3>
  </div>

  <div class="w3-row-padding">
    <div class="w3-col l3 m6 w3-margin-bottom">
      <div class="w3-display-container">
        <div class="w3-display-topleft w3-black w3-padding" >SKYDROW</div>
        <img src="public/img/img.jpg" alt="House" style="width:100%" onmousemove="getData('desarrolladores/Skydrow.txt', 'nombres')">
      </div>
    </div>
    <div class="w3-col l3 m6 w3-margin-bottom">
      <div class="w3-display-container">
        <div class="w3-display-topleft w3-black w3-padding">CODEX</div>
        <img src="public/img/img3.jpg" alt="House" style="width:100%" onmouseover="getData('desarrolladores/codex.txt', 'nombres')">
      </div>
    </div>
    <div class="w3-col l3 m6 w3-margin-bottom">
      <div class="w3-display-container">
        <div class="w3-display-topleft w3-black w3-padding">VREX</div>
        <img src="public/img/img4.jpg" alt="House" style="width:100%" onmouseover="getData('desarrolladores/vrex.txt', 'nombres')">
      </div>
    </div>
    <div class="w3-col l3 m6 w3-margin-bottom">
      <div class="w3-display-container">
        <div class="w3-display-topleft w3-black w3-padding">RELOADED</div>
        <img src="public/img/img5.jpg" alt="House" style="width:100%" onmouseover="getData('desarrolladores/reloaded.txt', 'nombres')">
      </div>
    </div>
  </div>
  <div class="w3-row-padding">
    <div class="w3-col l3 m6 w3-margin-bottom">
      <div class="w3-display-container">
        <div class="w3-display-topleft w3-black w3-padding">FLTDOX</div>
        <img src="public/img/img6.jpg" alt="House" style="width:99%" onmouseover="getData('desarrolladores/fltdox.txt', 'nombres')">
      </div>
    </div>
    <div class="w3-col l3 m6 w3-margin-bottom">
      <div class="w3-display-container">
        <div class="w3-display-topleft w3-black w3-padding">RAZORDOX</div>
        <img src="public/img/img7.jpg" alt="House" style="width:99%" onmouseover="getData('desarrolladores/razordox.txt', 'nombres')">
      </div>
    </div>
    <div class="w3-col l3 m6 w3-margin-bottom">
      <div class="w3-display-container">
        <div class="w3-display-topleft w3-black w3-padding">PLAZA</div>
        <img src="public/img/img8.jpg" alt="House" style="width:99%" onmouseover="getData('desarrolladores/plaza.txt', 'nombres')">
      </div>
    </div>
    <div class="w3-col l3 m6 w3-margin-bottom">
      <div class="w3-display-container">
        <div class="w3-display-topleft w3-black w3-padding">GOG</div>
        <img src="public/img/img9.jpg" alt="House" style="width:99% " onmouseover="getData('desarrolladores/gog.txt', 'nombres')">
      </div>
    </div>
  </div>
  <h2 style="padding-left:15px; color:white; text-decoration:none;" > Desarrollador: <div id="nombres">
    Selecciona tu desarrollador</div></h2>
<div></div>
  <!-- About Section -->
  <div class="w3-container w3-padding-32" id="about">
    <h3 class="w3-border-bottom w3-border-light-grey w3-padding-16">Novedades</h3>
    <br><p> Juegos premiados por la comunidad Gamer Latina
    </p>
  </div>
  <div class="w3-row-padding w3-grayscale">
    <div class="w3-col l3 m6 w3-margin-bottom">
      <img src="public/img/img1.jpeg" alt="John" style="width:100%">
      <h3>CyberPunk2077</h3>
      <p class="w3-opacity">Acción</p><br>
      <p>Phasellus eget enim eu lectus faucibus vestibulum. Suspendisse sodales pellentesque elementum.</p>
      <p><button class="w3-button w3-light-grey w3-block">Ver más</button></p>
    </div>
    <div class="w3-col l3 m6 w3-margin-bottom">
      <img src="public/img/imgg1.jpg" alt="John" style="width:99.8%">
      <h3>Hitman III</h3>
      <p class="w3-opacity">Acción</p><br>
      <p>Phasellus eget enim eu lectus faucibus vestibulum. Suspendisse sodales pellentesque elementum.</p>
      <p><button class="w3-button w3-light-grey w3-block">Ver más</button></p>
    </div> 
    <div class="w3-col l3 m6 w3-margin-bottom">
      <img src="public/img/imgg2.jpg" alt="John" style="width:98%">
      <h3>EURO TRUCK SIMULATOR 2</h3>
      <p class="w3-opacity">Aventura</p><br>
      <p>Phasellus eget enim eu lectus faucibus vestibulum. Suspendisse sodales pellentesque elementum.</p>
      <p><button class="w3-button w3-light-grey w3-block">Ver más</button></p>
    </div> 
    <div class="w3-col l3 m6 w3-margin-bottom">
      <img src="public/img/imgg3.jpeg" alt="John" style="width:98.2%">
      <h3>AMERICAN TRUCK SIMULATOR</h3>
      <p class="w3-opacity">Aventura</p><br>
      <p>Phasellus eget enim eu lectus faucibus vestibulum. Suspendisse sodales pellentesque elementum.</p>
      <p><button class="w3-button w3-light-grey w3-block">Ver más</button></p>
    </div> 
    <div class="w3-col l3 m6 w3-margin-bottom">
      <img src="public/img/imgg4.jpg" alt="John" style="width:98%">
      <h3>AGE OF EMPIRES III DEFINITIVE EDITION</h3>
      <p class="w3-opacity">Acción y aventura</p><br>
      <p>Phasellus eget enim eu lectus faucibus vestibulum. Suspendisse sodales pellentesque elementum.</p>
      <p><button class="w3-button w3-light-grey w3-block">Ver más</button></p>
    </div> 
    <div class="w3-col l3 m6 w3-margin-bottom">
      <img src="public/img/imgg6.jpg" alt="John" style="width:98%">
      <h3>ASTRONEER</h3>
      <p class="w3-opacity">Acción</p><br>
      <p>Phasellus eget enim eu lectus faucibus vestibulum. Suspendisse sodales pellentesque elementum.</p>
      <p><button class="w3-button w3-light-grey w3-block">Ver más</button></p>
    </div> 
    <div class="w3-col l3 m6 w3-margin-bottom">
      <img src="public/img/imgg5.jpg" alt="John" style="width:100%">
      <h3>HITMAN GO DEFINITIVE EDITION</h3>
      <p class="w3-opacity">Acción</p><br>
      <p>Phasellus eget enim eu lectus faucibus vestibulum. Suspendisse sodales pellentesque elementum.</p>
      <p><button class="w3-button w3-light-grey w3-block">Ver más</button></p>
    </div> 
    <div class="w3-col l3 m6 w3-margin-bottom">
      <img src="public/img/imgg7.jpg" alt="John" style="width:100%">
      <h3>HORIZON ZERO DAWN</h3>
      <p class="w3-opacity">Acción</p><br>
      <p>Phasellus eget enim eu lectus faucibus vestibulum. Suspendisse sodales pellentesque elementum.</p>
      <p><button class="w3-button w3-light-grey w3-block">Ver más</button></p>
    </div>  

    </div>
    
  </div>

<!-- End page content -->
</div>

<script>
var msg = "Bienvenido a GameWar, Quieres ver la sección de juegos del Día de hoy";
alert(msg);
</script>
</body>
</html>