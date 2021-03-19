<?php
require_once('crud_cliente.php');
require_once('clase_cliente.php');
$crud= new CrudCliente();
$cliente= new Cliente();

	if (isset($_POST['insertar'])) {
		$cliente->setnombre($_POST['nombre']);
		$cliente->setap($_POST['ap']);
		$cliente->setam($_POST['am']);
		$cliente->setcorreo($_POST['correo']);
		$cliente->setcontra($_POST['contra']);
		$crud->insertar($cliente);
		header('Location: t_clientes.php');

	}else if (isset($_POST['registro'])) {
		$cliente->setnombre($_POST['nombre']);
		$cliente->setap($_POST['ap']);
		$cliente->setam($_POST['am']);
		$cliente->setcorreo($_POST['correo']);
		$cliente->setcontra($_POST['contra']);
		$crud->insertar($cliente);
		header('Location: loginc.php');

	}
	elseif(isset($_POST['actualizar'])){
		$cliente->setid_cliente($_POST['id']);
		$cliente->setnombre($_POST['nombre']);
		$cliente->setap($_POST['ap']);
		$cliente->setam($_POST['am']);
		$cliente->setcorreo($_POST['correo']);
		$cliente->setcontra($_POST['contra']);
		$cliente->setestado($_POST['estado']);
		$crud->actualizar($cliente);
		header('Location: t_clientes.php');	

	}elseif($_GET['accion']=='a'){
		header('Location: m_cliente.php');
	}
?>