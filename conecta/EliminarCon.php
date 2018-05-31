<?php

include 'conec.php';

$id=$_POST['id'];
echo "Hola ".$id;

$sql = "DELETE FROM t_conocimientos WHERE C_Id_Conocimientos=$id";

if ($mysqli->query($sql) === TRUE) {
    
    echo"<script>location.href='../control/inicio.php';</script>";
} else {
    echo "Error codigo: " . $mysqli->error;
    echo"<script>location.href='../control/inicio.php';</script>";
}

$mysqli->close();

?>