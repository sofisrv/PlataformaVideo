<?php
    class Paquete{
        private $id;
        private $nombre;
        private $descripcion;
        private $costo;
        private $estado;
        private $caducidad;
        private $visibleonline;

        public function __construct(){}

        public function getid_paquete(){
            return $this->id_paquete;
        }
        public function setid_paquete($id_paquete){
            $this->id_paquete = $id_paquete;
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

        public function getcosto(){
            return $this->costo;
        }
        public function setcosto($costo){
            $this->costo = $costo;
        }
        public function getestado(){
            return $this->estado;
        }
        public function setestado($estado){
            $this->estado = $estado;
        }
        public function getcaducidad(){
            return $this->caducidad;
        }
        public function setcaducidad($caducidad){
            $this->caducidad = $caducidad;
        }
        public function getvisibleonline(){
            return $this->visibleonline;
        }
        public function setvisibleonline($visibleonline){
            $this->visibleonline = $visibleonline;
        }
    }
?>