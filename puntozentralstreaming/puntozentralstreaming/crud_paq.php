<?php
require_once('conectar.php');
 
	class CrudPaq{
		public function __construct(){}
		public function insertar($paq){
			$db=Db::conectar();
			$insert=$db->prepare('INSERT INTO paquete_cliente values(NULL,:id_curso,:id_paquete,:id_cliente,:f_i,:f_f)');
			$insert->bindValue('id_curso',$paq->getid_curso());
			$insert->bindValue('id_paquete',$paq->getid_paquete());
			$insert->bindValue('id_cliente',$paq->getid_cliente());
			$insert->bindValue('f_i',$paq->getf_i());
			$insert->bindValue('f_f',$paq->getf_f());
			$insert->execute();
		}
		public function mostrar(){
			$db=Db::conectar();
			$listaPaquetes=[];
			$select=$db->query('SELECT * FROM paquete_cliente where f_f>=(now()) order by f_f asc');

			foreach($select->fetchAll() as $paq){
				$myPaq= new Paq();
				$myPaq->setid_cursocliente($paq['id_cursocliente']);
				$myPaq->setid_curso($paq['id_curso']);
				$myPaq->setid_paquete($paq['id_paquete']);
				$myPaq->setid_cliente($paq['id_cliente']);
				$myPaq->setf_i($paq['f_i']);
				$myPaq->setf_f($paq['f_f']);
				$listaPaquetes[]=$myPaq;
			}
			return $listaPaquetes;
		}
		public function mostrarpaqs($id_cliente){
			$db=Db::conectar();
			$listaPaquetes=[];
			$select=$db->prepare('SELECT * FROM paquete_cliente where id_cliente=:id_cliente order by f_f asc');
			$select->bindValue('id_cliente',$id_cliente);
			$select->execute();

		foreach($select->fetchAll() as $paq){
			$myPaq= new Paq();
			$myPaq->setid_cursocliente($paq['id_cursocliente']);
			$myPaq->setid_paquete($paq['id_paquete']);
			$myPaq->setid_curso($paq['id_curso']);
			$myPaq->setf_i($paq['f_i']);
			$myPaq->setf_f($paq['f_f']);
			$myPaq->setid_cliente($paq['id_cliente']);
			$listaPaquetes[]=$myPaq;
		}
		return $listaPaquetes;
	}
			public function mostrarpaqscurso($id_curso){
			$db=Db::conectar();
			$listaPaquetes=[];
			$select=$db->prepare('SELECT * FROM paquete_cliente where id_curso=:id_curso');
			$select->bindValue('id_curso',$id_curso);
			$select->execute();

		foreach($select->fetchAll() as $paq){
			$myPaq= new Paq();
			$myPaq->setid_cursocliente($paq['id_cursocliente']);
			$myPaq->setid_paquete($paq['id_paquete']);
			$myPaq->setid_curso($paq['id_curso']);
			$myPaq->setf_i($paq['f_i']);
			$myPaq->setf_f($paq['f_f']);
			$myPaq->setid_cliente($paq['id_cliente']);
			$listaPaquetes[]=$myPaq;
		}
		return $listaPaquetes;
	}
		public function obtenerPaquete($id){
			$db=Db::conectar();
			$select=$db->prepare('SELECT * FROM paquete WHERE id_paquete=:id_paquete');
			$select->bindValue('id_paquete',$id);
			$select->execute();
			$paq=$select->fetch();
			$myPaquete= new Paquete();
			$myPaquete->setId_paquete($paq['id_paquete']);
			$myPaquete->setnombre($paq['nombre']);
			$myPaquete->setdescripcion($paq['descripcion']);
			$myPaquete->setcosto($paq['costo']);
			$myPaquete->setestado($paq['estado']);
			$myPaquete->setcaducidad($paq['caducidad']);
			$myPaquete->setvisibleonline($paq['visibleonline']);
			return $myPaquete;
		}
		public function actualizar($paq){
			$db=Db::conectar();
			$actualizar=$db->prepare('UPDATE paquete SET id_paquete=:id_paquete, nombre=:nombre, descripcion=:descripcion, costo=:costo, estado=:estado, caducidad=:caducidad, visibleonline=:visibleonline WHERE id_paquete=:id_paquete');
			$actualizar->bindValue('id_paquete',$paq->getid_paquete());
			$actualizar->bindValue('nombre',$paq->getnombre());
			$actualizar->bindValue('descripcion',$paq->getdescripcion());
			$actualizar->bindValue('costo',$paq->getcosto());
			$actualizar->bindValue('estado',$paq->getestado());
			$actualizar->bindValue('caducidad',$paq->getcaducidad());
			$actualizar->bindValue('visibleonline',$paq->getvisibleonline());
			$actualizar->execute();
		}

			public function eliminar($id_cursocliente){
			$db=Db::conectar();
			$eliminar=$db->prepare('DELETE FROM paquete_cliente WHERE id_cursocliente=:id_cursocliente');
			$eliminar->bindValue('id_cursocliente',$id_cursocliente);
			$eliminar->execute();
		}
	
}
?>