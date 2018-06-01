<?php
include 'conec.php';

$idCo=$_POST['id'];
$detalle=$_POST['detalle'];
$porcentaje=$_POST['porcentaje'];

 
if (empty($detalle) or empty($porcentaje)) 
{
	  header("location: ../control/inicio.php");      	
}	    
else
{	
	if (is_numeric($porcentaje) and $porcentaje>=0 and $porcentaje<=100 ) 
	{
		$insertar=$mysqli->prepare("INSERT INTO t_conocimientos_detalle (C_Conocimiento, C_Porcentaje,C_Id_Conocimientos) VALUES (?,?,?)");
		$insertar->bind_Param('sii', $detalle,$porcentaje,$idCo);
		$insertar->execute();

			header("location: ../control/inicio.php");
		
	}
	else
	{
		header("location: ../control/inicio.php");
	}
	
	
}

?>
