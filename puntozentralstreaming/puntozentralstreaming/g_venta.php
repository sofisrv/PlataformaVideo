<?php
	
	require 'conexion.php';
	$id_cliente = $_POST['id_cliente'];
	$id_curso = $_POST['id_curso'];
	$id_paquete = $_POST['id_paquete'];
	$f_i = $_POST['f_i'];
	 $query = $mysqli -> query ("SELECT * FROM paquete WHERE id_paquete = $id_paquete;");
                  while ($valores = mysqli_fetch_array($query)) {
                    $cad=$valores['caducidad'];
                  }
		$f_f = strtotime ( '+'.$cad.' day' , strtotime ( $f_i ) ) ;
		$f_f = date ( 'Y-m-j' , $f_f);
   
	$sql = "INSERT INTO paquete_cliente (id_cliente, id_paquete, id_curso, f_i, f_f) VALUES ('$id_cliente', '$id_paquete','$id_curso','$f_i', '$f_f')";
	$resultado = $mysqli->query($sql);
	$id_insert = $mysqli->insert_id;
	
	
						header('Location: t_paqs.php');
						?>
						