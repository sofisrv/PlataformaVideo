<?php
require_once('conectar.php');
 
	class Crudcurso{
		public function __construct(){}
		public function mostrar(){
			$db=Db::conectar();
			$listaCursos=[];
			$select=$db->query('SELECT * FROM curso WHERE estado = "1" ORDER BY nombre ASC;');

		foreach($select->fetchAll() as $curso){
			$myCurso= new Curso();
			$myCurso->setid_curso($curso['id_curso']);
			$myCurso->setnombre($curso['nombre']);
			$myCurso->setdescripcion($curso['descripcion']);
			$myCurso->setestado($curso['estado']);
			$myCurso->setimagen($curso['imagen']);
			$listaCursos[]=$myCurso;
		}
		return $listaCursos;
	}
			public function mostrarpapelera(){
			$db=Db::conectar();
			$listaCursos=[];
			$select=$db->query('SELECT * FROM curso WHERE estado = "2" ORDER BY nombre ASC;');

		foreach($select->fetchAll() as $curso){
			$myCurso= new Curso();
			$myCurso->setid_curso($curso['id_curso']);
			$myCurso->setnombre($curso['nombre']);
			$myCurso->setdescripcion($curso['descripcion']);
			$myCurso->setestado($curso['estado']);
			$myCurso->setimagen($curso['imagen']);
			$listaCursos[]=$myCurso;
		}
		return $listaCursos;
	}
		public function eliminar($id_curso){
			$db=Db::conectar();
			$eliminar=$db->prepare('DELETE FROM curso WHERE id_curso=:id_curso');
			$eliminar->bindValue('id_curso',$id_curso);
			$eliminar->execute();
		}
/*
		public function obtenerLibro($id_libro){
			$db=Db::conectar();
			$select=$db->prepare('SELECT * FROM libros WHERE id_libro=:id_libro');
			$select->bindValue('id_libro',$id_libro);
			$select->execute();
			$libro=$select->fetch();
			$myLibro= new Libro();
			$myLibro->setId_libro($libro['id_libro']);
			$myLibro->settitulo($libro['titulo']);
			$myLibro->seteditorial($libro['editorial']);
			$myLibro->setn_edicion($libro['n_edicion']);
			$myLibro->setlugar_publicacion($libro['lugar_publicacion']);
			$myLibro->setfecha_publicacion($libro['fecha_publicacion']);
			$myLibro->setn_hojas($libro['n_hojas']);
			$myLibro->setexistencia($libro['existencia']);
			return $myLibro;
	}
		public function actualizar($libro){
			$db=Db::conectar();
			$actualizar=$db->prepare('UPDATE libros SET titulo=:titulo, editorial=:editorial, n_edicion=:n_edicion, lugar_publicacion=:lugar_publicacion, fecha_publicacion=:fecha_publicacion, n_hojas=:n_hojas, existencia=:existencia WHERE id_libro=:id');
			$actualizar->bindValue('id',$libro->getId_libro());
			$actualizar->bindValue('titulo',$libro->gettitulo());
			$actualizar->bindValue('editorial',$libro->geteditorial());
			$actualizar->bindValue('n_edicion',$libro->getn_edicion());
			$actualizar->bindValue('lugar_publicacion',$libro->getlugar_publicacion());
			$actualizar->bindValue('fecha_publicacion',$libro->getfecha_publicacion());
			$actualizar->bindValue('n_hojas',$libro->getn_hojas());
			$actualizar->bindValue('existencia',$libro->getexistencia());
			$actualizar->execute();
	}
}*/
}
?>