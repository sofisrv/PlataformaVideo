<?php
session_start();
include 'conexion.php';
$username=$_POST['user'];
$password=$_POST['password'];
$sql="SELECT * FROM usuario WHERE nombre = '$username'";
$result = $mysqli->query($sql);
if($result->num_rows >0){

}
$row = $result->fetch_array(MYSQLI_ASSOC);
if($password==$row['contra']){
	$_SESSION['username'] = $username;
	$_SESSION['loggedin'] = true;
	$estado = $row['estado'];
	if($estado!= '1'){
	session_destroy();
	header('Location: logina.php');
	}else{
    header('Location: menuc.php');
	}
}else{
	header('Location: logina.php');
	session_destroy();
}
?>