<?php
$host="localhost";
$basededatos="wallbangstudios";
$usuariodb="root";
$clavedb="";
error_reporting(0);
$conexion=new mysqli($host,$usuariodb,$clavedb,$basededatos);
if ($conexion->connect_errno) {
	echo "Nuestro sitio experimenta fallos...";
	exit();
}
?>