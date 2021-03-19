<?php
    class Paq{
        private $id_cursocliente;
        private $id_cliente;
        private $id_curso;
        private $id_paquete;
        private $f_i;
        private $f_f;

        public function __construct(){}

        public function getid_cursocliente(){
            return $this->id_cursocliente;
        }
        public function setid_cursocliente($id_cursocliente){
            $this->id_cursocliente = $id_cursocliente;
        }
        public function getid_paquete(){
            return $this->id_paquete;
        }
        public function setid_paquete($id_paquete){
            $this->id_paquete = $id_paquete;
        }
        public function getid_curso(){
            return $this->id_curso;
        }
        public function setid_curso($id_curso){
            $this->id_curso = $id_curso;
        }
        public function getid_cliente(){
            return $this->id_cliente;
        }
        public function setid_cliente($id_cliente){
            $this->id_cliente = $id_cliente;
        }
        public function getf_i(){
            return $this->f_i;
        }
        public function setf_i($f_i){
            $this->f_i = $f_i;
        }
        public function getf_f(){
            return $this->f_f;
        }
        public function setf_f($f_f){
            $this->f_f = $f_f;
        }

    }
?>