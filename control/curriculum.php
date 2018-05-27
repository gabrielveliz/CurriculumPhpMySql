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
  <title>Modificar Curriculum - Gabriel Veliz</title>

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
  <link rel="stylesheet" type="text/css" href="css/main.css">
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
        <li><a href="inicio.php"><i class="fa icon-pencil"></i> <span>Inicio</span></a></li>
        <li class="active"><a href="curriculum.php"><i class="fa icon-pencil"></i> <span>Curriculum</span></a></li>
        <li><a href="gv.php"><i class="fa icon-pencil"></i> <span>Sobre Mi</span></a></li>
        <li><a href="contacto.php"><i class="fa icon-pencil"></i> <span>Contacto</span></a></li>
        <li><a href="usuarios.php"><i class="fa icon-user"></i> <span>Usuarios</span></a></li>
        
      </ul>
      <!-- /.sidebar-menu -->
    </section>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <section class="content container-fluid">
      <!--------------------------
        | Your Page Content Here |
        -------------------------->
    <div class="CurFon col-12">
      <center><h3>Experiencia profesional</h3>
      <button class="activar btn btn-primary" id="mostrar">Mostrar</button><button class="activar btn btn-primary" id="ocultar">Ocultar</button></center>
      <div id="m">

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

        
?>

    <div class="row colEx">
      

<?php
        echo "
        <div class='col-12 col-md-2'>
        <img class='ImgCur tquila' src='data:image/jpeg;base64,".base64_encode($imgExp)."'/>
        </div>
        <div class='col-12 col-md-10'>
        <p>Puesto: ".$nombre."</p>
        
        <p>Link: ".$link."</p>";
        
        echo " <p>Empresa: ".$empresa."</p>

        <p>Fecha de Inicio: ".$fecha_i."</p>
        <p>Fecha de Termino: ".$fecha_f."</p>
        </div>
        <div class='col-12'>
        <br>
          <table>
          <center><h4>Tareas Realizadas</h4></center>
            <thead>
              <tr>
                <th>Tarea</th>
                <th>Accion</th>
                <th>Accion</th>
              </tr>
            </thead>
            <tbody>
              
        ";
        
        $consultaDet = "SELECT * FROM t_tareas where C_Id_Laboral=$idExp";
        $resultadoDet=mysqli_query($mysqli,$consultaDet);
                  
        while($filaDet=mysqli_fetch_row($resultadoDet))
        {
          $nombre_Det=$filaDet[1];
          echo "
                <tr>
                <td>".$nombre_Det."</td>
                <td><input class='btn btn-warning' type='submit'  value='Modificar'></td>
                <td><input class='btn btn-danger' type='submit'  value='Eliminar'></td>
                </tr>
              
          ";
          
          
          
        } //fin 2° while
      echo "
            </tbody>";
         

?>
</table>
          </div>
<br>
    </div> <!--Fin row  -->
<?php

      } //fin 1° while

?>
  </div> <!-- fin div m -->
    </div> <!-- fin de <div class="CurFon col-12">  --> 





    <div class="CurFon col-12">
      <center><h3>Educacion</h3>
      <button class="activar2 btn btn-primary" id="mostrar2">Mostrar</button><button class="activar2 btn btn-primary" id="ocultar2">Ocultar</button></center>
      <div id="e">

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

        
?>

    <div class="row colEx">
      

<?php
        echo "
        <div class='col-12 col-md-2'>
        <img class='ImgCur tquila' src='data:image/jpeg;base64,".base64_encode($imgEd)."'/>
        </div>
        <div class='col-12 col-md-10'>
        <p>Estudios : ".$nombreCa."</p>
        
        <p>Institucion: ".$nombreInst."</p>

        <p>Fecha de Inicio: ".$fecha_i."</p>
        <p>Fecha de Termino: ".$fecha_f."</p>
        </div>

    ";
    ?>


    </div> <!--Fin row  -->
<?php
      } //fin 1° while

?>
        
      </div> <!-- fin div e -->
    </div> <!-- fin de <div class="CurFon col-12">  --> 


<!--------------------------
        |  End|
        -------------------------->
  </section>
</div>
  
</div>
<!-- ./wrapper -->

<!-- REQUIRED JS SCRIPTS -->

<!-- jQuery 3 -->
<script src="bower_components/jquery/dist/jquery.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js">
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