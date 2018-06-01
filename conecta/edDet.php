<?php
include 'conec.php';

$id=$_POST['id'];
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
		$insertar=$mysqli->prepare("update t_conocimientos_detalle set C_Conocimiento=? , C_Porcentaje=? where C_Id_Cono_Det= ? ");
		$insertar->bind_Param('sii', $detalle,$porcentaje,$id);
		$insertar->execute();

		

		
			header("location: ../control/inicio.php");
	}
	else
	{
		header("location: ../control/inicio.php");
	}
}

?>