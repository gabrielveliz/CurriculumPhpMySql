<?php

include 'conec.php';

$id=$_POST['id'];
if (empty($id)) 
{
	      	
}	    
else
{	
	
	$borrar2=$mysqli->prepare("DELETE FROM t_conocimientos_detalle WHERE C_Id_Conocimientos=? ");
	$borrar2->bind_Param('i',$id);
	$borrar2->execute();

	$borrar=$mysqli->prepare("DELETE FROM t_conocimientos WHERE C_Id_Conocimientos=? ");
	$borrar->bind_Param('i',$id);
	$borrar->execute();

	
	
	
}

$mysqli->close();
header("location: ../control/inicio.php");

?>