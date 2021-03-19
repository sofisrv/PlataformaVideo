<?php
require_once('crud_video.php');
require_once('clase_video.php');
$crud= new Crudvideo();
$video= new Video();

	if (isset($_POST['insertar'])) {
		$video->setid_video($_POST['id_video']);
		$video->setid_curso($_POST['id_curso']);
		$video->setvideo($_POST['video']);
		$video->settitulo($_POST['titulo']);
		$video->setf_a($_POST['f_a']);
		$video->setestado($_POST['estado']);
		$crud->insertar($video);
		header('Location: t_videos.php');

	}elseif(isset($_POST['modificar'])){
		$video->setid_video($_POST['id_video']);
		$video->setid_curso($_POST['id_curso']);
		$video->setvideo($_POST['video']);
		$video->settitulo($_POST['titulo']);
        $video->setf_a($_POST['f_a']);
        $video->setestado($_POST['estado']);
		$crud->modificar($video);
		header('Location: t_videos.php');	

	}elseif ($_GET['accion']=='e') {
		$crud->eliminar($_GET['id_video']);
		header('Location: t_videos.php');		

	}elseif($_GET['accion']=='a'){
		header('Location: t_videos.php');	
	}
?>