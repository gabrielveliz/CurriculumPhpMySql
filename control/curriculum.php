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
        <li class="active"><a href="curriculum.php"><i class="fa icon-pencil"></i> <span>Curriculum</span></a></li>
        
        <li><a href="perfil.php"><i class="fa icon-user-tie"></i> <span>Perfil</span></a></li>
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
     <center> 
      <button class="activar btn btn-primary btn-lg btn-block" id="mostrar">Mostrar Experiencia</button><button class="activar btn btn-secondary btn-lg btn-block" id="ocultar">Ocultar Experiencia</button></center>
      
      <div id="m">
        <center><h3>Experiencia profesional</h3></center>
        
        <div class="row">

    

   <center> <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#agregar">
          Agregar Nueva Experiencia
        </button></center>
        <div class="modal fade" id="agregar" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Nueva Experiencia</h5>
              
            </div>
            <div class="modal-body">
        <form enctype="multipart/form-data" action="../conecta/inEx.php" method="post">
        <center><h4>Agregar Nueva Experiencia</h4></center>
      
        <label for="exampleFormControlFile1">Subir Imagen</label>
        <input type="file" name="imagen" class="form-control-file" id="exampleFormControlFile1" required="">
     

        <br>
        <label for="formGroupExampleInput2">Puesto</label>
        <input type="text" class="form-control" name="puesto" maxlength="50" id="titulo" placeholder="Ingresar Puesto" required="">
        <br>
        <label for="formGroupExampleInput2">Empresa</label>
        <input type="text" class="form-control" name="empresa" maxlength="50" id="titulo" placeholder="Ingresar Empresa" required="">
        <br>

        <label id="web" for="formGroupExampleInput2">Sitio web de la empresa</label>
        <p style="color:red"><input type="checkbox" name="no_web" id="cbox1" value="no_web">La empresa no cuenta con sitio Web</p>
        <input type="text" class="form-control" name="web" maxlength="50" id="web2" placeholder="Ingresar Sitio Web">
        <br>
        <p style="color:red"><input type="checkbox" name="no_fecha" id="cbox2" value="no_fecha">No agregar Fechas</p>
        <label id="fecha1" for="formGroupExampleInput2">Fecha de inicio</label>
        <input type="date" class="form-control" name="fecha_1" maxlength="50" id="fecha2" placeholder="Ingresar fecha inicio" >
        <br>
        <label id="fecha3" for="formGroupExampleInput2">Fecha de Termino</label>
        <input type="date" class="form-control" name="fecha_2" maxlength="50" id="fecha4" placeholder="Ingresar fecha fin" >
        
        <label id="fecha5" for="formGroupExampleInput2">Ingresar una Fecha para ordenar contrologicamente esta experiencia</label>
        <input type="date" class="form-control" name="fecha_3" maxlength="50" id="fecha6" placeholder="Ingresar fecha fin">


  
              
              
            </div>
            <div class="modal-footer">
              
              <input type="hidden" value="" name="id">
              <input type="submit" value="Agregar" class="btn btn-primary">
              
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
              </form>
            </div>
          </div>
        </div>
      </div>
  </div>
                      <br>
      <?php 
      $consultaExp = "SELECT C_Id_Laboral, C_Puesto, C_Empresa, C_Link,DATE_FORMAT(C_Fecha_I,'%d/%m/%Y'), DATE_FORMAT(C_Fecha_F,'%d/%m/%Y'), C_Img_Laboral, DATE_FORMAT(C_Fecha_I,'%Y-%m-%d'),DATE_FORMAT(C_Fecha_F,'%Y-%m-%d') FROM t_laboral order by C_Fecha_F Desc";
      $resultadoExp=mysqli_query($mysqli,$consultaExp);
      
      while($filaExp=mysqli_fetch_row($resultadoExp))
      {$cont=1;


        $idExp=$filaExp[0];
        $nombre=$filaExp[1];
        $empresa=$filaExp[2];
        $link=$filaExp[3];
        $fecha_i=$filaExp[4];
        $fecha_f=$filaExp[5];
        $imgExp=$filaExp[6];
        $fecha_i2=$filaExp[7];
        $fecha_f2=$filaExp[8];

        $mod1="mod".$idExp;
        $mod="modal".$idExp;
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
        <p>Fecha de Termino: ".$fecha_f."</p>";
        ?>
        
        <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#<?php echo $mod1 ?>">
         Modificar Experiencia
        </button>
        

        <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#<?php echo $mod ?>">
          Eliminar Experiencia
        </button>
        </div>
        
        <!-- inicio modal eliminar-->
        <div class="modal fade" id="<?php echo $mod ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Mensaje de Advertencia</h5>
              
            </div>
            <div class="modal-body">
             <h4>¿Está seguro que desea eliminar la experiencia "<?php echo $nombre; ?>" ?</h4>
             <p>Esta accion eliminara todas las tareas relacionadas con esta experiencia.</p>
              
              
            </div>
            <div class="modal-footer">
              <form action="../conecta/elEx.php" method="post">
              <input type="hidden" value="<?php echo $idExp ?>" name="id">
              <input type="submit" value="Eliminar" class="btn btn-danger">
              
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
              </form>
            </div>
          </div>
        </div>
      </div><!-- fin modal eliminar-->
      <!-- Modal para modificar categoria-->
      <div class="modal fade" id="<?php echo $mod1 ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Modificar Experiencia</h5>
              
            </div>
            <div class="modal-body">
             <?php
            
            $nombre=$filaExp[1];
            $empresa=$filaExp[2];
            $link=$filaExp[3];
            $fecha_i=$filaExp[4];
            $fecha_f=$filaExp[5];
            $imgExp=$filaExp[6];

              


              ?>
              <form enctype="multipart/form-data" action="../conecta/edEx.php" method="post">
              <input type="hidden" value="<?php echo $idExp ?>" name="id">
              <?php echo "<img class='ImgCon' src='data:image/jpeg;base64,".base64_encode($imgExp)."'/>" ?>
              
      
        <label for="exampleFormControlFile1">Subir Imagen</label>
        <input type="file" name="imagen" class="form-control-file" id="exampleFormControlFile1" >
     

        <br>
        <label for="formGroupExampleInput2">Puesto</label>
        <input type="text" class="form-control" name="puesto" value="<?php echo $nombre; ?>" maxlength="50" id="titulo" placeholder="Ingresar Puesto" required="">
        <br>
        <label for="formGroupExampleInput2">Empresa</label>
        <input type="text" class="form-control" name="empresa" value="<?php echo $empresa; ?>" maxlength="50" id="titulo" placeholder="Ingresar Empresa" required="">
        <br>

        <label id="web" for="formGroupExampleInput2">Sitio web de la empresa</label>
      
        <input type="text" class="form-control" value="<?php echo $link; ?>" name="web" maxlength="50" id="web2" placeholder="Ingresar Sitio Web">
        <br>
        
        <label id="fecha1" for="formGroupExampleInput2">Fecha de inicio</label>
        <input type="date" class="form-control" name="fecha_1" value="<?php echo $fecha_i2; ?>" maxlength="50" id="fecha2" placeholder="Ingresar fecha inicio" >
        <br>
        <label id="fecha3" for="formGroupExampleInput2">Fecha de Termino o Fecha de orden cronologico</label>
        <input type="date" class="form-control" name="fecha_2" value="<?php echo $fecha_f2; ?>" maxlength="50" id="fecha4" placeholder="Ingresar fecha fin" >
        

            </div>
            <div class="modal-footer">
              <input class="btn btn-primary" type="submit"  value="Modificar"> 
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
              </form>
            </div>
          </div>
        </div>
      </div><!-- fin modal Modificar-->

        <div class='col-12'>
        <br>
          <table class='ConBorde tabla1'>
          <center><h4>Tareas Realizadas</h4></center>
            <thead>
              <tr>
                <th>N°</th>
                <th>Tarea</th>
                <th>Accion</th>
                <th>Accion</th>
              </tr>
            </thead>
            <tbody>
              
        <?php
        
        $consultaDet = "SELECT * FROM t_tareas where C_Id_Laboral=$idExp";
        $resultadoDet=mysqli_query($mysqli,$consultaDet);
                  
        while($filaDet=mysqli_fetch_row($resultadoDet))
        {
          $id_Ta=$filaDet[0];
          $nombre_Det=$filaDet[1];
          echo "
                <tr>
                <td>".$cont."</td>
                <td><form action='../conecta/edTa.php' method='post' accept-charset='utf-8'><input type='text' maxlength='100' value='".$nombre_Det."' name='tarea' class='form-control-file' id='exampleFormControlFile1' required=''></td>

                <td>
                <input type='hidden' value='".$id_Ta."' name='id'>
                <input class='btn btn-warning' type='submit'  value='Modificar'>
                </form></td>
                <td>
                <form action='../conecta/elTa.php' method='post' accept-charset='utf-8'>
                <input type='hidden' value='".$id_Ta."' name='id'>
                <input class='btn btn-danger' type='submit'  value='Eliminar'>
                </form></td>
                </tr>
              
          ";
          
          
          
        $cont = $cont+1;} //fin 2° while
      echo "
            </tbody>";
         

?>
</table>
<br>
<center><h4>Agregar nueva tarea</h4></center>
          <table class='ConBorde tabla1'>
          <tr>
            <th>Tarea</th>
             
            <th>Accion</th>             
          </tr>
          <tr>
            <form action="../conecta/inTa.php" method='post' accept-charset='utf-8'>
              <input type="hidden" value="<?php echo $idExp ?>" name="id">
            <td>
              <input type='text' name='detalle' maxlength='100' class='form-control-file' id='exampleFormControlFile1' required="">
            </td>
            
            <td>
              <input class='btn btn-primary' type='submit'  value='Agregar'>
            </td>
            </form>
          </tr>
                          
          </table>
          </div>
<br>
    </div> <!--Fin row  -->
<?php

      } //fin 1° while
      mysqli_free_result($resultadoExp);
      mysqli_free_result($resultadoDet);

