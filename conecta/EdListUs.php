<?php
include("conec.php");

$id=$_POST['id'];
$usuario=$_POST['usuario'];
$nombre=$_POST['nombre'];

$cont_nu=$_POST['Nueva'];
$cont_nu_rep=$_POST['repetir'];
$tipo=$_POST['tipo'];
$imagen=$_FILES["imagen"]["tmp_name"];

$consultaUser = "SELECT * FROM t_usu WHERE C_Id_Usu = $id";
$resultadoUser = $mysqli->query($consultaUser);
$fila = $resultadoUser->fetch_assoc();


if (empty($id)==FALSE || empty($usuario)==FALSE || empty($nombre)==FALSE || empty($tipo)==FALSE) 
{
	# code...

    if ($cont_nu==$cont_nu_rep && empty($cont_nu)==FALSE && empty($cont_nu_rep)==FALSE) 
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
	        $editar="update t_usu set C_Nombre_Usuario='$usuario',C_Nombre_Comp='$nombre',C_Id_Tipo_Usu=$tipo ,C_Img_Usu='$imagen' where C_Id_Usu=$id";
	         $consulta = $mysqli->query($editar);
        }
    }
    else
    {
        $editar="update t_usu set C_Nombre_Usuario='$usuario',C_Nombre_Comp='$nombre', C_Id_Tipo_Usu=$tipo where C_Id_Usu=$id";
        $consulta = $mysqli->query($editar);
    }
}
$mysqli->close();
header("location: ../control/usuarios.php");

?>