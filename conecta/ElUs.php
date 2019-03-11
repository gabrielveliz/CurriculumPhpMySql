<?php

include 'conec.php';

$id=$_POST['id'];
if (empty($id)) 
{
	  header("location: ../control/usuarios.php");      	
}	    
else
{	
	
	$borrar=$mysqli->prepare("DELETE FROM t_usu WHERE C_Id_Usu=? ");
	$borrar->bind_Param('i',$id);
	$borrar->execute();
	
	$mysqli->close();
	header("location: ../control/usuarios.php");
	
}

?>