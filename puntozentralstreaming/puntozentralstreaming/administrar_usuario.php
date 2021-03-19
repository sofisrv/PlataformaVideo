<?php
require_once('crud_usuario.php');
require_once('clase_usuario.php');
$crud= new CrudUsuario();
$usuario= new Usuario();

	if (isset($_POST['insertar'])) {
		$usuario->setnombre($_POST['nombre']);
		$usuario->setcontra($_POST['contra']);
		$usuario->setrol($_POST['rol']);
		$usuario->setestado($_POST['estado']);
		$crud->insertar($usuario);
		header('Location: t_usuarios.php');

	}elseif(isset($_POST['actualizar'])){
		$usuario->setid_usuario($_POST['id']);
		$usuario->setnombre($_POST['nombre']);
		$usuario->setcontra($_POST['contra']);
		$usuario->setrol($_POST['rol']);
		$usuario->setestado($_POST['estado']);
		$crud->actualizar($usuario);
		header('Location: t_usuarios.php');	

	}elseif($_GET['accion']=='a'){
		header('Location: m_usuario.php');
	}
?>