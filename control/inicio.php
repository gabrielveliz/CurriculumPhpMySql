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

$IdPerfil=1;
$consultaPerfil = "SELECT * FROM t_perfil WHERE C_Id_Perfil = $IdPerfil";
$resultadoPerfil = $mysqli->query($consultaPerfil);

$filaPerfil = $resultadoPerfil->fetch_assoc();
$NombrePerfil = $filaPerfil['C_Nombre'];
$resulTitulo = $filaPerfil['C_Titulo_Pro'];
$resulUniversidad = $filaPerfil['C_Unive_Pro'];
$resulObjetivo = $filaPerfil['C_Objetivo'];
$resultImg = $filaPerfil['C_Img_Perfil'];

?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Modificar Inicio - Gabriel Veliz</title>

  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <link rel="stylesheet" href="bower_components/bootstrap/dist/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="bower_components/font-awesome/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="bower_components/Ionicons/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/AdminLTE.css">
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
                  <a href="#" class="btn btn-default btn-flat icon-user-tie">Perfil</a>
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
        <li class="active"><a href="inicio.php"><i class="fa icon-pencil"></i> <span>Inicio</span></a></li>
        <li><a href="curriculum.php"><i class="fa icon-pencil"></i> <span>Curriculum</span></a></li>
        <li><a href="gv.php"><i class="fa icon-pencil"></i> <span>Sobre Mi</span></a></li>
        <li><a href="contacto.php"><i class="fa icon-pencil"></i> <span>Contacto</span></a></li>
        <li><a href="usuarios.php"><i class="fa icon-user"></i> <span>Usuarios</span></a></li>
        
      </ul>
      <!-- /.sidebar-menu -->
    </section>
    <!-- /.sidebar -->
  </aside>


  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper container-fluid">
    <!-- Content Header (Page header) -->
    

    <!-- Main content -->
<section class="content container-fluid">

      <!--------------------------
        | Your Page Content Here |
        -------------------------->
         
     





<div class="row"><!-- Contendedor Perfil -->
    <div class="col-12 col-md-4">
      <div >
       <?php 
        echo '<img class="FotoPerfil" src="data:image/jpeg;base64,'.base64_encode($resultImg).'"/>';
        ?>
      </div>
    </div>
    <div class="col-12 col-md-8 pres"><h1><?php echo $NombrePerfil ?></h1>
      <h4><?php echo $resulTitulo ?>
      <br><?php echo $resulUniversidad ?></h4>
      <p>Objetivo: <br> <?php echo $resulObjetivo ?></p>
    </div>
</div><!-- Fin contenedor Perfil -->

</section>




<section class="content container-fluid">
<div class="col-12 ">

  <div class="col-12 col-md-12">
    <h1>Modificar Perfil Inicio</h1>
  </div>

  <form class="formuperfil" enctype="multipart/form-data" action="../conecta/EditarPerfil.php" method="post">
    <div class="form-group col-12 col-md-12">
      <label for="exampleFormControlFile1">Subir Imagen</label>
      <input type="file" name="imagen" class="form-control-file" id="exampleFormControlFile1">
    </div>

    <div class="form-group col-12 col-md-12">
      <label for="formGroupExampleInput">Nombre Completo</label>
      <input type="text" class="form-control" name="nombre" maxlength="50" value="<?php echo $NombrePerfil ?>" id="nombre" placeholder="Ingresar nombre" required="">
      <div id="cajanombre">
      </div>
    </div>

    <div class="row form-group col-12 col-md-6">
      <label for="formGroupExampleInput2">Titulo Profesional</label>
      <input type="text" class="form-control" name="titulo" maxlength="50" value="<?php echo $resulTitulo ?>" id="titulo" placeholder="Ingresar Titulo">
      <div id="cajatitulo">
      </div>
    </div>

    <div class="form-group col-12 col-md-6">
      <label for="formGroupExampleInput2">Universidad</label>
      <input type="text" class="form-control" maxlength="50" name="universidad" value="<?php echo $resulUniversidad ?>" id="universidad" placeholder="Ingresar Titulo">
      <div id="cajauniversidad">
      </div>
    </div>

    <div class="form-group col-12 col-md-12">
      <label for="exampleFormControlTextarea1">Objetivo</label>
      <textarea class="form-control" value="" maxlength="500" id="objetivo" name="objetivo" rows="3" required=""><?php echo $resulObjetivo ?></textarea>
      <div id="cajaobjetivo">
      </div>
    </div>

    <div class="col-12 col-md-12">
      <input class="btn btn-primary" type="submit"  value="Guardar Informacion Perfil">  
    </div>
  </form>

