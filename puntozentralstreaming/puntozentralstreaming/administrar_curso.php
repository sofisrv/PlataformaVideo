<?php
require_once('crud_curso.php');
require_once('clase_curso.php');
$crud= new Crudcurso();
$curso= new Curso();

	if (isset($_POST['insertar'])) {
		$curso->setid_curso($_POST['id_curso']);
		$curso->setnombre($_POST['nombre']);
		$curso->setdescripcion($_POST['descripcion']);
		$curso->setestado($_POST['estado']);
		$curso->setimagen($_POST['imagen']);
		$crud->insertar($curso);
		header('Location: t_cursos.php');

	}elseif(isset($_POST['modificar'])){
		$curso->setid_curso($_POST['id_curso']);
		$curso->setnombre($_POST['nombre']);
		$curso->setdescripcion($_POST['descripcion']);
        $curso->setestado($_POST['estado']);
        $curso->setimagen($_POST['imagen']);
		$crud->modificar($curso);
		header('Location: t_cursos.php');	

	}elseif ($_GET['accion']=='e') {
		$crud->eliminar($_GET['id_curso']);
		header('Location: t_cursos.php');		

	}elseif($_GET['accion']=='a'){
		header('Location: t_cursos.php');	
	}
?>