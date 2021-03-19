<?php
    class Video{
        private $id;
        private $id_curso;
        private $video;
        private $titulo;
        private $f_a;
        private $estado;

        public function __construct(){}

        public function getid_video(){
            return $this->id_video;
        }
        public function setid_video($id_video){
            $this->id_video = $id_video;
        }
        public function getid_curso(){
            return $this->id_curso;
        }
        public function setid_curso($id_curso){
            $this->id_curso = $id_curso;
        }
        public function getvideo(){
            return $this->video;
        }
        public function setvideo($video){
            $this->video = $video;
        }
        public function gettitulo(){
            return $this->titulo;
        }
        public function settitulo($titulo){
            $this->titulo = $titulo;
        }
        public function getf_a(){
            return $this->f_a;
        }
        public function setf_a($f_a){
            $this->f_a = $f_a;
        }
        public function getestado(){
            return $this->estado;
        }
        public function setestado($estado){
            $this->estado = $estado;
        }
    }
?>