</div>


</section>

<section class="content container-fluid">

<!---
inicio de tabla conocimiento
-->

<div class="containe3 col-12">

  <h2>Agregar Nueva categoria de Conocimientos</h2>

  <div class="row">

    <form enctype="multipart/form-data" action="" method="post">

    <div class="form-group co-12 col-md-12">
      <label for="exampleFormControlFile1">Subir Imagen</label>
      <input type="file" name="imagen" class="form-control-file" id="exampleFormControlFile1">
    </div>

    <div class="form-group col-12 col-md-6">
      <label for="formGroupExampleInput2">Nombre de Categoria</label>
      <input type="text" class="form-control" name="conocimiento" maxlength="50" value="" id="titulo" placeholder="Ingresar Nombre">
    </div>

    <div class="col-12 col-md-12">
      <input class="btn btn-primary" type="submit"  value="Agregar">  
    </div>

    </form>
  </div>

</div>

</section>




<section class="content container-fluid">
<div class="containe col-12">

    <h1>Modificar Conocimientos Inicio</h1>


    <?php 
    $consultaCono = "SELECT * FROM t_conocimientos";
    $resultadoCono=mysqli_query($mysqli,$consultaCono);

    while($filaCono=mysqli_fetch_row($resultadoCono))
    {

      $id=$filaCono[0];
      $nombre=$filaCono[1];
      $resultImg2=$filaCono[2];
                    
    ?>
  <div class='row Con'>
      
      <div class='col-12 col-md-4'><center> <h2><?php echo $nombre ?></h2></center>
          <?php echo "<img class='ImgCon' src='data:image/jpeg;base64,".base64_encode($resultImg2)."'/>" ?>
          <center><input class='btn btn-light' type='submit'  value='Editar Categoria'></center>
      </div>

      <div class='col-12 col-md-8'>
                      
          <table>
                          
          <?php
            $consultaCono2 = "SELECT * FROM t_conocimientos_detalle where C_Id_Conocimientos=$id order by C_Porcentaje desc";
            $resultadoCono2=mysqli_query($mysqli,$consultaCono2);
          ?>
              <h3>Conocimientos detallados</h3>

              <tr>
                <th>Conocimiento</th>
                <th>Porcentaje de conocimiento</th> 
                <th>Opcion</th>
                <th>Opcion</th>
              </tr>
          <?php

                          while($filaCono2=mysqli_fetch_row($resultadoCono2))
                          {
                            $nombre_detalle=$filaCono2[1];
                            $porcentaje=$filaCono2[2];
                            echo "<td><input type='text' value='".$nombre_detalle."' name='porcentaje' class='form-control-file' id='exampleFormControlFile1'></td>";
                            
                            if (is_null($porcentaje)) {
                            echo "<td><input type='text' value='0' ' name='porcentaje' class='form-control-file' id='exampleFormControlFile1'></td>";
                            }
                            else{
                            
                            echo "<td><input type='text' value='".$porcentaje."' name='porcentaje' class='form-control-file' id='exampleFormControlFile1'></td>";
                            }
                            echo "<td><input class='btn btn-warning' type='submit'  value='Modificar'></td>";
                            echo "<td><input class='btn btn-danger' type='submit'  value='Eliminar'></td>";
                            echo "</tr>";
                          }
          ?>

          </table>

          <br>
          <h3>Agregar nuevo conocimiento</h3>
          <table>
          <tr>
            <th>Conocimiento</th>
            <th>Porcentaje de conocimiento</th> 
            <th>Accion</th>             
          </tr>
          <tr>
            <td>
              <input type='text' name='porcentaje' class='form-control-file' id='exampleFormControlFile1'>
            </td>
            <td>
              <input type='text' name='porcentaje' class='form-control-file' id='exampleFormControlFile1'>
            </td>
            <td>
              <input class='btn btn-primary' type='submit'  value='Agregar'>
            </td>
          </tr>
                          
          </table>

      </div>
  </div>
                
    <?php
    }
    ?>
     



      
    <!-- /.content -->
</div>






</section> 
</div>
<!-- ./wrapper -->

<!-- REQUIRED JS SCRIPTS -->

<!-- jQuery 3 -->
<script src="bower_components/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.min.js"></script>
<script src="main.js"></script>

<!-- Optionally, you can add Slimscroll and FastClick plugins.
     Both of these plugins are recommended to enhance the
     user experience. -->
</body>
</html>