<?php
require_once('crud_paquete.php');
require_once('clase_paquete.php');
$crud= new CrudPaquete();
$paquete= new Paquete();

	if (isset($_POST['insertar'])) {
		$paquete->setnombre($_POST['nombre']);
		$paquete->setdescripcion($_POST['descripcion']);
		$paquete->setcosto($_POST['costo']);
		$paquete->setestado($_POST['estado']);
		$paquete->setcaducidad($_POST['caducidad']);
		$paquete->setvisibleonline($_POST['visibleonline']);
		$crud->insertar($paquete);
		header('Location: t_paquetes.php');

	}elseif(isset($_POST['actualizar'])){
		$paquete->setid_paquete($_POST['id']);
		$paquete->setnombre($_POST['nombre']);
		$paquete->setdescripcion($_POST['descripcion']);
        $paquete->setcosto($_POST['costo']);
        $paquete->setestado($_POST['estado']);
        $paquete->setcaducidad($_POST['caducidad']);
        $paquete->setvisibleonline($_POST['visibleonline']);
		$crud->actualizar($paquete);
		header('Location: t_paquetes.php');	 

	}elseif($_GET['accion']=='a'){
		header('Location: m_paquete.php');
	}

?>