<?php
include("conec.php");


    $nombre=$_POST['nombre'];
    $titulo=$_POST['titulo'];
    $objetivo=$_POST['objetivo'];
    $universidad=$_POST['universidad'];
    $imagen=$_FILES["imagen"]["tmp_name"];
    
    //Verifica si se ha subido la imagen
    if (is_uploaded_file($_FILES["imagen"]["tmp_name"])){
    //Verifica si el el formato de la imagen es JPEG o JPG
        if ($_FILES["imagen"]["type"]=="image/jpeg"|| $_FILES["imagen"]["type"]=="image/jpg" || $_FILES["imagen"]["type"]=="image/png" ){
    
        $imagen=addslashes(file_get_contents($imagen));
        $editar="update t_perfil set C_Nombre='$nombre',C_Titulo_Pro='$titulo',C_Objetivo='$objetivo',C_Unive_Pro='$universidad',C_Img_Perfil='$imagen' where C_Id_Perfil=1";

         $consulta = $mysqli->query($editar);
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



?>