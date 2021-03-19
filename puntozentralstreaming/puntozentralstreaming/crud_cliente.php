<?php
require_once('conectar.php');
 
	class CrudCliente{
		public function __construct(){}
		public function insertar($cliente){
			$db=Db::conectar();
			$insert=$db->prepare('INSERT INTO cliente values(NULL,:nombre,:ap,:am,:correo,:contra)');
			$insert->bindValue('nombre',$cliente->getnombre());
			$insert->bindValue('ap',$cliente->getap());
			$insert->bindValue('am',$cliente->getam());
			$insert->bindValue('correo',$cliente->getcorreo());
			$insert->bindValue('contra',$cliente->getcontra());
			$insert->execute();
		}
		public function registro($cliente){
			$db=Db::conectar();
			$insert=$db->prepare('INSERT INTO cliente values(NULL,:nombre,:ap,:am,:correo,:contra)');
			$insert->bindValue('nombre',$cliente->getnombre());
			$insert->bindValue('ap',$cliente->getap());
			$insert->bindValue('am',$cliente->getam());
			$insert->bindValue('correo',$cliente->getcorreo());
			$insert->bindValue('contra',$cliente->getcontra());
			$insert->execute();
		}
        	public function mostrar(){
			$db=Db::conectar();
			$listaClientes=[];
			$select=$db->query('SELECT * FROM cliente WHERE estado = "1" ORDER BY nombre ASC;');

			foreach($select->fetchAll() as $cliente){
				$myCliente= new Cliente();
				$myCliente->setid_cliente($cliente['id_cliente']);
				$myCliente->setnombre($cliente['nombre']);
				$myCliente->setap($cliente['ap']);
				$myCliente->setam($cliente['am']);
				$myCliente->setcorreo($cliente['correo']);
				$myCliente->setcontra($cliente['contra']);
				$listaClientes[]=$myCliente;
			}
			return $listaClientes;
		}
		public function mostrarpapelera(){
			
			$db=Db::conectar();
			$listaClientes=[];
			$select=$db->query('SELECT * FROM cliente WHERE estado = "2" ORDER BY nombre ASC;');

			foreach($select->fetchAll() as $cliente){
				$myCliente= new Cliente();
				$myCliente->setid_cliente($cliente['id_cliente']);
				$myCliente->setnombre($cliente['nombre']);
				$myCliente->setap($cliente['ap']);
				$myCliente->setam($cliente['am']);
				$myCliente->setcorreo($cliente['correo']);
				$myCliente->setcontra($cliente['contra']);
				$listaClientes[]=$myCliente;
			}
			return $listaClientes;
	}
		public function obtenerCliente($id){
			$db=Db::conectar();
			$select=$db->prepare('SELECT * FROM cliente WHERE id_cliente=:id_cliente');
			$select->bindValue('id_cliente',$id);
			$select->execute();
			$cliente=$select->fetch();
			$myCliente= new Cliente();
			$myCliente->setid_cliente($cliente['id_cliente']);
			$myCliente->setnombre($cliente['nombre']);
			$myCliente->setap($cliente['ap']);
			$myCliente->setam($cliente['am']);
			$myCliente->setcorreo($cliente['correo']);
			$myCliente->setcontra($cliente['contra']);
			$myCliente->setestado($cliente['estado']);
			return $myCliente;
		}
		public function actualizar($cliente){
			$db=Db::conectar();
			$actualizar=$db->prepare('UPDATE cliente SET id_cliente=:id_cliente, nombre=:nombre, ap=:ap, am=:am, correo=:correo, contra=:contra, estado=:estado WHERE id_cliente=:id_cliente');
			$actualizar->bindValue('id_cliente',$cliente->getid_cliente());
			$actualizar->bindValue('nombre',$cliente->getnombre());
			$actualizar->bindValue('ap',$cliente->getap());
			$actualizar->bindValue('am',$cliente->getam());
			$actualizar->bindValue('correo',$cliente->getcorreo());
			$actualizar->bindValue('contra',$cliente->getcontra());
			$actualizar->bindValue('estado',$cliente->getestado());
			$actualizar->execute();
		}
}
?>