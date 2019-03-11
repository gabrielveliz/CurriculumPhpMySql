<?php
include 'conec.php';

$id=$_POST['id'];
 
if (empty($id)) 
{
     	
}	    
else
{	
		$eliminar=$mysqli->prepare("DELETE FROM t_usu where C_Id_Tipo_Usu= ? ");
		$eliminar->bind_Param('i', $id);
		$eliminar->execute();

		$eliminar2=$mysqli->prepare("DELETE FROM t_tipo_usu where C_Id_Tipo_Usu= ? ");
		$eliminar2->bind_Param('i', $id);
		$eliminar2->execute();

}

$mysqli->close();
header("location: ../control/usuarios.php");
?>