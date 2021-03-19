<?php
	class Cliente{
		private $id;
		private $nombre;
		private $ap;
		private $am;
		private $correo;
		private $contra;
 
		function __construct(){}

		public function getid_cliente(){
			return $this->id_cliente;
		}
 
		public function setid_cliente($id_cliente){
			$this->id_cliente = $id_cliente;
		}
 
		public function getnombre(){
		return $this->nombre;
		}
 
		public function setnombre($nombre){
			$this->nombre = $nombre;
		}
 
		public function getap(){
			return $this->ap;
		}
 
		public function setap($ap){
			$this->ap = $ap;
		}
 
		public function getam(){
		return $this->am;
		}
		public function setam($am){
			$this->am = $am;
		}

 		public function getcorreo(){
		return $this->correo;
		}
		public function setcorreo($correo){
			$this->correo = $correo;
		}

 		public function getcontra(){
		return $this->contra;
		}
		public function setcontra($contra){
			$this->contra = $contra;
		}

		public function getestado(){
		return $this->estado;
		}
		public function setestado($estado){
			$this->estado = $estado;
		}
	}
?>