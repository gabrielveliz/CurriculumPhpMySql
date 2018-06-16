<?php
$name = $_POST['nombre'];
$email = $_POST['correo'];
$message = $_POST['mensaje'];
$formcontent="Correo generado por el formuario de Contactos, por favor no responder \n \n Nombre: $name \n Correo electronico: $email \n Telefono: $phone \n \nMensaje:\n $message \n \n \n Si desea responder esta persona por favor envie un correo a: $email";
$recipient = "contacto@gabrielveliz.cl";
$subject = "Nuevo mensaje - formulario de contacto";
$mailheader = "From: $email \r\n";
mail($recipient, $subject, $formcontent, $mailheader) or die("Error!");
?>
<!doctype html>
<html class="no-js" lang="">

<head>
  <meta charset="utf-8">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <title>Gracias! - Gabriel Esteban Véliz Zúñiga</title>
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
  <div class="container-fluid contenedor2 conte4">
    
  
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
              <center><span class="titulo">Contacto</span></center>
            
            </div>
            
          </div> <!-- fin primera seccion -->
        </div> <!-- fin contenedor -->
      <div class="container-fluid">
        
    <div class="col-11 col-md-8 formulario">
    <img src="img/foto1.jpg" class="ImgContact" alt="">
      <center><h4> Gabriel Esteban Véliz Zúñiga</h4></center>
    <form action="">
    <label for="exampleFormControlInput1">Nombre</label>
    <input id="ForTex1" type="text" class="form-control" id="exampleFormControlInput1" placeholder="Nombre..." required="">
    <label for="exampleFormControlInput1">Correo Electronico</label>
    <input id="ForTex2" type="email" class="form-control" id="exampleFormControlInput1" placeholder="Nombre@ejemplo.com" required="">

    <label for="exampleFormControlTextarea1">Mensaje</label>
    <textarea id="ForTex3" class="form-control" id="exampleFormControlTextarea1" rows="3" required=""></textarea>
    <br>
    <center>
    <h2 style="color:white">El mensaje fue enviado Correctamente</h2>
    </center>
    </form>
    </div>

      </div>
    <div class="pie pie4 container-fluid">
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
