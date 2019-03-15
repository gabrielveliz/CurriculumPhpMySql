<?php
include 'conec.php';

$puesto=$_POST['puesto'];
$empresa=$_POST['empresa'];
$web=$_POST['web'];
$fecha_i=$_POST['fecha_1'];
$fecha_f=$_POST['fecha_2'];
$imagen=$_FILES["imagen"]["tmp_name"];
$tipo=1;

//Comprobando si los checkbox se encuentran definidos
if (isset($_POST['no_web'])) 
{
	$Check_Web=$_POST['no_web'];	
}
else
{
	$Check_Web="";
}

if (isset($_POST['no_fecha'])) 
{
	$Check_Fecha=$_POST['no_fecha'];	
}
else
{
	$Check_Fecha="";
}


//vaciando la variable que guarda el link en caso que el checkbox se encuentre activo
if (strcmp ($Check_Web , "no_web" ) == 0) 
{
  	$web="";
}
else
{
	$web=$_POST['web'];
}

//validando fechas
if (strcmp ($Check_Fecha , "no_fecha" ) == 0) 
{
	$fecha_f=$_POST['fecha_3'];
	$tipo=2;
}


//verificamos si las principales variables estan definidas
if (empty($puesto) or empty($empresa)) 
{
	     	
}	    
else
{	
		if (is_uploaded_file($_FILES["imagen"]["tmp_name"]))
	    {
	    //Verifica si el el formato de la imagen es JPEG o JPG
	        if ($_FILES["imagen"]["type"]=="image/jpeg"|| $_FILES["imagen"]["type"]=="image/jpg" || $_FILES["imagen"]["type"]=="image/png" )
	        {
	    
			        $imagen=addslashes(file_get_contents($imagen));
			        
			        if ($Check_Fecha="no_fecha"){
					
						$insertar="INSERT INTO t_laboral (C_Puesto, C_Empresa, C_Link, C_Fecha_F, C_Img_laboral, C_Id_Tipo_Laboral) VALUES ('$puesto','$empresa','$web','$fecha_f','$imagen',$tipo)";
						$consulta = $mysqli->query($insertar);
					}
					else
					{
						$insertar="INSERT INTO t_laboral (C_Puesto, C_Empresa, C_Link, C_Fecha_I, C_Fecha_F, C_Img_laboral, C_Id_Tipo_Laboral) VALUES ('$puesto','$empresa','$web','$fecha_i','$fecha_f','$imagen',$tipo)";
						$consulta = $mysqli->query($insertar);
					}
	        }
	    }
	 
	    
}


$mysqli->close();
header("location: ../control/curriculum.php");

?>
