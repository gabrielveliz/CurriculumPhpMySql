<?php
include 'conec.php';

$id=$_POST['id'];
$tarea=$_POST['tarea'];

if (empty($tarea) or empty($id)) 
{
     	
}    
else
{	
		$insertar=$mysqli->prepare("update t_tareas set C_Tarea=? where C_Id_Tareas= ? ");
		$insertar->bind_Param('si',$tarea,$id);
		$insertar->execute();

}
header("location: ../control/curriculum.php");

?>