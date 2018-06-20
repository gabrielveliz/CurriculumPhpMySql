<?php
include("conec.php");

$id=$_POST['id'];

$puesto=$_POST['puesto'];
$empresa=$_POST['empresa'];
$web=$_POST['web'];
$fecha_i=$_POST['fecha_1'];
$fecha_f=$_POST['fecha_2'];
$imagen=$_FILES["imagen"]["tmp_name"];

	if(empty($puesto) or empty($empresa) or empty($fecha_f))
	{
		header("location: ../control/curriculum.php");
	}
    else
    {		
    	//Verifica si se ha subido la imagen
	    if (is_uploaded_file($_FILES["imagen"]["tmp_name"]))
	    {
	    //Verifica si el el formato de la imagen es JPEG o JPG
	        if ($_FILES["imagen"]["type"]=="image/jpeg"|| $_FILES["imagen"]["type"]=="image/jpg" || $_FILES["imagen"]["type"]=="image/png" )
	        {
	        	$imagen=addslashes(file_get_contents($imagen));
	        	$editar="update t_laboral set C_Puesto='$puesto',C_Empresa='$empresa',C_Link='$web',C_Fecha_I='$fecha_i', C_Fecha_F='$fecha_f',C_Img_laboral='$imagen' where C_Id_Laboral=$id";
	        	if (empty($fecha_i)) 
	        	{
	        		$editar="update t_laboral set C_Puesto='$puesto',C_Empresa='$empresa',C_Link='$web', C_Fecha_F='$fecha_f',C_Img_laboral='$imagen' where C_Id_Laboral=$id";
	        	}
	        	
	        	
	        }
	        else
	        {
	        	header("location: ../control/curriculum.php");
	        }
	    }
	    else
	    {
	    	$editar="update t_laboral set C_Puesto='$puesto',C_Empresa='$empresa',C_Link='$web',C_Fecha_I='$fecha_i', C_Fecha_F='$fecha_f' where C_Id_Laboral=$id";
	    	if (empty($fecha_i)) {
	    		$editar="update t_laboral set C_Puesto='$puesto',C_Empresa='$empresa',C_Link='$web', C_Fecha_F='$fecha_f' where C_Id_Laboral=$id";
	    	}
	    }

	    $consulta = $mysqli->query($editar);
	    $mysqli->close();
	    header("location: ../control/curriculum.php");
	        	
         
    }

?>