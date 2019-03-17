<?php
include 'conec.php';

$usuario=$_POST['usuario'];
$nombre=$_POST['nombre'];
$pas=$_POST['cont'];
$rep=$_POST['rep'];
$tipo=$_POST['tipo'];
$imagen=$_FILES["imagen"]["tmp_name"];

echo $usuario." ".$nombre." ".$pas." ".$rep." ".$tipo." ".$imagen;

//verificamos si las principales variables estan definidas
if (empty($usuario) or empty($nombre) or empty($pas) or empty($rep) or empty($tipo) or $pas!=$rep) 
{

}	    
else
{	
	if (($_FILES["imagen"]["type"]=="image/jpeg"|| $_FILES["imagen"]["type"]=="image/jpg" || $_FILES["imagen"]["type"]=="image/png") and is_uploaded_file($_FILES["imagen"]["tmp_name"]) )
	{
	    
		$imagen=addslashes(file_get_contents($imagen));

		$insertar="INSERT INTO t_usu (C_Nombre_Usuario, C_Nombre_Comp, pas, C_Img_Usu, C_Id_Tipo_Usu) VALUES ('$usuario','$nombre','$pas','$imagen',$tipo)";
			$consulta = $mysqli->query($insertar);
  
	}
}


$mysqli->close();
header("location: ../control/usuarios.php");

?>
