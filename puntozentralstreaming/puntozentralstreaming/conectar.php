<?php
	class  Db{
		private static $conexion=NULL;
		private function __construct (){}
 
		public static function conectar(){
			$pdo_options[PDO::ATTR_ERRMODE]=PDO::ERRMODE_EXCEPTION;
			self::$conexion= new PDO('mysql:host=interfaznva.com;dbname=interfaz_puntozentralstreaming','interfaz_soportemx','RCA~4~!oONsO',$pdo_options);
			//self::$conexion= new PDO('mysql:host=localhost;dbname=demo','root','',$pdo_options);
			return self::$conexion;
		}		
	} 
?>