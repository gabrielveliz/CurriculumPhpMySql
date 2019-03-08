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
$resulNombreUs = $fila['C_Nombre_Usuario'];
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
  <title>Modificar Perfil - Gabriel Veliz</title>

  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <link rel="stylesheet" href="bower_components/bootstrap/dist/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="bower_components/font-awesome/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="bower_components/Ionicons/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/AdminLTE.min.css">
  <link rel="stylesheet" type="text/css" href="css/main.css">
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
        <li><a href="index.php"><i class="fa icon-home2"></i> <span>Administrar</span></a></li>
        <li><a href="inicio.php"><i class="fa icon-pencil"></i> <span>Inicio</span></a></li>
        <li><a href="curriculum.php"><i class="fa icon-pencil"></i> <span>Curriculum</span></a></li>
        
        <li class="active"><a href="perfil.php"><i class="fa icon-user-tie"></i> <span>Perfil</span></a></li>
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
        <center></center>
        <br>
<div class="col-12 col-md-4">
      <div >
       <?php 
        echo '<img class="FotoPerfil" src="data:image/jpeg;base64,'.base64_encode($resulImg).'"/>';
        ?>
      </div>
    </div>
      <div class="col-12 ContPerfil">

        <table class="table2">
          <tr>
            <th colspan="2"><center><p>Perfil</p></center></th>
          </tr>
          <tr>
            <th><p>Nombre de Usuario :</p></th>
            <th><p><?php echo $resulNombreUs ?></p></th>
          </tr>
          <tr>
            <th><p>Nombre Completo : </p></th>
            <th><p><?php echo $resulNombre ?></p></th>
          </tr>
          <tr>
            <th><p>Tipo de Usuario :</p></th>
            <th><p><?php echo $resultadoTipoNombre ?></p></th>
          </tr>
          <tr>
            <th colspan="2"><center><p><button type="button" class="btn btn-warning" data-toggle="modal" data-target="#datos">
         Modificar
        </button></p></center></th>
          </tr>
        </table>


        <div class="modal fade" id="datos" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Modificar Datos de Usuario</h5>
              
            </div>
            <div class="modal-body">

              <form enctype="multipart/form-data" action="../conecta/EdUs.php" method="post">
              <input type="hidden" value="<?php echo $IdUser ?>" name="id">
              <?php echo "<img class='ImgCon' src='data:image/jpeg;base64,".base64_encode($resulImg)."'/>" ?>
              
      
        <label for="exampleFormControlFile1">Subir Imagen</label>
        <input type="file" name="imagen" class="form-control-file" id="exampleFormControlFile1" >
     
        <br>
        <label for="formGroupExampleInput2">Usuario</label>
        <input type="text" class="form-control" name="usuario" value="<?php echo $resulNombreUs; ?>" maxlength="50" id="titulo" placeholder="Ingresar Usuario" required="">
        <br>
        <label for="formGroupExampleInput2">Nombre completo</label>
        <input type="text" class="form-control" name="nombre" value="<?php echo $resulNombre; ?>" maxlength="50" id="titulo" placeholder="Ingresar Nombre" required="">
        <br>
        <label for="formGroupExampleInput2">Contraseña Antigua</label>
        <input type="text" class="form-control" name="cont_ant" value="" maxlength="50" id="titulo" placeholder="Ingresar Contraseña Antigua" required="">
        <br>
        <label for="formGroupExampleInput2">Contraseña Nueva</label>
        <input type="text" class="form-control" name="cont_nu" value="" maxlength="50" id="titulo" placeholder="Ingresar Contraseña Nueva" required="">
        <br>
        <label for="formGroupExampleInput2">Repetir Contraseña</label>
        <input type="text" class="form-control" name="cont_rep" value="" maxlength="50" id="titulo" placeholder="Ingresar Repetir Contraseña" required="">



        

            </div>
            <div class="modal-footer">
              <input class="btn btn-primary" type="submit"  value="Modificar"> 
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
              </form>
            </div>
          </div>
        </div>
      </div>


         
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

<!-- Optionally, you can add Slimscroll and FastClick plugins.
     Both of these plugins are recommended to enhance the
     user experience. -->
</body>
</html>