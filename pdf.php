<?php
include 'conecta/conec.php';


$consultaPerfil = "SELECT * FROM t_perfil ";
$resultadosPerfil = $mysqli->query($consultaPerfil);


$IdPerfil=1;
$consultaPerfil = "SELECT * FROM t_perfil WHERE C_Id_Perfil = $IdPerfil";
$resultadoPerfil = $mysqli->query($consultaPerfil);

$filaPerfil = $resultadoPerfil->fetch_assoc();
$NombrePerfil = $filaPerfil['C_Nombre'];
$resulTitulo = $filaPerfil['C_Titulo_Pro'];
$resulUniversidad = $filaPerfil['C_Unive_Pro'];
$resulObjetivo = $filaPerfil['C_Objetivo'];
$resultImg = $filaPerfil['C_Img_Perfil'];


      
$consultaExp = "SELECT C_Id_Laboral, C_Puesto, C_Empresa, C_Link,DATE_FORMAT(C_Fecha_I,'%d/%m/%Y'), DATE_FORMAT(C_Fecha_F,'%d/%m/%Y'), C_Img_Laboral, DATE_FORMAT(C_Fecha_I,'%Y-%m-%d'),DATE_FORMAT(C_Fecha_F,'%Y-%m-%d') FROM t_laboral order by C_Fecha_F Desc";
 $resultadoExp=mysqli_query($mysqli,$consultaExp);
      
while($filaExp=mysqli_fetch_row($resultadoExp))
{	
	$cont=1;
    $idExp=$filaExp[0];
    $nombre=$filaExp[1];
    $empresa=$filaExp[2];
    $link=$filaExp[3];
    $fecha_i=$filaExp[4];
    $fecha_f=$filaExp[5];
    $imgExp=$filaExp[6];
    $fecha_i2=$filaExp[7];
    $fecha_f2=$filaExp[8];

	$consultaDet = "SELECT * FROM t_tareas where C_Id_Laboral=$idExp";
    $resultadoDet=mysqli_query($mysqli,$consultaDet);
                  
    while($filaDet=mysqli_fetch_row($resultadoDet))
    {
        $id_Ta=$filaDet[0];
        $nombre_Det=$filaDet[1];
    }
}

$consultaEd = "SELECT C_Id_Educacion, C_Carrera, C_Institucion, DATE_FORMAT(C_Fecha_I,'%d/%m/%Y'), DATE_FORMAT(C_Fecha_F,'%d/%m/%Y'), C_Img_Ed FROM t_educacion order by C_Fecha_F Desc";
$resultadoEd=mysqli_query($mysqli,$consultaEd);
while($filaEd=mysqli_fetch_row($resultadoEd))
{
    $nombreCa=$filaEd[1];
    $nombreInst=$filaEd[2];
    $fecha_i_Ed=$filaEd[3];
    $fecha_f_Ed=$filaEd[4];
    $imgEd=$filaEd[5];

}

echo '<img class="FotoPerfil" src="data:image/jpeg;base64,'.base64_encode($resultImg).'"/>';
                ?>
              <h4><?php echo $NombrePerfil ;?></h4>
              
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
              
            }
          
?>