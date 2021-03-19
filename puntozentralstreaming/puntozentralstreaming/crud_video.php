<?php
require_once('conectar.php');
 
	class Crudvideo{
		public function __construct(){}
		public function mostrar(){
			$db=Db::conectar();
			$listaVideos=[];
			$select=$db->query('SELECT * FROM video ORDER BY id_video ASC;');

		foreach($select->fetchAll() as $video){
			$myVideo= new Video();
			$myVideo->setid_video($video['id_video']);
			$myVideo->setid_curso($video['id_curso']);
			$myVideo->setvideo($video['video']);
			$myVideo->settitulo($video['titulo']);
			$myVideo->setf_a($video['f_a']);
			$listaVideos[]=$myVideo;
		}
		return $listaVideos;
	}
			public function mostrarpapelera(){
			$db=Db::conectar();
			$listaVideos=[];
			$select=$db->query('SELECT * FROM video ORDER BY id_video ASC;');

		foreach($select->fetchAll() as $video){
			$myVideo= new Video();
			$myVideo->setid_video($video['id_video']);
			$myVideo->setid_curso($video['id_curso']);
			$myVideo->setvideo($video['video']);
			$myVideo->settitulo($video['titulo']);
			$myVideo->setf_a($video['f_a']);
			$listaVideos[]=$myVideo;
		}
		return $listaVideos;
	}
		public function eliminar($id_video){
			$db=Db::conectar();
			$eliminar=$db->prepare('DELETE FROM video WHERE id_video=:id_video');
			$eliminar->bindValue('id_video',$id_video);
			$eliminar->execute();
		}
		public function mostrarvideos($id_curso){
			$db=Db::conectar();
			$listaVideos=[];
			$select=$db->prepare('SELECT * FROM video where id_curso=:id_curso && f_a<=(now())');
			$select->bindValue('id_curso',$id_curso);
			$select->execute();

		foreach($select->fetchAll() as $video){
			$myVideo= new Video();
			$myVideo->setid_video($video['id_video']);
			$myVideo->setid_curso($video['id_curso']);
			$myVideo->setvideo($video['video']);
			$myVideo->settitulo($video['titulo']);
			$myVideo->setf_a($video['f_a']);
			$listaVideos[]=$myVideo;
		}
		return $listaVideos;
	}		public function mostrarvideosa($id_curso){
			$db=Db::conectar();
			$listaVideos=[];
			$select=$db->prepare('SELECT * FROM video where id_curso=:id_curso');
			$select->bindValue('id_curso',$id_curso);
			$select->execute();

		foreach($select->fetchAll() as $video){
			$myVideo= new Video();
			$myVideo->setid_video($video['id_video']);
			$myVideo->setid_curso($video['id_curso']);
			$myVideo->setvideo($video['video']);
			$myVideo->settitulo($video['titulo']);
			$myVideo->setf_a($video['f_a']);
			$listaVideos[]=$myVideo;
		}
		return $listaVideos;
	}
}
?>