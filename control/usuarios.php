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
  <link rel="stylesheet" href="css/main.css">

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
       
        <li><a href="perfil.php"><i class="fa icon-user-tie"></i> <span>Perfil</span></a></li>
        <li class="active"><a href="usuarios.php"><i class="fa icon-user"></i> <span>Usuarios</span></a></li>
        
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
        <center><h1>Lista de Usuarios</h1></center>
        <br>
        <center><button type="button" class="btn btn-primary" data-toggle="modal" data-target="#ing">
         Ingresar Nuevo Usuario
        </button></center>
        <br>
        <div class="modal fade" id="ing" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Ingresar Usuario</h5>
              
            </div>
            <div class="modal-body">
          
              <form enctype="multipart/form-data" action="../conecta/InUs.php" method="post">
              
        <label for="exampleFormControlFile1">Subir Imagen</label>
        <input type="file" name="imagen" class="form-control-file" id="exampleFormControlFile1" >
        <br>    
        <label for="formGroupExampleInput2">Usuario</label>
        <input type="text" class="form-control" name="usuario" value="" maxlength="50" id="titulo" placeholder="Ingresar usuario" required="">
        <br>
        <label for="formGroupExampleInput2">Nombre Completo</label>
        <input type="text" class="form-control" name="nombre" value="" maxlength="50" id="titulo" placeholder="Ingresar nombre" required="">
        <br>
        <label for="formGroupExampleInput2">Contraseña</label>
        <input type="password" class="form-control" name="cont" value="" maxlength="50" id="titulo" placeholder="Ingresar contraseña">
        <label for="formGroupExampleInput2">Repetir Contraseña</label>
        <input type="password" class="form-control" name="rep" value="" maxlength="50" id="titulo" placeholder="repetir contraseña">
        <br>

         <label for="sel1">Tipo de Usuario</label>
          <select name="tipo" class="form-control" id="sel1">

            <?php 
      $consultatipousu = "SELECT * FROM t_tipo_usu order by C_Tipo asc";
      $resultadotipousu=mysqli_query($mysqli,$consultatipousu);
      
      while($filatipo=mysqli_fetch_row($resultadotipousu))
      {$cont=1;


        $idtipo=$filatipo[0];
        $nombretipo=$filatipo[1];

      ?>
            <option value="<?php echo $idtipo; ?>"><?php echo $nombretipo; ?></option>
      <?php
       } 
       ?>      

          </select>
        <br>

        

            </div>
            <div class="modal-footer">
              <input class="btn btn-primary" type="submit"  value="Ingresar"> 
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
              </form>
            </div>
          </div>
        </div>
      </div><!-- fin modal Modificar-->


    <div class="row">
      <div class="col-12">
        <table class='ConBorde tabla1'>
          <tr>
            <th>Usuario</th>
            <th>Nombre</th>
            <th>Contraseña</th>
            <th>Tipo</th>
            <th>Opcion</th>
            <th>Opcion</th>

          </tr>
      
