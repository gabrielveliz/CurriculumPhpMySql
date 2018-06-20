<?php
include 'conec.php';

$estudios=$_POST['estudios'];
$institucion=$_POST['institucion'];
$tipo=$_POST['tipo'];
$fecha_i=$_POST['fecha_1'];
$fecha_f=$_POST['fecha_2'];
$imagen=$_FILES["imagen"]["tmp_name"];

echo $tipo;

//verificamos si las principales variables estan definidas
if (empty($estudios) or empty($institucion)) 
{

}	    
else
{	
	if (($_FILES["imagen"]["type"]=="image/jpeg"|| $_FILES["imagen"]["type"]=="image/jpg" || $_FILES["imagen"]["type"]=="image/png") and is_uploaded_file($_FILES["imagen"]["tmp_name"]) )
	{
	    
		$imagen=addslashes(file_get_contents($imagen));

		$insertar="INSERT INTO t_educacion (C_Carrera, C_Institucion, C_Fecha_I, C_Fecha_F, C_Img_Ed, C_Id_Tipo_Inst) VALUES ('$estudios','$institucion','$fecha_i','$fecha_f','$imagen',$tipo)";

		if (empty($fecha_i)) 
		{
			$insertar="INSERT INTO t_educacion (C_Carrera, C_Institucion, C_Fecha_F, C_Img_Ed, C_Id_Tipo_Inst) VALUES ('$estudios','$institucion','$fecha_f','$imagen',$tipo)";
		}
		if (empty($fecha_f)) 
		{
			$insertar="INSERT INTO t_educacion (C_Carrera, C_Institucion, C_Fecha_I, C_Img_Ed, C_Id_Tipo_Inst) VALUES ('$estudios','$institucion','$fecha_i','$imagen',$tipo)";
		} 
		if(empty($fecha_f) and empty($fecha_i)) 
		{
			$insertar="INSERT INTO t_educacion (C_Carrera, C_Institucion, C_Img_Ed, C_Id_Tipo_Inst) VALUES ('$estudios','$institucion','$imagen',$tipo)";
		}
		$consulta = $mysqli->query($insertar);   
	}
}
header("location: ../control/curriculum.php");
?>
