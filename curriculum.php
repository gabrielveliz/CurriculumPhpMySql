<?php
include 'conecta/conec.php';

$IdPerfil=1;
$consultaPerfil = "SELECT * FROM t_perfil WHERE C_Id_Perfil = $IdPerfil";
$resultadoPerfil = $mysqli->query($consultaPerfil);

$fila = $resultadoPerfil->fetch_assoc();
$resulNombre = $fila['C_Nombre'];
$resultImg = $fila['C_Img_Perfil'];

?>
<!doctype html>
<html class="no-js" lang="">

<head>
  <meta charset="utf-8">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <title>Curriculum - Gabriel Veliz</title>
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
  <div class="container-fluid contenedor2 conte2">
    
  
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
              <center><span class="titulo">Curriculum</span></center>
            
            </div>
            
          </div> <!-- fin primera seccion -->
        </div> <!-- fin contenedor -->
    <div class="ContSeg ContCur container-fluid">
        <div class="row">
            
            <div class="col-12 col-md-3 bor">
              
              <?php 
                echo '<img class="FotoPerfil" src="data:image/jpeg;base64,'.base64_encode($resultImg).'"/>';
                ?>
              <h4><?php echo $resulNombre ;?></h4>
              <br>
              <h4>Conocimientos:</h4>
              
              <?php 
            $consultaCono = "SELECT * FROM t_conocimientos";
            $resultadoCono=mysqli_query($mysqli,$consultaCono);
            while($filaCono=mysqli_fetch_row($resultadoCono))
            {
              $id=$filaCono[0];
              $nombre=$filaCono[1];
              echo "<h6>".$nombre."</h6>";
              $consultaCono2 = "SELECT * FROM t_conocimientos_detalle where C_Id_Conocimientos=$id";
              $resultadoCono2=mysqli_query($mysqli,$consultaCono2);
              
              while($filaCono2=mysqli_fetch_row($resultadoCono2))
              {
                $nombre_detalle=$filaCono2[1];
                echo "<li><span class='lista'>".$nombre_detalle."</span></li>";
              }
              echo "<br>";
            }
          ?>
            </div>
            <div class="col-12 col-md-8">
              
                <div class="CurFon col-12">
                  <center><h3>Experiencia profesional</h3></center>
                  <br>
<?php 
  $consultaExp = "SELECT C_Id_Laboral, C_Puesto, C_Empresa, C_Link,DATE_FORMAT(C_Fecha_I,'%d/%m/%Y'), DATE_FORMAT(C_Fecha_F,'%d/%m/%Y'), C_Img_Laboral FROM t_laboral order by C_Fecha_F Desc";
  $resultadoExp=mysqli_query($mysqli,$consultaExp);
  while($filaExp=mysqli_fetch_row($resultadoExp))
  {
    $idExp=$filaExp[0];
    $nombre=$filaExp[1];
    $empresa=$filaExp[2];
    $link=$filaExp[3];
    $fecha_i=$filaExp[4];
    $fecha_f=$filaExp[5];
    $imgExp=$filaExp[6];



    echo "<h4>".$nombre."</h4>";
    if (is_null($link)) {
      echo "<h5>".$empresa;
    }else
    {
      echo "<h5><a href='".$link."' target='_blank'>".$empresa;
    }
    
    
    if (is_null($link)) {
      
    }
    else
    {
      echo "</a>";
    }

    echo " | ".$fecha_i;
    if (is_null($fecha_i) or is_null($fecha_f)) {
      
    }else
    {
      echo " - ";
    }
  
    echo $fecha_f;
    echo "</h5>";
    

    $consultaDet = "SELECT * FROM t_tareas where C_Id_Laboral=$idExp";
    $resultadoDet=mysqli_query($mysqli,$consultaDet);
              
    while($filaDet=mysqli_fetch_row($resultadoDet))
    {
      $nombre_Det=$filaDet[1];
      echo "<li><span class='lista'>".$nombre_Det."</span></li>";
    }
    echo '<img class="ImgCur tquila" src="data:image/jpeg;base64,'.base64_encode($imgExp).'"/>';
      echo "<br>";
  }
  ?>
                </div>
               
                <div class="CurFon col-12">
                  <center><h3>Educación</h3></center>
                  <br>
                  
                
  <?php 
  $consultaEd = "SELECT C_Id_Educacion, C_Carrera, C_Institucion, DATE_FORMAT(C_Fecha_I,'%d/%m/%Y'), DATE_FORMAT(C_Fecha_F,'%d/%m/%Y'), C_Img_Ed FROM t_educacion order by C_Fecha_F Desc";
  $resultadoEd=mysqli_query($mysqli,$consultaEd);
  while($filaEd=mysqli_fetch_row($resultadoEd))
  {
    
    $nombreCa=$filaEd[1];
    $nombreInst=$filaEd[2];
    $fecha_i_Ed=$filaEd[3];
    $fecha_f_Ed=$filaEd[4];
    $imgEd=$filaEd[5];

    echo "<h4>".$nombreCa."</h4>";
    echo "<h5>".$nombreInst;
  
    echo " | ".$fecha_i_Ed;
    if (is_null($fecha_i_Ed) or is_null($fecha_f_Ed)) {
      
    }else
    {
      echo " - ";
    }
  
    echo $fecha_f_Ed;
    echo "</h5>";
    echo '<img class="ImgCur tquila" src="data:image/jpeg;base64,'.base64_encode($imgEd).'"/> <br>';

  }
  ?>
                </div>

        </div>
    </div>
  </div>
    <div class="pie pie2 container-fluid">
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
