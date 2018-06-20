<?php

include 'conec.php';

$id=$_POST['id'];
if (empty($id)) 
{
	      	
}	    
else
{	
	
	$borrar=$mysqli->prepare("DELETE FROM t_Tareas WHERE C_Id_Tareas=? ");
	$borrar->bind_Param('i',$id);
	$borrar->execute();
	
	$mysqli->close();
	
}
header("location: ../control/curriculum.php");  

?>