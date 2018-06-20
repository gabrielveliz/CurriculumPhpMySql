<?php
include("conec.php");

$idLaboral=$_POST['id'];
$tarea=$_POST['detalle'];

if (empty($tarea) or empty($idLaboral)) 
{
     	
}	    
else
{	
		$insertar=$mysqli->prepare("INSERT INTO t_tareas (C_Tarea, C_Id_Laboral) VALUES (?,?)");
		$insertar->bind_Param('si', $tarea,$idLaboral);
		$insertar->execute();
}

header("location: ../control/curriculum.php");
?>