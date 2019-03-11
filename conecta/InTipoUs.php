<?php
include 'conec.php';

$nombre=$_POST['nombre'];
$ver=$_POST['ver'];
$modificar=$_POST['modificar'];
$eliminar=$_POST['eliminar'];


if (empty($nombre) or empty($ver)  or empty($modificar) or empty($eliminar)) 
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
		$insertar=$mysqli->prepare("INSERT INTO t_tipo_usu (C_Tipo, C_Modificar,C_Eliminar,C_Ver_Usuarios) VALUES (?,?,?,?)");
		$insertar->bind_Param('siii', $nombre,$modificar,$eliminar,$ver);
		$insertar->execute();

}

$mysqli->close();
header("location: ../control/usuarios.php");
?>