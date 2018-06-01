<?php

include 'conec.php';

$id=$_POST['id'];
if (empty($id)) 
{
	  header("location: ../control/inicio.php");      	
}	    
else
{	
	
	$borrar=$mysqli->prepare("DELETE FROM t_conocimientos_detalle WHERE C_Id_Cono_Det=? ");
	$borrar->bind_Param('i',$id);
	$borrar->execute();
	
	$mysqli->close();
	header("location: ../control/inicio.php");
	
}

?>