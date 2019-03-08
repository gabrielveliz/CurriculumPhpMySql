<?php
include("conec.php");

	$id=$_POST['id'];
    $usuario=$_POST['usuario'];
    $nombre=$_POST['nombre'];
    $cont_ant=$_POST['cont_ant'];
    $cont_nu=$_POST['cont_nu'];
    $cont_nu_rep=$_POST['cont_rep'];
    $imagen=$_FILES["imagen"]["tmp_name"];

//Verifica si se ha subido la imagen
    if (is_uploaded_file($_FILES["imagen"]["tmp_name"])){
    //Verifica si el el formato de la imagen es JPEG o JPG
        if ($_FILES["imagen"]["type"]=="image/jpeg"|| $_FILES["imagen"]["type"]=="image/jpg" || $_FILES["imagen"]["type"]=="image/png" ){
    
        $imagen=addslashes(file_get_contents($imagen));
        $editar="update t_usu set C_Nombre_Usuario='$usuario',C_Nombre_Comp='$nombre',C_Objetivo='$objetivo',C_Unive_Pro='$universidad',C_Img_Usu='$imagen' where C_Id_Usu=$id";

         $consulta = $mysqli->query($editar);
        //Si la consulta imprime el error de la consulta 
        if(!$consulta){
           print("MySQLI Error:".mysqli_error($mysqli));
        }
        //De lo contrario regresa al index
        else{
            $mysqli->close();
            header("location: ../control/perfil.php");
        }
        }
    }
    else
    {
        
        $editar="update t_perfil set C_Nombre='$nombre',C_Titulo_Pro='$titulo',C_Objetivo='$objetivo',C_Unive_Pro='$universidad' where C_Id_Perfil=1";

         $consulta = $mysqli->query($editar);
         $mysqli->close();
         header("location: ../control/perfil.php");
    }


?>