<?php
        $consultaUser2 = "SELECT * FROM t_usu join t_tipo_usu on t_usu.C_Id_Tipo_Usu=t_tipo_usu.C_Id_Tipo_Usu";
        $resultadoUser2 = $mysqli->query($consultaUser2);
        while($filaUs=mysqli_fetch_row($resultadoUser2))
        {   
            $id_us=$filaUs[0];
            $nombreUs=$filaUs[1];
            $nombrePe=$filaUs[2];
            $img=$filaUs[4];
            $op=$filaUs[5];
            $tipo=$filaUs[7];
            $mod_mod="mod_mod".$id_us;
            $mod_el="mod_el".$id_us;


            echo "<tr>
                  <td>".$nombreUs."</td>
                  <td>".$nombrePe."</td>
                  <td>******</td>
                  <td>".$tipo."</td>";
                  ?>
        <td><button type="button" class="btn btn-warning" data-toggle="modal" data-target="#<?php echo $mod_mod ?>">
         Modificar 
        </button></td>
        <td><button type="button" class="btn btn-danger" data-toggle="modal" data-target="#<?php echo $mod_el ?>">
          Eliminar 
        </button></td>
                  <?php
                  echo "</tr>
            ";

        ?>
        <!-- inicio modal eliminar-->
        <div class="modal fade" id="<?php echo $mod_el ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Mensaje de Advertencia</h5>
              
            </div>
            <div class="modal-body">
              <?php echo "<img class='ImgCon' src='data:image/jpeg;base64,".base64_encode($img)."'/>" ?>
             <h4>¿Está seguro que desea eliminar el usuario "<?php echo $nombreUs; ?>" de "<?php echo $nombrePe; ?>"?</h4>
             
              
              
            </div>
            <div class="modal-footer">
              <form action="../conecta/ElUs.php" method="post">
              <input type="hidden" value="<?php echo $id_us ?>" name="id">
              <input type="submit" value="Eliminar" class="btn btn-danger">
              
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
              </form>
            </div>
          </div>
        </div>
      </div><!-- fin modal eliminar-->
      <!-- Modal para modificar categoria-->
      <div class="modal fade" id="<?php echo $mod_mod ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Modificar Usuario</h5>
              
            </div>
            <div class="modal-body">
          
              <form enctype="multipart/form-data" action="../conecta/EdListUs.php" method="post">
              <input type="hidden" value="<?php echo $id_us ?>" name="id">
              <?php echo "<img class='ImgCon' src='data:image/jpeg;base64,".base64_encode($img)."'/>" ?>
        <label for="exampleFormControlFile1">Subir Imagen</label>
        <input type="file" name="imagen" class="form-control-file" id="exampleFormControlFile1" >
        <br>  
        <label for="formGroupExampleInput2">Usuario</label>
        <input type="text" class="form-control" name="usuario" value="<?php echo $nombreUs; ?>" maxlength="50" id="titulo" placeholder="Ingresar Usuario" required="">
        <br>
        <label for="formGroupExampleInput2">Nombre Completo</label>
        <input type="text" class="form-control" name="nombre" value="<?php echo $nombrePe; ?>" maxlength="50" id="titulo" placeholder="Ingresar Nombre" required="">
        <br>
        <label for="formGroupExampleInput2">Cambiar contraseña</label>
        <input type="password" class="form-control" name="Nueva" value="" maxlength="50" id="titulo" placeholder="Nueva Contraseña">
        <label for="formGroupExampleInput2">Repetir contraseña</label>
        <input type="password" class="form-control" name="repetir" value="" maxlength="50" id="titulo" placeholder="Repetir Contraseña">
        <br>

         <label for="sel1">Tipo de Usuario</label>
          <select name="tipo" class="form-control" id="sel1">

            <?php 
      $consultatipousu = "SELECT * FROM t_tipo_usu order by C_Tipo asc";
      $resultadotipousu=mysqli_query($mysqli,$consultatipousu);
      
      while($filatipo=mysqli_fetch_row($resultadotipousu))
      { $cont=1;


          $idtipo=$filatipo[0];
          $nombretipo=$filatipo[1];

          if ($op==$idtipo) 
          {
              ?><option value="<?php echo $idtipo; ?>" selected><?php echo $nombretipo; ?></option><?php
          }
         if($op!=$idtipo)
          {
        
             ?><option value="<?php echo $idtipo; ?>"><?php echo $nombretipo; ?></option><?php
        
          }
       } 
       ?>      
          </select>
        <br>

        

            </div>
            <div class="modal-footer">
              <input class="btn btn-primary" type="submit"  value="Modificar"> 
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
              </form>
            </div>
          </div>
        </div>
      </div><!-- fin modal Modificar-->
        <?php
        }
        mysqli_free_result($resultadoUser2);
?>
        </table>
      </div>
    </div>