?>
  </div> <!-- fin div m -->
    </div> <!-- fin de <div class="CurFon col-12">  --> 




<br>
    <div class="CurFon col-12">
      <center>
      <button class="activar2 btn btn-primary btn-lg btn-block" id="mostrar2">Mostrar Educacion</button><button class="activar2 btn btn-secondary btn-lg btn-block" id="ocultar2">Ocultar Educacion</button></center>
      <div id="e">
      <center><h3>Educacion</h3></center>
         <center> <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#agregarEd">
          Agregar Nueva Educacion
        </button></center>

        <div class="modal fade" id="agregarEd" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Nueva Educacion</h5>
              
            </div>
            <div class="modal-body">
        <form enctype="multipart/form-data" action="../conecta/inEd.php" method="post">
        <center><h4>Agregar Nueva Educacion</h4></center>
      
        <label for="exampleFormControlFile1">Subir Imagen</label>
        <input type="file" name="imagen" class="form-control-file" id="exampleFormControlFile1" required="">
     

        <br>
        <label for="formGroupExampleInput2">Estudios</label>
        <input type="text" class="form-control" name="estudios" maxlength="50" id="titulo" placeholder="Ingresar Puesto" required="">
        <br>
        <label for="formGroupExampleInput2">Institucion</label>
        <input type="text" class="form-control" name="institucion" maxlength="50" id="titulo" placeholder="Ingresar Empresa" required="">
        <br>

         <label for="sel1">Seleccionar tipo de institucion</label>
          <select name="tipo" class="form-control" id="sel1">

            <?php 
      $consultatipousu = "SELECT * FROM t_tipo_inst order by C_Id_Tipo_Inst asc";
      $resultadotipousu=mysqli_query($mysqli,$consultatipousu);
      
      while($filatipo=mysqli_fetch_row($resultadotipousu))
      { $cont=1;


          $idtipo=$filatipo[0];
          $nombretipo=$filatipo[1];

              ?><option value="<?php echo $idtipo; ?>"><?php echo $nombretipo; ?></option><?php
          
       } 
       ?>      
          </select>
