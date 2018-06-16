<?php
include "conecta/conec.php"
?>
<!doctype html>
<html class="no-js" lang="">

<head>
  <meta charset="utf-8">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <title>¿Quien es Gabriel Esteban Véliz Zúñiga?</title>
  <meta name="description" content="">
  <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">

  <link rel="manifest" href="site.webmanifest">
  <link rel="icon" type="image/png" href="img/icon.png" />
  <!-- Place favicon.ico in the root directory -->

  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css" integrity="sha384-9gVQ4dYFwwWSjIDZnLEWnxCjeSWFphJiwGPXr1jddIhOegiu1FwO5qRGvFXOdJZ4" crossorigin="anonymous">
  <link rel="stylesheet" href="css/main.css">
</head>

<body>
    <!--[if lte IE 9]>
      <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="https://browsehappy.com/">upgrade your browser</a> to improve your experience and security.</p>
    <![endif]-->

    <!-- Add your site or application content here -->
  <div class="container-fluid contenedor2 conte3">
    
  
      <header id="header" class="">
        <div class="menu_bar">
          <a href="#" class="bt-menu"><span class="icon-menu"></span> Menu</a>
        </div>
        <nav>

         
          <ul>

            <li><a href="index.php" title="Inicio"><span class="icon-home3"></span> Inicio</a></li>

            <li><a href="curriculum.php" title="Curriculum"><span class="icon-file-text2"></span>Curriculum</a></li>

            <li><a href="gv.php" title="Portafolio"><span class="icon-user-tie"></span>Sobre Mi</a></li>

            <li><a href="contacto.php" title="Contacto"><span class="icon-phone"></span>Contacto</a></li>
            <li><a href="Curriculum-Vitae-Gabriel-Veliz.pdf" target="_blank" title="Curriculum Vitae"><span class="icon-cloud-download"></span>Descargar</a></li>
            <li><a href="Ingresar.php" title="Ingresar"><span class="icon-enter"></span>Ingresar</a></li>
          </ul>
        </nav>
      </header><!-- /header -->

         <div class="container-fluid contenedor">
          <div class="row">
            <div class="col-12 por">
              <center><span class="titulo">Sobre Mi</span></center>
            
            </div>
            
          </div> <!-- fin primera seccion -->
        </div> <!-- fin contenedor -->
    
    <div class="ContSeg ContQuien container-fluid">
      
      
      <div class="yo col-12 col-md-8">
      <?php


        $consultaHis = "SELECT * FROM t_mi";
        $resultadoHis=mysqli_query($mysqli,$consultaHis);
                  
        while($filaHis=mysqli_fetch_row($resultadoHis))
        {
          $historia=$filaHis[2];
          $imag=$filaHis[3];
          $detaima=$filaHis[4];
          $verima=$filaHis[5];

          $id="".$filaHis[0];

          echo "
          <img id='myImg".$id."' class='fami' alt='".$detaima."' src='data:image/jpeg;base64,".base64_encode($imag)."'/>
          <p>".$detaima."</p>
          <!-- The Modal -->
        <div id='myModal".$id."' class='modal modal".$id."'>
          <span class='close close".$id."'>&times;</span>
          <img class='modal-content' id='img".$id."'>
          <div class='caption caption".$id."'></div>
        </div>
        <script>
var modal".$id." = document.getElementById('myModal".$id."');
var img".$id." = document.getElementById('myImg".$id."');
var modalImg".$id." = document.getElementById('img".$id."');
var captionText".$id." = document.getElementById('caption".$id."');

img".$id.".onclick = function(){
    modal".$id.".style.display = 'block';
    modalImg".$id.".src = this.src;
    captionText".$id.".innerHTML = this.alt;
}

var span".$id." = document.getElementsByClassName('close".$id."')[0];


span".$id.".onclick = function() { 
    modal".$id.".style.display = 'none';
}
</script>
          
          
          <h3>
          ".$historia."
          </h3>
          
          ";
?>


<?php
        }
  ?>

      </div>
    </div>



    <div class="pie pie3 container-fluid">
        <div class="row">
            <div class="col-12 col-md-6">
                <h2>Contacto</h2>
                <h4>contacto@gabrielveliz.cl</h4>
            </div>
            <div class="col-12 col-md-6 redes">
                <h2>Conectar</h2>
                
                <a href="https://www.linkedin.com/in/gvelizzuniga/" target="_blank" title="Linkedin">
                  <span class="icon-linkedin icono"></span>
                </a>
                <a href="https://github.com/gabrielveliz" target="_blank" title="Github">
                  <span class="icon-github icono"></span>
                </a>
                <a href="mailto:contacto@gabrielveliz.cl" title="Enviar Correo">
                  <span class="icon-mail3 icono" ></span>
                </a>
            </div>
        
        </div>

    </div>
    <script src="js/vendor/modernizr-3.6.0.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
    <script>window.jQuery || document.write('<script src="js/vendor/jquery-3.3.1.min.js"><\/script>')</script>
    <script src="js/plugins.js"></script>
    

    
    <script src="http://code.jquery.com/jquery-latest.js"></script>
    
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js" integrity="sha384-uefMccjFJAIv6A+rW+L4AHf99KvxDjWSu1z9VI8SKNVmz4sk7buKt/6v9KI65qnm" crossorigin="anonymous"></script>
<script src="js/main.js"></script>
<script src="menu.js"></script>
    <!-- Google Analytics: change UA-XXXXX-Y to be your site's ID. -->
    <script>
      window.ga = function () { ga.q.push(arguments) }; ga.q = []; ga.l = +new Date;
      ga('create', 'UA-XXXXX-Y', 'auto'); ga('send', 'pageview')
    </script>
    <script src="https://www.google-analytics.com/analytics.js" async defer></script>
</body>
</html>
