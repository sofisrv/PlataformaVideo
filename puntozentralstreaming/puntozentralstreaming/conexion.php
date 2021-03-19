<?php
	$mysqli = new mysqli('interfaznva.com', 'interfaz_soportemx', 'RCA~4~!oONsO', 'interfaz_puntozentralstreaming');
	//$mysqli = new mysqli('localhost', 'root', '', 'demo');
	if($mysqli->connect_error){
		
		die('Error en la conexion' . $mysqli->connect_error);
		
	}
		if(mysqli_connect_errno()){
		echo 'Conexion Fallida : ', mysqli_connect_error();
		exit();
	}
?>