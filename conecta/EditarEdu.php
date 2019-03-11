<?php
include("conec.php");
    

    $id=$_POST['id'];
    $estudio=$_POST['estudio'];
    $tipo=$_POST['tipo'];
    $inst=$_POST['institucion'];
    $fecha_i=$_POST['fecha_1'];
    $fecha_f=$_POST['fecha_2'];
    $imagen=$_FILES["imagen"]["tmp_name"];
    
    if(empty($estudio) or empty($inst) or empty($fecha_i) or empty($fecha_f))
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
                $editar="update t_educacion set C_Carrera='$estudio',C_Institucion='$inst',C_Fecha_I='$fecha_i', C_Fecha_F='$fecha_f',C_Img_Ed='$imagen', C_Id_Tipo_Inst=$tipo where C_Id_Educacion=$id";
                if (empty($fecha_i)) 
                {
                    $editar="update t_educacion set C_Carrera='$estudio',C_Institucion='$inst',C_Fecha_I='$fecha_i', C_Fecha_F='$fecha_f', C_Id_Tipo_Inst=$tipo where C_Id_Educacion=$id";
                }
                
                
            }
            else
            {
                header("location: ../control/curriculum.php");
            }
        }
        else
        {
            $editar="update t_educacion set C_Carrera='$estudio',C_Institucion='$inst',C_Fecha_I='$fecha_i', C_Fecha_F='$fecha_f', C_Id_Tipo_Inst=$tipo where C_Id_Educacion=$id";
        }

        $consulta = $mysqli->query($editar);
        $mysqli->close();
        header("location: ../control/curriculum.php");
                
         
    }

?>