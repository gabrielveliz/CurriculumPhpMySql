<?php
include 'conecta/conec.php';
?>
<!DOCTYPE html>
<html>
<head>
  <title></title>
  <style type="text/css">
    *{
      font-family: times;
      padding: 0;
      margin: 0;
    }
    h3,h4
    {
      
    }
    table
    {
      
      margin: auto; 
    }
    p{float: left;}
    td
    { 
      border-top: 1px dashed #00897B;
     
      padding: 0 25px 0 25px;}
  .T{
      text-align: center;
      text-decoration: underline;
    }
  .p1
    {
      width: 100px;
      text-align:right;    }
  .p2
    {
      width: 280px;
       border-left: 1px solid #00897B;
    }
    .cop
    {
      color: grey;
      text-align: center;
    }

    div
    {
      padding-left: 30px;
      

      width: 100%;
    }

  </style>
</head>
<body>
 
  <div>
    <p class="cop">Este documento fue generado con Html2Pdf</p>
<?php
$IdPerfil=1;
$consultaPerfil = "SELECT * FROM t_perfil WHERE C_Id_Perfil = $IdPerfil";
$resultadoPerfil = $mysqli->query($consultaPerfil);

$fila = $resultadoPerfil->fetch_assoc();
$resulNombre = $fila['C_Nombre'];
$resulTitulo = $fila['C_Titulo_Pro'];
$resulUniversidad = $fila['C_Unive_Pro'];
$resulObjetivo = $fila['C_Objetivo'];
$resultImg = $fila['C_Img_Perfil'];


             echo " <br>
              <h3 class='T'>".$resulNombre."</h3>
              <h4  class='T'>".$resulTitulo." - ".$resulUniversidad."</h4>
              ";
echo "<br><h3 class='sub'>Educación</h3><table>";

  $consultaEd = "SELECT C_Id_Educacion, C_Carrera, C_Institucion, DATE_FORMAT(C_Fecha_I,'%m/%Y'), DATE_FORMAT(C_Fecha_F,'%m/%Y'), C_Img_Ed FROM t_educacion order by C_Fecha_F Desc";
  $resultadoEd=mysqli_query($mysqli,$consultaEd);
  while($filaEd=mysqli_fetch_row($resultadoEd))
  {
    
    $nombreCa=$filaEd[1];
    $nombreInst=$filaEd[2];
    $fecha_i_Ed=$filaEd[3];
    $fecha_f_Ed=$filaEd[4];
    $imgEd=$filaEd[5];

    echo "
  <tr>
    <td class='p1'><h4>".$fecha_i_Ed;
    if (is_null($fecha_i_Ed) or is_null($fecha_f_Ed)) {
      
    }else
    {
      echo " - ";
    }
  
    echo $fecha_f_Ed."
    </h4></td>
    
    <td class='p2'><h3>".$nombreInst."</h3><h4>
    ".$nombreCa."</h4></td>
  </tr>
";
}
echo "</table>";

echo "<br><h3 class='sub'>Experiencia Laboral</h3><table>";

  $consultaExp = "SELECT C_Id_Laboral, C_Puesto, C_Empresa, C_Link,DATE_FORMAT(C_Fecha_I,'%m/%Y'), DATE_FORMAT(C_Fecha_F,'%m/%Y'), C_Img_Laboral FROM t_laboral order by C_Fecha_F Desc";
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

if ($fecha_i=="00/0000") {
  $fecha_i=null;
}
if ($fecha_f=="12/9999") {
  $fecha_f="Actualidad";
}
    echo "<tr>
    <td class='p1'><h4>  ".$fecha_i;
    
    if (is_null($fecha_i) or is_null($fecha_f) ) {
      
    }else
    {
      echo " - ";
    }
  
    echo $fecha_f;
    echo "</h4></td>
    ";
    echo "<td class='p2'><h3>".$nombre." ";
      echo " - ".$empresa."</h3>";

    $consultaDet = "SELECT * FROM t_tareas where C_Id_Laboral=$idExp";
    $resultadoDet=mysqli_query($mysqli,$consultaDet);
              
    while($filaDet=mysqli_fetch_row($resultadoDet))
    {
      $nombre_Det=$filaDet[1];
      echo "<h4>-".$nombre_Det."</h4>";
    }
  echo "</td>
</tr>";
  }


echo "</table><br><h3 class='sub'>Conocimientos</h3>
<table>";



            $consultaCono = "SELECT * FROM t_conocimientos";
            $resultadoCono=mysqli_query($mysqli,$consultaCono);
            while($filaCono=mysqli_fetch_row($resultadoCono))
            {
              $id=$filaCono[0];
              $nombre=$filaCono[1];
              echo "<tr>
    <td class='p1'><h3>".$nombre."</h3></td>
    <td class='p2'>";
              $consultaCono2 = "SELECT * FROM t_conocimientos_detalle where C_Id_Conocimientos=$id";
              $resultadoCono2=mysqli_query($mysqli,$consultaCono2);
              
              while($filaCono2=mysqli_fetch_row($resultadoCono2))
              {
                $nombre_detalle=$filaCono2[1];
                echo "<h4>-".$nombre_detalle."</h4>";
              }
               echo "</td></tr>";
              
            }

echo "</table>";
?>
<p class="cop">Este documento fue generado con Html2Pdf</p>
</div>
</body>
</html>
