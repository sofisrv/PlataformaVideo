<?php
session_start();
include 'conexion.php';
$username=$_POST['user'];
$password=$_POST['password'];
$sql="SELECT * FROM usuario WHERE nombre = '$username'";
$result = $mysqli->query($sql);
if($result->num_rows >0){
//echo 'usuario bloqueado';
}
else{
		$sql="SELECT * FROM cliente WHERE correo = '$username' && estado = '1'";
		$result1 = $mysqli->query($sql);

		if($result1->num_rows >0){
        header('Location: ub.php');
		}
		$row = $result1->fetch_array(MYSQLI_ASSOC);
		if($password==$row['contra']){
			$_SESSION['username'] = $username;
			$_SESSION['loggedin'] = true;
			$_SESSION['id_cliente'] = $row['id_cliente'];
		    header('Location: menucliente.php');
		}else{
			header('Location: loginc.php');
			session_destroy();
		}
}

?>