<?php
require_once('crud_paq.php');
require_once('clase_paq.php');
$crud= new CrudPaq();
$paq= new Paq();

	if (isset($_POST['insertar'])) {
		$paq->setid_cliente($_POST['id_cliente']);
		$paq->setid_curso($_POST['id_curso']);
		$paq->setid_paq($_POST['id_paq']);
		$paq->setf_i($_POST['f_i']);
		$paq->setf_f($_POST['f_f']);
		$crud->insertar($paq);
		header('Location: t_paqs.php');

	}elseif(isset($_POST['actualizar'])){
$paq->setid_cliente($_POST['id_cliente']);
		$paq->setid_curso($_POST['id_curso']);
		$paq->setid_paq($_POST['id_paq']);
		$paq->setf_i($_POST['f_i']);
		$paq->setf_f($_POST['f_f']);
		$crud->actualizar($paq);
		header('Location: t_paqs.php');
		}

	elseif ($_GET['accion']=='e') {
		$crud->eliminar($_GET['id_cursocliente']);
		header('Location: t_paqs.php');		

	}
?>