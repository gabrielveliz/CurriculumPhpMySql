<?php
include("conec.php");

$id=$_POST['id'];
$usuario=$_POST['usuario'];
$nombre=$_POST['nombre'];
$cont_ant=$_POST['cont_ant'];
$cont_nu=$_POST['cont_nu'];
$cont_nu_rep=$_POST['cont_rep'];
$imagen=$_FILES["imagen"]["tmp_name"];

$consultaUser = "SELECT * FROM t_usu WHERE C_Id_Usu = $id";
$resultadoUser = $mysqli->query($consultaUser);
$fila = $resultadoUser->fetch_assoc();
$antigua= $fila['pas'];

if (empty($id)==FALSE || empty($usuario)==FALSE || empty($nombre)==FALSE) 
{
	

    if ($cont_nu==$cont_nu_rep && $antigua==$cont_ant && empty($cont_nu)==FALSE && empty($cont_nu_rep)==FALSE) 
    {
    	$password=$cont_nu;
    	$editar="update t_usu set pas='$password' where C_Id_Usu=$id";
    	$consulta = $mysqli->query($editar);
    }

	//Verifica si se ha subido la imagen
    if (is_uploaded_file($_FILES["imagen"]["tmp_name"]))
    {
    //Verifica si el el formato de la imagen es JPEG o JPG
        if ($_FILES["imagen"]["type"]=="image/jpeg"|| $_FILES["imagen"]["type"]=="image/jpg" || $_FILES["imagen"]["type"]=="image/png" )
        {
	        $imagen=addslashes(file_get_contents($imagen));
	        $editar="update t_usu set C_Nombre_Usuario='$usuario',C_Nombre_Comp='$nombre',C_Img_Usu='$imagen' where C_Id_Usu=$id";
	         $consulta = $mysqli->query($editar);
        }
    }
    else
    {
        $editar="update t_usu set C_Nombre_Usuario='$usuario',C_Nombre_Comp='$nombre' where C_Id_Usu=$id";
        $consulta = $mysqli->query($editar);
    }
}
$mysqli->close();
header("location: ../control/perfil.php");

?>