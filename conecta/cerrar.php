<?php
include 'conec.php';

session_start();
unset($_SESSION['id']);
session_destroy();

mysqli_close($mysqli);
header("location:../Ingresar.php");

?>