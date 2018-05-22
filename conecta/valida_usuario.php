<?php
    session_start();
    include ("conec.php");
    $cuenta= $_POST['usuario'];
    $contrasena= $_POST['pas'];
    

    // utilizando sentencias preparadas para mitigar un poco los fallos de seguridad.
    $consultaUser = "SELECT C_Id_Usu,C_Nombre_Usuario FROM t_usu where BINARY C_Nombre_Usuario=? and BINARY pas=?";
    $resultadoUser = $mysqli->prepare($consultaUser);
    $resultadoUser->bind_param("ss",$cuenta,$contrasena);
    $resultadoUser->execute();
    $resultadoUser->bind_result($id,$resulNombre);
    $fila = $resultadoUser->fetch();

    if (empty($resulNombre)) {  

        echo"<script>alert('usuario o clave incorrectos');</script>";
        echo"<script>location.href='../Ingresar.php';</script>";
        
        }
    else
        {
        $_SESSION['id']=$id;
        echo"<script>location.href='../control/';</script>";
        }
        
?>