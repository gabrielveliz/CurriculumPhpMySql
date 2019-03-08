<?php

include 'conec.php';

$id=$_POST['id'];
if (empty($id)) 
{
	  header("location: ../control/curriculum.php");      	
}	    
else
{	
	
	$borrar=$mysqli->prepare("DELETE FROM t_educacion WHERE C_Id_Educacion=? ");
	$borrar->bind_Param('i',$id);
	$borrar->execute();
	
	$mysqli->close();
	header("location: ../control/curriculum.php");
	
}

?>