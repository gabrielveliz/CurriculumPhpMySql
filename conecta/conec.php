<?php

define("host","localhost" ); 
define("nombre_usuario", "root"); 
define("pas", ""); 
define("nombre_base_datos", "gabriel_bd" );

$mysqli = new mysqli(host, nombre_usuario, pas, nombre_base_datos);
$mysqli->query("SET NAMES 'utf8'");

if ($mysqli->connect_errno) {
    echo "Fallo al conectar a MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
}

?>