<?php
require_once('conectar.php');
 
	class CrudPaquete{
		public function __construct(){}
		public function insertar($paquete){
			$db=Db::conectar();
			$insert=$db->prepare('INSERT INTO paquete values(NULL,:nombre,:descripcion,:costo,:estado,:caducidad , :visibleonline)');
			$insert->bindValue('nombre',$paquete->getnombre());
			$insert->bindValue('descripcion',$paquete->getdescripcion());
			$insert->bindValue('costo',$paquete->getcosto());
			$insert->bindValue('estado',$paquete->getestado());
			$insert->bindValue('caducidad',$paquete->getcaducidad());
			$insert->bindValue('visibleonline',$paquete->getvisibleonline());
			$insert->execute();
		}
		public function mostrar(){
			$db=Db::conectar();
			$listaPaquetes=[];
			$select=$db->query('SELECT * FROM paquete ORDER BY nombre ASC;');

			foreach($select->fetchAll() as $paquete){
				$myPaquete= new Paquete();
				$myPaquete->setid_paquete($paquete['id_paquete']);
				$myPaquete->setnombre($paquete['nombre']);
				$myPaquete->setdescripcion($paquete['descripcion']);
				$myPaquete->setcosto($paquete['costo']);
				$myPaquete->setestado($paquete['estado']);
				$myPaquete->setcaducidad($paquete['caducidad']);
				$myPaquete->setvisibleonline($paquete['visibleonline']);
				$listaPaquetes[]=$myPaquete;
			}
			return $listaPaquetes;
		}
		public function obtenerPaquete($id){
			$db=Db::conectar();
			$select=$db->prepare('SELECT * FROM paquete WHERE id_paquete=:id_paquete');
			$select->bindValue('id_paquete',$id);
			$select->execute();
			$paquete=$select->fetch();
			$myPaquete= new Paquete();
			$myPaquete->setId_paquete($paquete['id_paquete']);
			$myPaquete->setnombre($paquete['nombre']);
			$myPaquete->setdescripcion($paquete['descripcion']);
			$myPaquete->setcosto($paquete['costo']);
			$myPaquete->setestado($paquete['estado']);
			$myPaquete->setcaducidad($paquete['caducidad']);
			$myPaquete->setvisibleonline($paquete['visibleonline']);
			return $myPaquete;
		}
		public function actualizar($paquete){
			$db=Db::conectar();
			$actualizar=$db->prepare('UPDATE paquete SET id_paquete=:id_paquete, nombre=:nombre, descripcion=:descripcion, costo=:costo, estado=:estado, caducidad=:caducidad, visibleonline=:visibleonline WHERE id_paquete=:id_paquete');
			$actualizar->bindValue('id_paquete',$paquete->getid_paquete());
			$actualizar->bindValue('nombre',$paquete->getnombre());
			$actualizar->bindValue('descripcion',$paquete->getdescripcion());
			$actualizar->bindValue('costo',$paquete->getcosto());
			$actualizar->bindValue('estado',$paquete->getestado());
			$actualizar->bindValue('caducidad',$paquete->getcaducidad());
			$actualizar->bindValue('visibleonline',$paquete->getvisibleonline());
			$actualizar->execute();
		}
	
}
?>