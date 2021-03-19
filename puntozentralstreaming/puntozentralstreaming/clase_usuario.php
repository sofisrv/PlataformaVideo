<?php
    class Usuario{
        private $id;
        private $nombre;
        private $contra;
        private $rol;
        private $estado;
        
        public function __construct(){}

        public function getid_usuario(){
            return $this->id_usuario;
        }
        public function setid_usuario($id_usuario){
            $this->id_usuario = $id_usuario;
        }
        public function getnombre(){
            return $this->nombre;
        }
        public function setnombre($nombre){
            $this->nombre = $nombre;
        }
        public function getcontra(){
            return $this->contra;
        }
        public function setcontra($contra){
            $this->contra = $contra;
        }

        public function getrol(){
            return $this->rol;
        }
        public function setrol($rol){
            $this->rol = $rol;
        }

        public function getestado(){
            return $this->estado;
        }
        public function setestado($estado){
            $this->estado = $estado;
        }
    }
?>