<br>
        
        <label id="fecha1" for="formGroupExampleInput2">Fecha de inicio</label>
        <input type="date" class="form-control" name="fecha_1" maxlength="50" id="fecha2" placeholder="Ingresar fecha inicio" >
        <br>
        <label id="fecha3" for="formGroupExampleInput2">Fecha de Termino</label>
        <input type="date" class="form-control" name="fecha_2" maxlength="50" id="fecha4" placeholder="Ingresar fecha fin" >

            </div>
            <div class="modal-footer">
              
              <input type="hidden" value="" name="id">
              <input type="submit" value="Agregar" class="btn btn-primary">
              
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
              </form>
            </div>
          </div>
        </div>
      </div>
  </div>
                      <br>
      <?php 
      $consultaEd = "SELECT C_Id_Educacion, C_Carrera, C_Institucion, DATE_FORMAT(C_Fecha_I,'%d/%m/%Y'), DATE_FORMAT(C_Fecha_F,'%d/%m/%Y'), C_Img_Ed , DATE_FORMAT(C_Fecha_I,'%Y-%m-%d'), DATE_FORMAT(C_Fecha_F,'%Y-%m-%d') , C_Id_Tipo_Inst FROM t_educacion order by C_Fecha_F Desc";
      $resultadoEd=mysqli_query($mysqli,$consultaEd);
      while($filaEd=mysqli_fetch_row($resultadoEd))
      {

        $idEdu=$filaEd[0];
        $nombreCa=$filaEd[1];
        $nombreInst=$filaEd[2];
        $fecha_i_Ed=$filaEd[3];
        $fecha_f_Ed=$filaEd[4];
        $imgEd=$filaEd[5];
        $fecha_i_Ed2=$filaEd[6];
        $fecha_f_Ed2=$filaEd[7];
        $t=$filaEd[8];
        $modEdu="modED".$idEdu;
        
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

        <p>Fecha de Inicio: ".$fecha_i_Ed."</p>
        <p>Fecha de Termino: ".$fecha_f_Ed."</p>
        
        <table>
       <tr>
      
      <td>Opciones:
      </td>
      <td>
        <button type='button' class='btn btn-warning' data-toggle='modal' data-target='#".$modEdu."'>
         Modificar Educacion
        </button>
      </td>
      <td>
        <form action='../conecta/ElEdu.php' method='post' accept-charset='utf-8'>
        <input type='hidden' value='".$idEdu."' name='id'>
        <input class='btn btn-danger' type='submit'  value='Eliminar Educacion'>
        </form>
        </td>
    </tr>
    </table>
        </div>

        
        

    ";
    ?>

<div class="modal fade" id="<?php echo $modEdu ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Modificar Experiencia</h5>
              
            </div>
            <div class="modal-body">
              
        <form enctype="multipart/form-data" action="../conecta/EditarEdu.php" method="post">
        <input type="hidden" value="<?php echo$idEdu ?>" name="id">
        <?php echo "<img class='ImgCon' src='data:image/jpeg;base64,".base64_encode($imgEd)."'/>" ?>
              
      
        <label for="exampleFormControlFile1">Subir Imagen</label>
        <input type="file" name="imagen" class="form-control-file" id="exampleFormControlFile1" >
     

        <br>
        <label for="formGroupExampleInput2">Estudios</label>
        <input type="text" class="form-control" name="estudio" value="<?php echo $nombreCa; ?>" maxlength="50" id="titulo" placeholder="Ingresar Estudios" required="">
        <br>
        <label for="formGroupExampleInput2">Institucion</label>
        <input type="text" class="form-control" name="institucion" value="<?php echo$nombreInst; ?>" maxlength="50" id="titulo" placeholder="Ingresar Institucion" required="">
        <br>

         <label for="sel1">Seleccionar tipo de institucion</label>
          <select name="tipo" class="form-control" id="sel1">

            <?php 
      $consultatipousu = "SELECT * FROM t_tipo_inst order by C_Id_Tipo_Inst asc";
      $resultadotipousu=mysqli_query($mysqli,$consultatipousu);
      
      while($filatipo=mysqli_fetch_row($resultadotipousu))
      { $cont=1;


          $idtipo=$filatipo[0];
          $nombretipo=$filatipo[1];

          
          if ($t==$idtipo) 
          {
            ?><option value="<?php echo $idtipo; ?>" selected><?php echo $nombretipo; ?></option><?php
          }
          if ($t!=$idtipo) 
          {          
              ?><option value="<?php echo $idtipo; ?>"><?php echo $nombretipo; ?></option><?php
          }
       } 
       ?>      
          </select>
      <br>
        
        <label id="fecha1" for="formGroupExampleInput2">Fecha de inicio</label>
        <input type="date" class="form-control" name="fecha_1" value="<?php echo $fecha_i_Ed2; ?>" maxlength="50" id="fecha2" placeholder="Ingresar fecha inicio" >
        <br>
        <label id="fecha3" for="formGroupExampleInput2">Fecha de Termino</label>
        <input type="date" class="form-control" name="fecha_2" value="<?php echo $fecha_f_Ed2; ?>" maxlength="50" id="fecha4" placeholder="Ingresar fecha fin" >
        

            </div>
            <div class="modal-footer">
              <input class="btn btn-primary" type="submit"  value="Modificar"> 
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
              </form>
            </div>
          </div>
        </div>
      </div>



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
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

<script src="bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.min.js"></script>
<script src="main.js"></script>
<script>
$(document).ready(function() {

$("#fecha5").hide();
$("#fecha6").hide();
  
  $( '#cbox1' ).on( 'click', function() 
  {
    
    if( $(this).is(':checked') )
    {
        
        // Hacer algo si el checkbox ha sido seleccionado
        
        $("#web").hide();
        $("#web2").hide();

    } else {
        
        // Hacer algo si el checkbox ha sido deseleccionado
        $("#web").show();
        $("#web2").show();

    }

  });

  $( '#cbox2' ).on( 'click', function() 
  {
    
    if( $(this).is(':checked') )
    {
        
        // Hacer algo si el checkbox ha sido seleccionado
        
        $("#fecha1").hide();
        $("#fecha2").hide();
        $("#fecha3").hide();
        $("#fecha4").hide();
        $("#fecha5").show();
        $("#fecha6").show();


    } else {
        
        // Hacer algo si el checkbox ha sido deseleccionado
        $("#fecha1").show();
        $("#fecha2").show();
        $("#fecha3").show();
        $("#fecha4").show();
        $("#fecha5").hide();
        $("#fecha6").hide();

    }

  });

});

</script>

<!-- Optionally, you can add Slimscroll and FastClick plugins.
     Both of these plugins are recommended to enhance the
     user experience. -->
</body>
</html>