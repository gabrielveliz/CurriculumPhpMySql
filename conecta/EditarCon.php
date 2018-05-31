<?php
include("conec.php");
    

    $id=$_POST['id'];
    $nombre=$_POST['conocimiento'];
    $imagen=$_FILES["imagen"]["tmp_name"];
    
    //Verifica si se ha subido la imagen
    if (is_uploaded_file($_FILES["imagen"]["tmp_name"])){
    //Verifica si el el formato de la imagen es JPEG o JPG
        if ($_FILES["imagen"]["type"]=="image/jpeg"|| $_FILES["imagen"]["type"]=="image/jpg" || $_FILES["imagen"]["type"]=="image/png" ){
    
        $imagen=addslashes(file_get_contents($imagen));
        $editar="update t_conocimientos set C_Titulo_Conocimiento='$nombre',C_Imagen_logo='$imagen' where C_Id_Conocimientos=$id";

         $consulta = $mysqli->query($editar);
        //Si la consulta imprime el error de la consulta 
        if(!$consulta){
           print("MySQLI Error:".mysqli_error($mysqli));
        }
        //De lo contrario regresa al index
        else{
            $mysqli->close();
            header("location: ../control/inicio.php");
        }
        }
    }
    else
    {
        
        $editar="update t_conocimientos set C_Titulo_Conocimiento='$nombre' where C_Id_Conocimientos=$id";

         $consulta = $mysqli->query($editar);
         $mysqli->close();
         header("location: ../control/inicio.php");
    }



?>