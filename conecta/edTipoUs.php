<?php
include 'conec.php';

$id=$_POST['id'];
$nombre=$_POST['nombre'];
$ver=$_POST['ver'];
$modificar=$_POST['modificar'];
$eliminar=$_POST['eliminar'];


 
if (empty($nombre) or empty($id)  or empty($ver)  or empty($modificar) or empty($eliminar)) 
{
     	
}	    
else
{	
		
		if ($ver==2) {
			$ver=0;
		}
		if ($modificar==2) {
			$modificar=0;
		}
		if ($eliminar==2) {
			$eliminar=0;
		}
		$insertar=$mysqli->prepare("update t_tipo_usu set C_Tipo=? , C_Modificar=?, C_Eliminar=?, C_Ver_Usuarios=? where C_Id_Tipo_Usu= ? ");
		$insertar->bind_Param('siiii', $nombre,$modificar,$eliminar,$ver,$id);
		$insertar->execute();

}

$mysqli->close();
header("location: ../control/usuarios.php");
?>