<?php

include 'conec.php';

$id=$_POST['id'];
if (empty($id)) 
{
	  header("location: ../control/curriculum.php");      	
}	    
else
{	
	
	$borrar2=$mysqli->prepare("DELETE FROM t_tareas WHERE C_Id_Laboral=? ");
	$borrar2->bind_Param('i',$id);
	$borrar2->execute();

	$borrar=$mysqli->prepare("DELETE FROM t_laboral WHERE C_Id_Laboral=? ");
	$borrar->bind_Param('i',$id);
	$borrar->execute();

	
	$mysqli->close();
	header("location: ../control/curriculum.php");
	
}

?>