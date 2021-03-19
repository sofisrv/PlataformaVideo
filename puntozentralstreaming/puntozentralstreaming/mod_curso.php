<?php
	
	require 'conexion.php';
	
	$id_curso = $_POST['id_curso'];
	$nombre = $_POST['nombre'];
	$descripcion = $_POST['descripcion'];
	$estado = $_POST['estado'];
	$imagen= $_FILES['archivo']['name'];
	
	$sql = "UPDATE curso SET id_curso='$id_curso', nombre='$nombre', descripcion='$descripcion', estado='$estado', imagen='$imagen' WHERE id_curso = '$id_curso'";
	$resultado = $mysqli->query($sql);
	$id_insert = $id_curso;
	
	if($_FILES["archivo"]["error"]>0){
		echo "Error al cargar archivo";	
		} else {
		
		$permitidos = array("image/gif","image/png","image/jpg","image/jpeg");
		$limite_kb = 2000;
		
		if(in_array($_FILES["archivo"]["type"], $permitidos) && $_FILES["archivo"]["size"] <= $limite_kb * 1024){
			
			$ruta = 'files/'.$id_insert.'/';
			$archivo = $ruta.$_FILES["archivo"]["name"];
			
			if(!file_exists($ruta)){
				mkdir($ruta);
			}
			
			if(!file_exists($archivo)){
				
				$resultado = @move_uploaded_file($_FILES["archivo"]["tmp_name"], $archivo);
				
				if($resultado){
					echo "Archivo Guardado";
					} else {
					echo "Error al guardar archivo";
				}
				
				} else {
				echo "Archivo ya existe";
			}
			
			} else {
			echo "Archivo no permitido o excede el tamaño";
		}
		
	}
	
	
?>

<html lang="es">
	<head>
		    <link  rel="icon" href="logos/logocen.png" type="image/png"/>
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link href="css/bootstrap.min.css" rel="stylesheet">
		<link href="css/bootstrap-theme.css" rel="stylesheet">
		<script src="js/jquery-3.1.1.min.js"></script>
		<script src="js/bootstrap.min.js"></script>	
	</head>
	
	<body>
		<div class="container">
			<div class="row">
				<div class="row" style="text-align:center">
					<?php if($resultado) { ?>
						<h3>Grupo guardado</h3>
						<?php
						header('Location: t_cursos.php');
						?>
						<?php } else { ?>
						<h3>ERROR AL GUARDAR</h3>
						<a href="t_cursos.php" class="btn btn-primary">Regresar</a>
					<?php } ?>
					
				</div>
			</div>
		</div>
	</body>
</html>
