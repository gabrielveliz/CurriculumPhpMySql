<?php
include '../conecta/conec.php';
session_start();

$IdUser=$_SESSION['id'];
if (empty($IdUser)) {
  header("location:../Ingresar.php");
}
$consultaUser = "SELECT * FROM t_usu WHERE C_Id_Usu = $IdUser";
$resultadoUser = $mysqli->query($consultaUser);




//Guardamos el registro en la variable $fila
$fila = $resultadoUser->fetch_assoc();
$resulNombre = $fila['C_Nombre_Comp'];
$resulIdTipo = $fila['C_Id_Tipo_Usu'];
$resulImg = $fila['C_Img_Usu'];

$consultaTipo = "SELECT * FROM t_tipo_usu WHERE C_Id_Tipo_Usu = $resulIdTipo";
$resultadoTipo = $mysqli->query($consultaTipo);
$fila2= $resultadoTipo->fetch_assoc();
$resultadoTipoNombre=$fila2['C_Tipo'];


?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Panel de Control - Gabriel Veliz</title>

  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <link rel="stylesheet" href="bower_components/bootstrap/dist/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="bower_components/font-awesome/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="bower_components/Ionicons/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/AdminLTE.min.css">
 <link rel="icon" type="image/png" href="img/control.png" />

  <link rel="stylesheet" href="dist/css/skins/skin-blue.min.css">
  <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>

<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

  <!-- Main Header -->
  <header class="main-header">

    <!-- Logo -->
    <a href="index.php" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"><b>Panel</b></span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"><b>Panel de Control</b></span>
    </a>

    <!-- Header Navbar -->
    <nav class="navbar navbar-static-top" role="navigation">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
        <span class="sr-only">Toggle navigation</span>
      </a>
      <!-- Navbar Right Menu -->
      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
          <!-- Messages: style can be found in dropdown.less-->
        
         
         
          <!-- User Account Menu -->
          <li class="dropdown user user-menu">
            <!-- Menu Toggle Button -->
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <!-- The user image in the navbar-->
              
              <?php 
                echo '<img class="user-image" src="data:image/jpeg;base64,'.base64_encode($resulImg).'"/>';
                ?>
              <!-- hidden-xs hides the username on small devices so only the image appears. -->
              <span class="hidden-xs"><?php echo $resulNombre; ?></span>
            </a>
            <ul class="dropdown-menu">
              <!-- The user image in the menu -->
              <li class="user-header">
                
                <?php 
                echo '<img class="img-circle" src="data:image/jpeg;base64,'.base64_encode($resulImg).'"/>';
                ?>

                <p>
                  <?php echo $resulNombre; ?> <br> <?php echo $resultadoTipoNombre ?>
                  
                </p>
              </li>
              
              <!-- Menu Footer-->
              <li class="user-footer">
                <div class="pull-left">
                  <a href="perfil.php" class="btn btn-default btn-flat icon-user-tie">Perfil</a>
                </div>
                <div class="pull-right">
                  <a href="../conecta/cerrar.php" class="btn btn-default btn-flat icon-exit">Cerrar Sesion</a>
                </div>
              </li>
            </ul>
          </li>
          
        </ul>
      </div>
    </nav>
  </header>
  <!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">

    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">

      <!-- Sidebar user panel (optional) -->
      <div class="user-panel">
        <div class="pull-left image">
          
           <?php 
                echo '<img class="img-circle" src="data:image/jpeg;base64,'.base64_encode($resulImg).'"/>';
            ?>

        </div>
        <div class="pull-left info">
          <p><?php echo $resulNombre; ?></p>
          <!-- Status -->
          <a href="#"><i class="fa fa-circle text-success"></i>En Linea</a>
        </div>
      </div>

      
      <link rel="stylesheet" href="../css/iconos.css">
      <!-- Sidebar Menu -->
      <ul class="sidebar-menu" data-widget="tree">
        <li class="header">MENU</li>
        <!-- Optionally, you can add icons to the links -->
        <li class="active"><a href="index.php"><i class="fa icon-home2"></i> <span>Administrar</span></a></li>
        <li><a href="inicio.php"><i class="fa icon-pencil"></i> <span>Inicio</span></a></li>
        <li><a href="curriculum.php"><i class="fa icon-pencil"></i> <span>Curriculum</span></a></li>
        
        <li><a href="perfil.php"><i class="fa icon-user-tie"></i> <span>Perfil</span></a></li>
        <li><a href="usuarios.php"><i class="fa icon-user"></i> <span>Usuarios</span></a></li>
        
      </ul>
      <!-- /.sidebar-menu -->
    </section>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    

    <!-- Main content -->
    <section class="content container-fluid">

      <!--------------------------
        | Your Page Content Here |
        -------------------------->
        <div class="col-11 col-md-8" style="margin:auto;">
        <h2>Perfil</h2>
        <p>Modificar informacion de su perfil.</p>
        
        <button class='btn btn-light' onclick="window.location.href='perfil.php'">Ver Perfil</button>
        <h2>Contenido Web</h2>
        <p>Agregar, modificar o eliminar contenidos web.</p>
        
        <button id="inicio" class='btn btn-light' onclick="window.location.href='inicio.php'">Inicio</button>
        <button class='btn btn-light' onclick="window.location.href='curriculum.php'">Curriculum</button>
        <button class='btn btn-light' onclick="window.location.href='gv.php'">Sobre Mi</button>
        
        <h2>Listas de Usuarios</h2>
        <p>Agregar, modificar o eliminar cuentas de usuarios.</p>
        
        <button class='btn btn-light' onclick="window.location.href='usuarios.php'">Cuentas de Usuario</button>
        </div>
    </section>
    <!-- /.content -->
  </div>
  
</div>
<!-- ./wrapper -->

<!-- REQUIRED JS SCRIPTS -->

<!-- jQuery 3 -->
<script src="bower_components/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.min.js"></script>
<script>
$(document).ready(function(){

$('#perfil').click(function(){
        url = "contacto.php";
        $(location).attr('href',url);
      });
    $('#inicio').click(
        window.location='inicio.php';
      );
    $('#curriculum').click(
        window.location='curriculum.php';
      );
    $('#sobre').click(
        window.location='gv.php';
      );
    $('#cuentas').click(
        window.location='usuarios.php';
      );

});
    


</script>

<!-- Optionally, you can add Slimscroll and FastClick plugins.
     Both of these plugins are recommended to enhance the
     user experience. -->
</body>
</html>