<!--*********************** Inicio seccion Tipos de usuario******************************************************-->
<!--*********************** Inicio seccion Tipos de usuario******************************************************-->
<!--*********************** Inicio seccion Tipos de usuario******************************************************-->
<!--*********************** Inicio seccion Tipos de usuario******************************************************-->
    <center><h1>Tipos de Usuarios</h1></center>

    <br>
        <center><button type="button" class="btn btn-primary" data-toggle="modal" data-target="#ingtipo">
         Ingresar Nueva Categoria de Usuarios
        </button></center>
        <br>
        <div class="modal fade" id="ingtipo" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Ingresar Nueva Categoria</h5>
              
            </div>
            <div class="modal-body">
          
              <form enctype="multipart/form-data" action="../conecta/InTipoUs.php" method="post">
                  
        <label for="formGroupExampleInput2">Nombre Categoria</label>
        <input type="text" class="form-control" name="nombre" value="" maxlength="50" id="titulo" placeholder="Ingresar Nombre" required="">
        
        <br>

         <label for="sel1">Ver Usuarios</label>
          <select name="ver" class="form-control" id="sel1">
            <option value="1">SI</option> 
            <option value="2">NO</option>     
          </select>
        <br>
        <label for="sel2">Modificar</label>
          <select name="modificar" class="form-control" id="sel2">
            <option value="1">SI</option> 
            <option value="2">NO</option>     
          </select>
        <br>
        <label for="sel3">Eliminar</label>
          <select name="eliminar" class="form-control" id="sel3">
            <option value="1">SI</option> 
            <option value="2">NO</option>     
          </select>
        <br>

        

            </div>
            <div class="modal-footer">
              <input class="btn btn-primary" type="submit"  value="Ingresar"> 
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
              </form>
            </div>
          </div>
        </div>
      </div><!-- fin modal Modificar-->


     <div class="row">
      <div class="col-12">
        <table class='ConBorde tabla1'>
          <tr>
            <th>Nombre</th>
            <th>Ver Lista Usuarios</th>
            <th>Modificar</th>
            <th>Eliminar</th>
            <th>Opcion</th>
            <th>Opcion</th>

          </tr>

    <?php 
      $consultatipousu = "SELECT * FROM t_tipo_usu order by C_Tipo asc";
      $resultadotipousu=mysqli_query($mysqli,$consultatipousu);
      
      while($filatipo=mysqli_fetch_row($resultadotipousu))
      {
          $idtipo=$filatipo[0];
          $nombretipo=$filatipo[1];
          $modificar=$filatipo[2];
          $eliminar=$filatipo[3];
          $ver=$filatipo[4];
          $mod_ti1="modmod".$idtipo;
          $mod_ti2="modmod2".$idtipo;

          echo "<tr>
                  <td>".$nombretipo."</td>
                  <td>".$ver."</td>
                  <td>".$modificar."</td>
                  <td>".$eliminar."</td>";
        

      ?>
       <td><button type="button" class="btn btn-warning" data-toggle="modal" data-target="#<?php echo $mod_ti1 ?>">
         Modificar 
        </button></td>
        <td><button type="button" class="btn btn-danger" data-toggle="modal" data-target="#<?php echo $mod_ti2 ?>">
          Eliminar 
        </button></td>
      </tr>
<!-- inicio modal eliminar-->
        <div class="modal fade" id="<?php echo $mod_ti2 ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Mensaje de Advertencia</h5>
              
            </div>
            <div class="modal-body">
             
             <h4>¿Está seguro que desea eliminar el tipo de usuario "<?php echo $nombretipo; ?>" ?</h4>
             <p style="color: red;">Esta accion eliminara todos los usuarios asociados a esta categoria.</p>
             
              
              
            </div>
            <div class="modal-footer">
              <form action="../conecta/ElTipoUs.php" method="post">
              <input type="hidden" value="<?php echo $idtipo ?>" name="id">
              <input type="submit" value="Eliminar" class="btn btn-danger">
              
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
              </form>
            </div>
          </div>
        </div>
      </div><!-- fin modal eliminar-->
      <!-- Modal para modificar categoria-->
      <div class="modal fade" id="<?php echo $mod_ti1 ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Modificar tipo de Usuario</h5>
              
            </div>
            <div class="modal-body">
          
              <form enctype="multipart/form-data" action="../conecta/EdTipoUs.php" method="post">
              <input type="hidden" value="<?php echo $idtipo ?>" name="id">
              
        <label for="formGroupExampleInput2">Nombre</label>
        <input type="text" class="form-control" name="nombre" value="<?php echo $nombretipo; ?>" maxlength="50" id="titulo" placeholder="Ingresar Usuario" required=""> 
        <br>  
        

         <label for="sel1">Ver Usuarios</label>
          <select name="ver" class="form-control" id="sel1">
            
            <?php if ($ver==1) {
              echo "<option value='1' selected>SI</option>";
              echo "<option value='2' >NO</option>";
            }
            else
            {
              echo "<option value='1' >SI</option>";
              echo "<option value='2' selected>NO</option>";
            }
              ?>
          </select>


           <label for="sel2">Modificar</label>
          <select name="modificar" class="form-control" id="sel2">
            <?php if ($modificar==1) {
              echo "<option value='1' selected>SI</option>";
              echo "<option value='2' >NO</option>";
            }
            else
            {
              echo "<option value='1' >SI</option>";
              echo "<option value='2' selected>NO</option>";
            }
              ?>
          </select>


           <label for="sel3">Eliminar</label> 
          <select name="eliminar" class="form-control" id="sel3">
            <?php if ($eliminar==1) {
              echo "<option value='1' selected>SI</option>";
              echo "<option value='2' >NO</option>";
            }
            else
            {
               echo "<option value='1' >SI</option>";
               echo "<option value='2' selected>NO</option>";
            }
              ?>
          </select>
        <br>

        

            </div>
            <div class="modal-footer">
              <input class="btn btn-primary" type="submit"  value="Modificar"> 
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
              </form>
            </div>
          </div>
        </div>
      </div><!-- fin modal Modificar-->
        <?php } ?>

      </table>
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