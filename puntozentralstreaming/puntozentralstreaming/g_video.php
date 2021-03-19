<?php
	
	require 'conexion.php';
	$id_curso = $_POST['id_curso'];
	$titulo = $_POST['titulo'];
	$f_a = $_POST['f_a'];
	$video= $_FILES['video']['name'];

			  $sql = "SELECT * FROM video";

			$sql = "INSERT INTO video (id_curso, video, titulo, f_a) VALUES ('$id_curso', '$video', '$titulo','$f_a')";
			$resultado = $mysqli->query($sql);
			$id_insert = $mysqli->insert_id;
			
			if($_FILES["video"]["error"]>0){
				echo "Error al cargar video";	
				} else {
				
				$permitidos = array("video/mp4");
				$limite_kb = 2000000;
				
				if(in_array($_FILES["video"]["type"], $permitidos) && $_FILES["video"]["size"] <= $limite_kb * 1024){
					$ruta = 'videos/'.$id_insert.'/';
					$video = $ruta.$_FILES["video"]["name"];
					
					if(!file_exists($ruta)){
						mkdir($ruta);
					}
					
					if(!file_exists($video)){
						
						$resultado = @move_uploaded_file($_FILES["video"]["tmp_name"], $video);
						
						if($resultado){
							header('Location: t_videos.php');
							} else {
							echo "Error al guardar video";
						}
						
						} else {
						echo "Video ya existe";
					}
					
					} else {
					echo "Video no permitido o excede el tamaño";
				    }	
				    
			        }
	?>
						