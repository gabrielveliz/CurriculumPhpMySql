<?php
include 'conec.php';

$conocimiento=$_POST['conocimiento'];
$imagen=$_FILES["imagen"]["tmp_name"];



    if (is_uploaded_file($_FILES["imagen"]["tmp_name"]))
    {
    //Verifica si el el formato de la imagen es JPEG o JPG
        if ($_FILES["imagen"]["type"]=="image/jpeg"|| $_FILES["imagen"]["type"]=="image/jpg" || $_FILES["imagen"]["type"]=="image/png" )
        {
    
		        $imagen=addslashes(file_get_contents($imagen));
		        
		        $insertar="INSERT INTO t_conocimientos (C_Titulo_Conocimiento, C_Imagen_logo) VALUES ('$conocimiento','$imagen')";

		         $consulta = $mysqli->query($insertar);
		        //Si la consulta imprime el error de la consulta 

		        if(!$consulta){
		           print("MySQLI Error:".mysqli_error($mysqli));
		        }
		        //De lo contrario regresa al index
		        else{
		            header("location: ../control/inicio.php");
		        }
        }
    }
    else
    {
        
         header("location: ../control/inicio.php");
    }

?>
