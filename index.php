
<!doctype html>
<html class="no-js" lang="">

<head>
  <meta http-equiv="Content-type" content="text/html; charset=utf-8" />
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <title>Gabriel Esteban Véliz Zúñiga - Ingeniero de Ejecución en Informática</title>
  <meta name="description" content="">
  <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">

  <link rel="manifest" href="site.webmanifest">
  <link rel="icon" type="image/png" href="img/icon.png" />
  <!-- Place favicon.ico in the root directory -->
  <link rel="stylesheet" type="text/css" href="css/main.css">
  
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css" integrity="sha384-9gVQ4dYFwwWSjIDZnLEWnxCjeSWFphJiwGPXr1jddIhOegiu1FwO5qRGvFXOdJZ4" crossorigin="anonymous">
  
</head>
<?php

include 'conecta/conec.php';

$IdPerfil=1;
$consultaPerfil = "SELECT * FROM t_perfil WHERE C_Id_Perfil = $IdPerfil";
$resultadoPerfil = $mysqli->query($consultaPerfil);

$fila = $resultadoPerfil->fetch_assoc();
$resulNombre = $fila['C_Nombre'];
$resulTitulo = $fila['C_Titulo_Pro'];
$resulUniversidad = $fila['C_Unive_Pro'];
$resulObjetivo = $fila['C_Objetivo'];
$resultImg = $fila['C_Img_Perfil'];

?>
<body>
    <!--[if lte IE 9]>
      <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="https://browsehappy.com/">upgrade your browser</a> to improve your experience and security.</p>
    <![endif]-->

    <!-- Add your site or application content here -->

  <div class="contenedor2 conte1">
    
  
      <header id="header" class="">
        <div class="menu_bar">
          <a href="#" class="bt-menu"><span class="icon-menu"></span> Menu</a>
        </div>
        <nav>

          
          <ul>

            <li><a href="index.php" title="Inicio"><span class="icon-home3"></span> Inicio</a></li>

            <li><a href="curriculum.php" title="Curriculum"><span class="icon-file-text2"></span>Curriculum</a></li>

           

            <li><a href="contacto.php" title="Contacto"><span class="icon-phone"></span>Contacto</a></li>
            <li><a href="Curriculum-Vitae-Gabriel-Veliz.pdf" target="_blank" title="Curriculum Vitae"><span class="icon-cloud-download"></span>Descargar</a></li>
            <li><a href="Ingresar.php" title="Ingresar"><span class="icon-enter"></span>Ingresar</a></li>
          </ul>
        </nav>
      </header><!-- /header -->

        <div class="container-fluid contenedor">
          <div class="row">
            <div class="col-12 col-md-4">
              <div >
                <?php 
                echo '<img class="FotoPerfil" src="data:image/jpeg;base64,'.base64_encode($resultImg).'"/>';
                ?>
              </div>
            </div>
            <div class="col-12 col-md-8 pres"><h1><?php echo $resulNombre ?></h1>
              <h4><?php echo $resulTitulo ?> <br>
              <?php echo $resulUniversidad ?></h4>
              <hr>
              <p>Objetivo: <br> <?php echo $resulObjetivo ?></p>

            </div> <!-- fin segunda columna de la primra seccion -->
          </div> <!-- fin primera seccion -->
        </div> <!-- fin contenedor -->
    </div> <!-- fin contenedor2 -->
    <div class="ContSeg container-fluid">
        <div class="row">
          
          <div class=" titu col-12 col-md-12">
            <h1>Conocimientos Informáticos</h1>
          </div>

        </div>
        <div class="row">

          <?php 
            $consultaCono = "SELECT * FROM t_conocimientos";
            
            $resultadoCono=mysqli_query($mysqli,$consultaCono);
            $a=0;

            while($filaCono=mysqli_fetch_row($resultadoCono))
            {

              $id=$filaCono[0];
              $nombre=$filaCono[1];
              $resultImg2=$filaCono[2];
              echo "<div class='col-10 col-md-3 Cono'>";
              echo "<img class='FotoPerfil' src='data:image/jpeg;base64,".base64_encode($resultImg2)."'/>";
              echo "<p>".$nombre."<ul><table>";


              $consultaCono2 = "SELECT * FROM t_conocimientos_detalle where C_Id_Conocimientos=$id order by C_Porcentaje desc";
              $resultadoCono2=mysqli_query($mysqli,$consultaCono2);
              
              while($filaCono2=mysqli_fetch_row($resultadoCono2))
              {
                $nombre_detalle=$filaCono2[1];
                $porcentaje=$filaCono2[2];
                echo "<tr><th><li><span class='lista'>".$nombre_detalle."</span></li></th>";
                
                if (is_null($porcentaje)) {
                 
                }
                else{
                echo "<th><meter min='0' max='100' low='20' high='50' optimum='100' value='".$porcentaje."'></meter></th>";
                }
                echo "</tr>";
              }
              echo "</table></ul></div>";
              $a = $a +1;
              if($a%3==0)
              {
                  echo "</div>
        <div class='row'>";
              }
            }
          ?>
</div>
        

    </div>
    <div class="pie pie1 container-fluid">
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
