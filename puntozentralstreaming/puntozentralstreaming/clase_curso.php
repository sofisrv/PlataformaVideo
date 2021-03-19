<?php
    class Curso{
        private $id_curso;
        private $nombre;
        private $descripcion;
        private $estado;
        private $imagen;

        public function _costruct(){}

        public function getid_curso(){
            return $this->id_curso;
        }
        public function setid_curso($id_curso){
            $this->id_curso = $id_curso;
        }

        public function getnombre(){
            return $this->nombre;
        }
        public function setnombre($nombre){
            $this->nombre = $nombre;
        }

        public function getdescripcion(){
            return $this->descripcion;
        }
        public function setdescripcion($descripcion){
            $this->descripcion = $descripcion;
        }

        public function getestado(){
            return $this->estado;
        }
        public function setestado($estado){
            $this->estado = $estado;
        }
        public function getimagen(){
            return $this->imagen;
        }
        public function setimagen($imagen){
            $this->imagen = $imagen;
        }
    }
?>