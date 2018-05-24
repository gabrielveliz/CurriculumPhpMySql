<!doctype html>
<html class="no-js" lang="">

<head>
  <meta charset="utf-8">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <title>Log In - Gabriel Veliz</title>
  <meta name="description" content="">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="icon" type="image/png" href="img/icon.png" />

  <link rel="manifest" href="site.webmanifest">
  <link rel="apple-touch-icon" href="icon.png">
  <!-- Place favicon.ico in the root directory -->
  <link rel="stylesheet" href="css/main.css">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css" integrity="sha384-9gVQ4dYFwwWSjIDZnLEWnxCjeSWFphJiwGPXr1jddIhOegiu1FwO5qRGvFXOdJZ4" crossorigin="anonymous">
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.13/css/all.css" integrity="sha384-DNOHZ68U8hZfKXOrtjWvjxusGo9WQnrNx2sqG0tfsghAvtVlRW3tvkXWZh58N9jp" crossorigin="anonymous">


<style>
  .form-control-feedback {
  position: absolute;
  padding: 10px;
  pointer-events: none;
}
.form-control {
  padding-left: 30px!important;
}
</style>
</head>

<body class="BodyIngresar">
  <div class="col-12 col-md-6 ingresar">
    <h2>Administracion</h2>
    <p>Solo Personal Autorizado</p>
 <form action="conecta/valida_usuario.php" method="post">
  
    
    <label for="exampleInputEmail1">Usuario</label>
  <div class="form-group has-feedback">
  <i class="fa fa-user form-control-feedback"></i>
    <input type="text" name="usuario" class="form-control" id="exampleInputEmail1"  placeholder="Ingresar Usuario..." required="">
  </div>

    <label for="exampleInputPassword1">Contraseña</label>
    <div class="form-group has-feedback">
  <i class="fas fa-key form-control-feedback"></i>
    <input type="password" name="pas" class="form-control" id="exampleInputPassword1" placeholder="Ingresar Contraseña..." required="">
  </div>
  <div class="form-group form-check">
   
  </div>
  <button type="submit" class="btn btn-primary">Entrar</button>
  <br>
 <center><a href="index.php">Regresar al Sitio Web Principal</a></center>
</form>
</div>

  <script src="js/vendor/modernizr-3.6.0.min.js"></script>
  <script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
  <script>window.jQuery || document.write('<script src="js/vendor/jquery-3.3.1.min.js"><\/script>')</script>
  <script src="js/plugins.js"></script>
  <script src="js/main.js"></script>

  <!-- Google Analytics: change UA-XXXXX-Y to be your site's ID. -->
  <script>
    window.ga = function () { ga.q.push(arguments) }; ga.q = []; ga.l = +new Date;
    ga('create', 'UA-XXXXX-Y', 'auto'); ga('send', 'pageview')
  </script>
  <script src="https://www.google-analytics.com/analytics.js" async defer></script>
</body>

</html>
